<?php

namespace App\Controller;

use App\Entity\Publisher;
use App\Form\AddPublisherFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

class AddPublisherController extends AbstractController
{
    public function addPublisher(Request $request)
    { 
        $publisher = new Publisher();
        
        $form = $this->createForm(AddPublisherFormType::class, $publisher);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $publisher = $form->getData();
    
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($publisher);
            $entityManager->flush();
    
            return "Publisher successfully added to database!";
        }
        
        return $this->render('addpublisher/addpublisher.html.twig', [
            'form' => $form->createView(),
        ]);
    } 
}
