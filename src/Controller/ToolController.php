<?php

namespace App\Controller;

use App\Service\ToolService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tool", name="app_tool")
 */
class ToolController extends AbstractController
{
    private ToolService $toolService;

    /**
     * @param \App\Service\ToolService $toolService
     */
    public function __construct(ToolService $toolService)
    {
        $this->toolService = $toolService;
    }

    /**
     * @Route("/{id}", name="app_tool")
     */
    public function index(int $id): Response
    {

        return $this->render('tool/tool_by_id.html.twig', [
            'tool' => $this->toolService->getToolById($id),
        ]);
    }
}
