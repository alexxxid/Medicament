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
     * @Route("/showMedicament", name="showMedicament")
     */
    public function showMedicament()
    {
        return $this->render('main/showMedicament.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
