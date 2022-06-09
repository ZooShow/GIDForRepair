<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

/**
 * @Route("/login")
 */
class LoginController extends AbstractController
{
    /**
     * @Route(name="login")
     */
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        $error = $authenticationUtils->getLastAuthenticationError();

        return $this->render('login/login.html.twig', [
            'controller_name' => 'LoginController',
            'error' => $error,
        ]);
    }
}
