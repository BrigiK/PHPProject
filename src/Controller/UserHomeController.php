<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Book;

class UserHomeController extends AbstractController
{
    /**
     * @Route("/user/home", name="user_home")
     */
    public function index()
    {
        $repository = $this->getDoctrine()->getRepository(Book::class);

        $books = $repository->findAll();


        return $this->render('user_home/index.html.twig', [
            'controller_name' => 'UserHomeController',
            'books' => $books
        ]);
    }
}
