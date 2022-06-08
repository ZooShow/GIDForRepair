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
     * @Route("/graphic", name="render_graphic")
     */
    public function graphicCalculator(): Response
    {
        return $this->render('calculator/graph_calculator.html.twig', [
            'controller_name' => 'CalculatorController',
        ]);
    }

    /**
     * @Route ("/calculate", name = "calculate_graphic")
     */
    public function calculate(Request $request): Response
    {
        $data = $request->getContent();
        $dataSerialize = json_decode($data);
        $answer = $this->calculatorService->calculateArea($dataSerialize->data);
        $data = [
            'data' => $answer,
            'message' => 'success'
        ];
        return $this->responseService->response($data);
    }
}
