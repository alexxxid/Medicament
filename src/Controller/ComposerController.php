<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ComposerController extends AbstractController
{
    /**
     * @Route("/composer", name="composer")
     */
    public function index()
    {
        return $this->render('composer/index.html.twig', [
            'controller_name' => 'ComposerController',
        ]);
    }
}
