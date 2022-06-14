<?php

namespace App\Controller;

use App\Service\CalculatorService;
use App\Service\ResponseService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/calculator", name="calculator_")
 */
class CalculatorController extends AbstractController
{
    private CalculatorService $calculatorService;

    private ResponseService $responseService;

    public function __construct(
        CalculatorService $calculatorService,
        ResponseService $responseService
    ) {
        $this->calculatorService = $calculatorService;
        $this->responseService = $responseService;
    }


    /**
     * @Route("/{id}", name="render_graphic")
     */
    public function graphicCalculator(int $id): Response
    {
        return $this->render('calculator/graph_calculator.html.twig', [
            'id' => $id
        ]);
    }

    /**
     * @Route ("/calculate/{id}", name = "calculate_graphic")
     */
    public function calculate(Request $request, int $id): Response
    {
        $data = $request->getContent();
        $dataSerialize = json_decode($data);
        $area = $this->calculatorService->calculateArea($dataSerialize->data);
        $perim = $this->calculatorService->calulatePerim($dataSerialize->data);
        $data = $this->calculatorService->calculateToolAndMaterial($id, $perim, $area);
        return $this->responseService->response($data);
    }
}
