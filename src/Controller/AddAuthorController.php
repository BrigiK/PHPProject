<?php

namespace App\Controller;

use App\Entity\Author;
use App\Form\AddAuthorFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

class AddAuthorController extends AbstractController
{
    public function addAuthor(Request $request)
    { 
        $author = new Author();
        
        $form = $this->createForm(AddAuthorFormType::class, $author);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $author = $form->getData();
    
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($author);
            $entityManager->flush();
    
            return "Author successfully added to database!";
        }
        
        return $this->render('addauthor/addauthor.html.twig', [
            'form' => $form->createView(),
        ]);
    } 
}
