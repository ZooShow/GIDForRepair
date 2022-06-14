<?php

namespace App\Controller;

use App\Service\MaterialService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/material", name="material_")
 */
class MaterialController extends AbstractController
{
    private MaterialService $materialService;

    public function __construct(MaterialService $materialService)
    {
        $this->materialService = $materialService;
    }


    /**
     * @Route("/{id}", name="show")
     */
    public function index(int $id): Response
    {
        $material = $this->materialService->getMaterialById($id);

        return $this->render('material/material_by_id.html.twig', [
            'material' => $material,
        ]);
    }
}
