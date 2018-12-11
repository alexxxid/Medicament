<?php

namespace App\Controller;

use App\Entity\Famille;
use App\Entity\Composer;
use App\Entity\Composant;
use App\Form\FamilleType;
use App\Entity\Medicaments;
use App\Form\ComposantType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index()
    {
        if ($this->getUser() != null) {

            return $this->redirectToRoute('acceuil');
        }
        return $this->render('main/index.html.twig');
    }

    /**
     * @Route("/login", name="login")
     */
    public function login()
    {
        if ($this->getUser() != null) {

            return $this->redirectToRoute('acceuil');
        }
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
    public function acceuil(Composant $composant = null, Famille $famille = null, Request $request, ObjectManager $manager)
    {
        //AFFICHAGE DU NOMBRE DANS LA CARD
        $repo = $this->getDoctrine()->getRepository(Famille::class);
        $familles = $repo->findAll();
        $nbfamilles = count($familles);

        $repo = $this->getDoctrine()->getRepository(Medicaments::class);
        $medicaments = $repo->findAll();
        $nbmedicaments = count($medicaments);

        $repo = $this->getDoctrine()->getRepository(Composant::class);
        $composants = $repo->findall();
        $nbcomposants = count($composants);

        //CREATION DES FORMULAIRES (MODALES)
        if (!$composant) {
            $composant = new Composant();
        }

        if (!$famille) {
            $famille = new Famille();
        }

        $formComposant = $this->createForm(ComposantType::class, $composant);
        $formComposant->handleRequest($request);

        $formFamille = $this->createForm(FamilleType::class, $famille);
        $formFamille->handleRequest($request);

        if ($formComposant->isSubmitted() && $formComposant->isValid()) {

            $manager->persist($composant);
            $manager->flush();

            return $this->redirectToRoute('acceuil');
        } else if ($formFamille->isSubmitted() && $formFamille->isValid()) {
            $manager->persist($famille);
            $manager->flush();

            return $this->redirectToRoute('acceuil');
        }

        return $this->render('main/acceuil.html.twig', [
            'formComposant' => $formComposant->createView(),
            'formFamille' => $formFamille->createView(),
            'familles' => $familles,
            'nbfamilles' => $nbfamilles,
            'medicaments' => $medicaments,
            'nbmedicaments' => $nbmedicaments,
            'composants' => $composants,
            'nbcomposants' => $nbcomposants
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

    /**
     * @Route("/famille/{id}/supprimerFamille",name="supprimerFamille")  
     */
    public function supprimerFamille(Famille $famille)
    {
        $manager = $this->getDoctrine()->getManager();
        $medicaments = $famille->getMedicaments();
        foreach ($medicaments as $medicament) {
            $famille->removeMedicament($medicament);
        }



        $manager->remove($famille);
        $manager->flush();


        return $this->redirectToRoute('famille');
    }

    /**
     * @Route("/medicament/{id}/supprimerMedicament", name="supprimerMedicament")
     */
    public function supprimerMedicament(Medicaments $medicament)
    {
        $manager = $this->getDoctrine()->getManager();

        $composers = $medicament->getComposers();
        foreach ($composers as $composer) {
            $medicament->removeComposers($composer, $manager);
        }

        $manager->remove($medicament);
        $manager->flush();

        return $this->redirectToRoute('medicament');
    }

    /**
     * @Route("/composant/{id}/supprimerComposant", name="supprimerComposant")
     */
    public function supprimerComposant(Composant $composant)
    {
        $manager = $this->getDoctrine()->getManager();

        $composers = $composant->getComposers();
        foreach ($composers as $composer) {
            $composant->removeComposer($composer, $manager);
        }

        $manager->remove($composant);
        $manager->flush();

        return $this->redirectToRoute('composant');
    }
}
