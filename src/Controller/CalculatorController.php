<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/calculator", name="calculator")
 */
class CalculatorController extends AbstractController
{
    /**
     * @Route(name="calculate")
     */
    public function index(): Response
    {
        return $this->render('calculator/graph_calculator.html.twig', [
            'controller_name' => 'CalculatorController',
        ]);
    }
}
