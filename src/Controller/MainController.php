<?php

namespace App\Controller;

use App\Entity\Famille;
use App\Entity\Composant;
use App\Entity\Medicaments;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    /**
     * @Route("/medicament", name="medicament")
     */
    public function medicament()
    {
        $repo = $this->getDoctrine()->getRepository(Medicaments::class);
        $medicaments = $repo->findAll();

        return $this->render('main/medicament.html.twig', [
            'medicaments' => $medicaments
        ]);
    }
    /**
     * @Route("/composant" , name="composant")
     */
    public function composant()
    {
        $repo = $this->getDoctrine()->getRepository(Composant::class);
        $composants = $repo->findall();

        return $this->render('main/composant.html.twig', [
            'composants' => $composants

        ]);
    }
}
