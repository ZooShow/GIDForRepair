<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\RepairKindRepository;
use App\Repository\RepairTypeRepository;
use App\Repository\UserRepository;
use App\Service\ArticleService;
use App\Service\ResponseService;
use Exception;
use FOS\ElasticaBundle\Finder\PaginatedFinderInterface;
use FOS\ElasticaBundle\Finder\TransformedFinder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/article", name="article_")
 */
class ArticleController extends AbstractController
{
    private ResponseService $responseService;

    private UserRepository $userRepository;

    private ArticleService $articleService;

    private TransformedFinder $finder;

    public function __construct(
        ResponseService $responseService,
        UserRepository $userRepository,
        ArticleService $articleService,
        TransformedFinder $finder
    ) {
        $this->responseService = $responseService;
        $this->userRepository = $userRepository;
        $this->articleService = $articleService;
        $this->finder = $finder;
    }

    /**
     * @Route(name="create")
     */
    public function createArticle(): Response
    {
        return $this->render('article/create.html.twig', [
            'materials' => $this->articleService->getMaterials(),
            'tools' => $this->articleService->getTools(),
            'title' => 'Создание статьи',
            'is_edit' => false
        ]);
    }

    /**
     * @param Request $request
     * @return void
     * @Route("/save_article", name="save_article")
     */
    public function saveArticle(Request $request): JsonResponse
    {
        try {
            $userRequest = $this->getUser();

            $data = $request->getContent();
            $dataSerialize = json_decode($data);

            $this->articleService->saveArticle($dataSerialize, $userRequest);

            $data = [
                "success" => true,
                "errors" => "Статья успешно сохранена!"
            ];

            return $this->responseService->response($data);
        } catch (Exception $e) {
            $data = [
                "success" => false,
                "errors" => "При сохранении статьи что-то пошло не так!"
            ];

            return $this->responseService->response($data, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * @param Request $request
     * @return void
     * @Route("/save_edit", name="save")
     */
    public function saveEditArticle(Request $request): JsonResponse
    {
        try {
            $data = $request->getContent();
            $dataSerialize = json_decode($data);

            $this->articleService->editArticle($dataSerialize);

            $data = [
                "success" => true,
                "errors" => "Статья успешно изменена!"
            ];

            return $this->responseService->response($data);
        } catch (Exception $e) {
            $data = [
                "success" => false,
                "errors" => "При сохранении статьи что-то пошло не так!"
            ];

            return $this->responseService->response($data, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     *
     * @Route("/upload_file", name="save_file")
     */
    public function uploadImageFromArticle(Request $request): JsonResponse
    {
        try {
            $fileRequest = $request->files->get('image');
            $fileDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads/';
            $fileName = md5(uniqid('', true)) . "." . $fileRequest->guessExtension();
            $fileRequest->move($fileDirectory, $fileName);
            $data = [
                "success" => 1,
                "file" => [
                    "url" => 'http://127.0.0.1:8000/uploads/' . $fileName
                ]
            ];
            return $this->responseService->response($data);
        } catch (Exception $e) {
            $data = [
                "success" => 0,
                "errors" => "Data no valid"
            ];
            return $this->responseService->response($data, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * @param Request $request
     * @return void
     *
     * @Route("/upload_url", name="save_url")
     */
    public function uploadImageFromUrl(Request $request): JsonResponse
    {
        try {
            $data = json_decode($request->getContent());
            $content = file_get_contents($data->url);
            $fileDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads/';
            $fileName = md5(uniqid('', true)) . ".jpg";
            $fp = fopen($fileDirectory . $fileName, "w");
            fwrite($fp, $content);
            fclose($fp);
//            $content->move($fileDirectory, $fileName);
            $data = [
                "success" => 1,
                "file" => [
                    "url" => 'http://127.0.0.1:8000/uploads/' . $fileName
                ]
            ];
            return $this->responseService->response($data);
        } catch (Exception $e) {
            $data = [
                "success" => 0,
                "errors" => "Data no valid"
            ];
            return $this->responseService->response($data, Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * @param $id
     * @return void
     *
     * @Route ("/show/{id}", name="show")
     */
    public function showArticle($id): Response
    {
        $article = $this->articleService->getArticleById($id);
        $carouselView = $this->articleService->getCarouselView($article['repairKindId'], $id);
        return $this->render('article/view.html.twig', [
            'article' => $article,
            'carousels' => $carouselView
        ]);
    }


    /**
     * @Route ("/search", name="search")
     */
    public function search(Request $request): Response
    {
        $data = $request->query->get('data');
        $results2 = $this->finder->findHybrid($data);
        $articles = $this->articleService->getArticleSearch($results2);
        return $this->render('article/list.html.twig', [
            'articles' => $articles,
            'is_edit' => false
        ]);
    }

    /**
     * @Route ("/category/{id}", name="show_list")
     */
    public function showListArticleByCategory($id): Response
    {
        $articles = $this->articleService->getArticlesByType($id);

        return $this->render('article/list.html.twig', [
           'articles' => $articles,
            'is_edit' => false
        ]);
    }

    /**
     * @Route ("/edit", name = "edit")
     */
    public function getArticlesByUser(): Response
    {
        $user = $this->getUser();
        $userEntity = $this->userRepository->findOneBy(['email' => $user->getUserIdentifier()]);
        $articles = $this->articleService->getArticlesByUser($userEntity);
        return $this->render('article/list.html.twig', [
            'articles' => $articles,
            'is_edit' => true
        ]);
    }

    /**
     * @Route ("/edit/{id}", name = "edit_id")
     */
    public function editArticle(int $id): Response
    {
        $article = $this->articleService->prepareArticleBeforeEdit($id);
        return $this->render('article/edit.html.twig', [
            'title' => 'Редактирование статьи',
            'materials' => $this->articleService->getMaterials(),
            'tools' => $this->articleService->getTools(),
            'article' => $article,
        ]);
    }
}
