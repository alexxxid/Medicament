<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MedicamentsController extends AbstractController
{
    /**
     * @Route("/medicaments", name="medicaments")
     */
    public function index()
    {
        return $this->render('medicaments/index.html.twig', [
            'controller_name' => 'MedicamentsController',
        ]);
    }
}
