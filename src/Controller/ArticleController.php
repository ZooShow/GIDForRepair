<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\RepairKindRepository;
use App\Repository\RepairTypeRepository;
use App\Repository\UserRepository;
use App\Service\ArticleService;
use App\Service\ResponseService;
use Exception;
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

    private ArticleRepository $articleRepository;

    private UserRepository $userRepository;

    private ArticleService $articleService;

    private RepairKindRepository $repairKindRepository;

    private RepairTypeRepository $repairTypeRepository;

    public function __construct(
        ResponseService $responseService,
        ArticleRepository $articleRepository,
        UserRepository $userRepository,
        ArticleService $articleService,
        RepairKindRepository $repairKindRepository,
        RepairTypeRepository $repairTypeRepository
    ) {
        $this->responseService = $responseService;
        $this->articleRepository = $articleRepository;
        $this->userRepository = $userRepository;
        $this->articleService = $articleService;
        $this->repairKindRepository = $repairKindRepository;
        $this->repairTypeRepository = $repairTypeRepository;
    }

    /**
     * @Route(name="create")
     */
    public function createArticle(): Response
    {
        return $this->render('article/create.html.twig', [
            'materials' => $this->articleService->getMaterials(),
            'tools' => $this->articleService->getTools()
        ]);
    }

    /**
     * @param Request $request
     * @return void
     * @Route("/save", name="save")
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
        $carouselView = $this->articleService->getCarouselView($article['repairKindId']);
        return $this->render('article/view.html.twig', [
            'article' => $article,
            'carousel' => $carouselView
        ]);
    }

    /**
     * @Route ("/{id}", name="show_list")
     */
    public function showListArticleByCategory($id): Response
    {
        $articles = $this->articleService->getArticlesByType($id);

        return $this->render('article/list.html.twig', [
           'articles' => $articles
        ]);
    }

    /**
     * @Route ("/main/page", name="show_main_page")
     */
    public function showMainPage(): Response
    {
        $carouselView = $this->articleService->getCarouselView();

        return $this->render('index.html.twig',[
            'carousel' => $carouselView
        ]);
    }
}
