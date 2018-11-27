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
     * @Route("/acceuil", name="acceuil")
     */
    public function showMedicament()
    {
        return $this->render('main/acceuil.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
