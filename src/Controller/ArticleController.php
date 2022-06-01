<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use App\Repository\UserRepository;
use App\Service\ResponseService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

    public function __construct(
        ResponseService $responseService,
        ArticleRepository $articleRepository,
        UserRepository $userRepository
    ) {
        $this->responseService = $responseService;
        $this->articleRepository = $articleRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * @Route(name="create")
     */
    public function index(): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'Article',
        ]);
    }

    /**
     * @param Request $request
     * @return void
     * @Route("/save", name="save")
     */
    public function saveArticle(Request $request)
    {
        $user = $this->getUser();
        $data = $request = $request->getContent();
        $dataSerialize = json_decode($data);
        $tmp = '';
        foreach ($dataSerialize->data as $item) {
            $tmp .= $item . '<br>';
        }

        $user_identifer = 'asdad@mail.ru';
//        $author = $this->userRepository->findBy(['email' => $user->getUserIdentifier()]);
        $author = $this->userRepository->findOneBy(['email' => $user_identifer]);
        $article = new Article();
        $article->setText($tmp);
        $article->setAuthor($author);

        $this->articleRepository->save($article);
    }

    /**
     * @param Request $request
     * @return void
     *
     * @Route("/upload_file", name="save_file")
     */
    public function uploadImageFromArticle(Request $request)
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
     * @param $id
     * @return void
     *
     * @Route ("/{id}", name="_show")
     */
    public function showArticle($id): Response
    {
        $article = $this->articleRepository->find($id);
        return $this->render('article/view.html.twig', [
            'text' => $article->getText()
        ]);
    }
}
