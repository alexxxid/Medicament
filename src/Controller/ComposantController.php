<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ComposantController extends AbstractController
{
    /**
     * @Route("/composant", name="composant")
     */
    public function index()
    {
        return $this->render('composant/index.html.twig', [
            'controller_name' => 'ComposantController',
        ]);
    }
}
