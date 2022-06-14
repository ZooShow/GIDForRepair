<?php

namespace App\Controller;

use App\Service\RepairService;
use App\Service\ResponseService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/repair", name="repair_")
 */
class RepairController extends AbstractController
{
    private RepairService $repairService;

    private ResponseService $responseService;

    public function __construct(
        RepairService $repairService,
        ResponseService $responseService
    ) {
        $this->repairService = $repairService;
        $this->responseService = $responseService;
    }

    /**
     * @Route (name="get_repair_type_kind_bind")
     */
    public function index(): JsonResponse
    {
        $data = $this->repairService->getRepairKindTypeBind();
        return $this->responseService->response($data);
    }
}
