<?php

namespace App\Controller;

use App\Entity\LectureCard;
use App\Form\BorrowBookFormType;
use App\Security\LoginFormAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Symfony\Component\Security\Core\Security;


class BorrowBookController extends AbstractController
{
    public function borrowBook(Request $request, Security $security)
    { 
        $lectureCard = new LectureCard();
        
        $form = $this->createForm(BorrowBookFormType::class, $lectureCard);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) 
        {
            $lectureCard = $form->getData();
            $lectureCard->setIdUser($security->getUser());
    
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($lectureCard);
            $entityManager->flush();
    
            return "Book successfully borrowed!";
        }
        
        return $this->render('borrowbook/borrowbook.html.twig', [
            'form' => $form->createView(),
        ]);
    } 
}
