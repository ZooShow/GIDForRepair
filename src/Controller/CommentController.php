<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Repository\ArticleRepository;
use App\Repository\UserRepository;
use App\Service\ResponseService;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/comment", name="comment_")
 */
class CommentController extends AbstractController
{
    private EntityManagerInterface $em;

    private UserRepository $userRepository;

    private ArticleRepository $articleRepository;

    private ResponseService $responseService;

    public function __construct(
        EntityManagerInterface $em,
        UserRepository $userRepository,
        ArticleRepository $articleRepository,
        ResponseService $responseService
    ) {
        $this->em = $em;
        $this->userRepository = $userRepository;
        $this->articleRepository = $articleRepository;
        $this->responseService = $responseService;
    }

    /**
     * @Route("/save", name="save")
     */
    public function index(Request $request): Response
    {
        try {
            $user = $this->getUser();
            $data = json_decode($request->getContent());

            $comment = new Comment;
            $author = $this->userRepository->findOneBy(['email' => $user->getUserIdentifier()]);
            $article = $this->articleRepository->find($data->article_id);
            $date = new DateTimeImmutable();
            $comment->setAuthor($author);
            $comment->setDate($date);
            $comment->setArticle($article);
            $comment->setText($data->comment);
            $this->em->persist($comment);
            $this->em->flush();
            return $this->responseService->response([
                'success' => true,
                'message' => 'Комментарий успешно добавлен!'
            ]);
        } catch (Exception $e) {
            return $this->responseService->response([
                'success' => true,
                'message' => 'Комментарий успешно добавлен!'
            ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
    }
}
