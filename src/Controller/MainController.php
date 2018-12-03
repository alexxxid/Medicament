<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index()
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/login", name="login")
     */
    public function login()
    {
        return $this->render('main/index.html.twig');
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {

    }
    /**
     * @Route("/acceuil", name="acceuil")
     */
    public function acceuil()
    {
        return $this->render('main/acceuil.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    /**
     * @Route("/famille", name="famille")
     */
    public function famille()
    {
        $repo = $this->getDoctrine()->getRepository(Famille::class);
        $familles = $repo->findAll();
        return $this->render('main/famille.html.twig', [
            'familles' => $familles
        ]);
    }
}
