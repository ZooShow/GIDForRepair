<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationController extends AbstractController
{
    private EntityManagerInterface $em;

    private UserRepository $userRepository;

    public function __construct(
        EntityManagerInterface $em,
        UserRepository $userRepository
    ) {
        $this->em = $em;
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/register", name="register")
     */
    public function register(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher
    ): Response {
        $name = $request->request->get('name');
        $secondName = $request->request->get('second_name');
        $email = $request->request->get('email');
        $password = $request->request->get('password');

        if ($name && $secondName && $email && $password) {
            $userDuplicate = $this->userRepository->findBy(['email' => $email]);
            if ($userDuplicate) {
                return $this->render('registration/register.html.twig', [
                    'message' => 'Пользователь с такой электронной почтой уже зарегистрирован!'
                ]);
            }

            $user = new User;
            $user->setName($name);
            $user->setSecondName($secondName);
            $user->setEmail($email);
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $password
                )
            );
            $this->em->persist($user);
            $this->em->flush();
            return $this->render('registration/register.html.twig', [
                'message' => 'Регистрация прошла успешно!'
            ]);
        }

        return $this->render('registration/register.html.twig', []);
    }
}
