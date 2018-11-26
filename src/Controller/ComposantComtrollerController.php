<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ComposantComtrollerController extends AbstractController
{
    /**
     * @Route("/composant/comtroller", name="composant_comtroller")
     */
    public function index()
    {
        return $this->render('composant_comtroller/index.html.twig', [
            'controller_name' => 'ComposantComtrollerController',
        ]);
    }
}
