<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    
    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
        return $this->render('homepage.html.twig');
    }

    // public function admin()
    // {
    //     $this->denyAccessUnlessGranted('ROLE_ADMIN');

    //     $users = $this->getDoctrine()->getRepository(User::class)->findAll();

    //     return $this->render('admin.html.twig', ['users' => $users]);
    // }

}