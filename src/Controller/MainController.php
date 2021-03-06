<?php

namespace App\Controller;

use App\Entity\Famille;
use App\Entity\Composer;
use App\Entity\Composant;
use App\Form\FamilleType;
use App\Form\ComposerType;
use App\Entity\Medicaments;
use App\Form\ComposantType;
use App\Form\MedicamentsType;
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
    { }
    /**
     * @Route("/acceuil", name="acceuil")
     */
    public function acceuil(Composant $composant = null, Composer $composer = null, Famille $famille = null, Medicaments $medicament = null, Request $request, ObjectManager $manager)
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
        if (!$medicament) {
            $medicament = new Medicaments();
            $composer = new Composer();
        }
        // if (!$composer) {
        //     $composer = new Composer();
        // }

        $formComposant = $this->createForm(ComposantType::class, $composant);
        $formComposant->handleRequest($request);

        $formFamille = $this->createForm(FamilleType::class, $famille);
        $formFamille->handleRequest($request);

        $formMedicament = $this->createForm(MedicamentsType::class, $medicament);
        $formMedicament->handleRequest($request);


        if ($formComposant->isSubmitted() && $formComposant->isValid()) {

            $manager->persist($composant);
            $manager->flush();

            return $this->redirectToRoute('acceuil');
        } else if ($formFamille->isSubmitted() && $formFamille->isValid()) {
            $manager->persist($famille);
            $manager->flush();

            return $this->redirectToRoute('acceuil');
        } else if ($formMedicament->isSubmitted() && $formMedicament->isValid()) {



            $manager->persist($medicament);
<<<<<<< HEAD
            $manager->flush();

            $repo = $this->getDoctrine()->getRepository(Medicaments::class);
            $lastMed = $repo->findOneBy(array(), array('id' => 'desc'));
            $repo = $this->getDoctrine()->getRepository(Composer::class);
            $allComposers = $repo->findAll();
            foreach ($allComposers as $unComposer) {
                if ($unComposer->getMedicament() == null) {
                    $lastMed->composers[] = $unComposer;
                    $unComposer->setMedicament($lastMed);
                    $manager->persist($unComposer);
                    $manager->flush();
                }
            }



=======
            $manager->$manager->flush();
>>>>>>> d5ec7da97d518fedbe59b60ba3f39373c8ad1668
            return $this->redirectToRoute('acceuil');
        }



        return $this->render('main/acceuil.html.twig', [
            'formComposant' => $formComposant->createView(),
            'formFamille' => $formFamille->createView(),
            'formMedicament' => $formMedicament->createView(),
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
        $repo = $this->getDoctrine()->getRepository(Medicaments::class);
        $medicaments = $repo->findAll();
        return $this->render('main/famille.html.twig', [
            'familles' => $familles,
            'medicaments' => $medicaments
        ]);
    }

    /**
     * @Route("/medicament", name="medicament")
     */
    public function medicament()
    {
        $repo = $this->getDoctrine()->getRepository(Medicaments::class);
        $medicaments = $repo->findAll();

        $repo = $this->getDoctrine()->getRepository(Famille::class);
        $familles = $repo->findAll();

        $repo = $this->getDoctrine()->getRepository(Composant::class);
        $composants = $repo->findall();


        return $this->render('main/medicament.html.twig', [
            'medicaments' => $medicaments,
            'composants' => $composants,
            'familles' => $familles
        ]);
    }
    /**
     * @Route("/composant" , name="composant")
     */
    public function composant(Composant $composant = null, Request $request, ObjectManager $manager)
    {
        $repo = $this->getDoctrine()->getRepository(Composant::class);
        $composants = $repo->findall();


        if (!$composant) {
            $composant = new Composant();
        }

        $formComposant = $this->createForm(ComposantType::class, $composant);
        $formComposant->handleRequest($request);

        if ($formComposant->isSubmitted() && $formComposant->isValid()) {

            $manager->persist($composant);
            $manager->flush();

            return $this->redirectToRoute('composant');
        }

        return $this->render('main/composant.html.twig', [
            'composants' => $composants,
            'formComposant' => $formComposant->createView()

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
    /**
     * @Route("/composant/{id}/{newNom}/modifierComposant", name="modifierComposant")
     */
    public function modifierComposant(Composant $composant, string $newNom)
    {
        $manager = $this->getDoctrine()->getManager();

        $composant->setNomComposant($newNom);
        $manager->persist($composant);
        $manager->flush();

        return $this->redirectToRoute('composant');
    }

    /**
     * @Route("/famille/{id}/{newNom}/modifierFamille", name="modifierFamille")
     */
    public function modifierFamille(Famille $famille, string $newNom)
    {
        $manager = $this->getDoctrine()->getManager();

        $famille->setNomFamille($newNom);
        $manager->persist($famille);
        $manager->flush();

        return $this->redirectToRoute('famille');
    }

    /**
     * @Route("/medicament/{id}/{newNom}/{newFamille}/{newPrix}/{newContreIndication}/{newEffet}/modifierMedicament", name="modifierMedicament")
     */
    public function modifierMedicament(Medicaments $medicament,  $newNom = '', $newFamille = '', Float $newPrix,  $newContreIndication = '', $newEffet = '')
    {
        $manager = $this->getDoctrine()->getManager();

        $repo = $this->getDoctrine()->getRepository(Famille::class);
        $Famille = $repo->findOneBy(array('NomFamille' => $newFamille));
        $medicament->setNomCommercial($newNom);
        $medicament->setFamille($Famille);
        $medicament->setPrixEchantillon($newPrix);
        $medicament->setContreIndication($newContreIndication);
        $medicament->setEffet($newEffet);

        $manager->persist($medicament);
        $manager->flush();

        return $this->redirectToRoute('medicament');
    }
}
