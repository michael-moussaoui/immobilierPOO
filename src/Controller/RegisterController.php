<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RegisterController extends AbstractController
{
    private $entityManager;



    #[Route('/inscription', name: 'app_register')]
    public function index(Request $request, ManagerRegistry $doctrine, UserPasswordHasherInterface $passwordHasher): Response
    {

        $entityManager = $doctrine->getManager();

        $user = new User();
        $plaintextPassword = '';
        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);

        // hash the password (based on the security.yaml config for the $user class)
        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $plaintextPassword

        );

        $user->setPassword($hashedPassword);

        // Si le formulaire est valide alors on récupère toutes données dans $user

        if ($form->isSubmitted() && $form->isValid()) {

            $user = $form->getData();

            $entityManager->persist($user);
            $entityManager->flush();
        }

        return $this->render('register/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
