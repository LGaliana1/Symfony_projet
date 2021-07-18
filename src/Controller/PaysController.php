<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Pays;

class PaysController extends AbstractController
{
    /**
     * @Route("/pays", name="pays")
     */
    public function index(): Response
    {
        return $this->render('pays/index.html.twig', [
            'controller_name' => 'PaysController',
        ]);
    }

    public function add()
    {
        $entityManager=$this->getDoctrine()->getManager();
        $pays1= new Pays();
        $pays1->setPays("France");

        $entityManager->persist($pays1);

        $pays2= new Pays();
        $pays2->setPays("Italie");

        $entityManager->persist($pays2);

        $pays3= new Pays();
        $pays3->setPays("Espagne");

        $entityManager->persist($pays3);

        $pays4= new Pays();
        $pays4->setPays("Italie");

        $entityManager->persist($pays4);

        $entityManager->flush();

        return new Response ('Nouveau pays sauvergardés:: 
                1 :'.$pays1->getPays().',
                2 :'.$pays2->getPays().',
                3 :'.$pays3->getpays().', 
                4 :'.$pays4->getPays());
        
    }
}
