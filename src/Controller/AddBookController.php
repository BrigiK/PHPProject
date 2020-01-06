<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\AddBookFormType;
use App\Security\LoginFormAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;

class AddBookController extends AbstractController
{
    public function addBook(Request $request)
    { 
        $book = new Book();
        
        $form = $this->createForm(AddBookFormType::class, $book);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $book = $form->getData();
    
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($book);
            $entityManager->flush();
    
            return "Book successfully added to database!";
        }
        
        return $this->render('addbook/addbook.html.twig', [
            'form' => $form->createView(),
        ]);
    } 
}
