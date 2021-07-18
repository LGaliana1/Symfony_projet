<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;

use App\Entity\auteur;
use App\Form\AuteurType;

class AuteurController extends AbstractController
{
    /**
     * @Route("/auteur", name="auteur")
     */
    public function index(): Response
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/AuteurController.php',
        ]);
    }

    public function add()
    {
        $entityManager=$this->getDoctrine()->getManager();
        $auteur1= new auteur();
        $auteur1->setNom("Francois");
        $auteur1->setPrenom("Damiens");

        $entityManager->persist($auteur1);

        $auteur2= new auteur();
        $auteur2->setNom("Francoise");
        $auteur2->setPrenom("Damiense");

        $entityManager->persist($auteur2);
        
        $auteur3= new auteur();
        $auteur3->setNom("Francois");
        $auteur3->setPrenom("Trois");

        $entityManager->persist($auteur3);

        $entityManager->flush();

        return new Response ('Nouveau auteur sauvergardé:: 1 :'.$auteur1->getNom().',2 : '.$auteur2->getNom().'3 : '.$auteur3->getNom());
        
    }

    public function show($id){

        $repository = $this->getDoctrine()
        ->getRepository(auteur::class);

        $auteur = $repository->find($id);

        if (!$auteur) {
            throw $this->createNotFoundException('No product found for id' .$id);
        }

        // return new Response('On a trouvé tout l\'auteur ' .$auteur->getNom());
        return $this->render('auteur/show_auteur.html.twig',['auteur'=>$auteur]);
    }


    public function showAll(){
        $repository = $this->getDoctrine()
        ->getRepository(auteur::class);

        $auteurs=$repository->findAll();
        // return new Response('On a récupéré tous les auteurs !');
        return $this->render('auteur/show_all_auteurs.html.twig',['auteurs'=>$auteurs]);
    }

    public function new( Request $request){
        $auteur = new auteur();
        $form = $this->createForm(auteurType::class,$auteur);

        $form->handleRequest($request);
            
            if ($form->isSubmitted() && $form->isValid()) {

                $auteur=$form->getData();

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($auteur);
                $entityManager->flush();

                return $this->redirectToRoute('show_all_auteurs');
            }

        return $this->render('auteur/new.html.twig', ['form'=> $form->createView()]);
    }
}
