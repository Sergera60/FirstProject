<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }



    #[Route('/show/{example}', name: 'author')]
    public function showAuthor($example)
    {
        return $this->render('author/show.html.twig', [
            'name' => $example,
        ]);
    }

    #[Route('/list', name: 'list')]
    public function list()
    {
        $authors = array(
            array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' =>
            'victor.hugo@gmail.com ', 'nb_books' => 100),
            array('id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => ' William Shakespeare', 'email' =>
            ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
            array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>
            'taha.hussein@gmail.com', 'nb_books' => 300),
            );
            $totalBooks = 0;
            foreach ($authors as $author) {
                $totalBooks += $author['nb_books'];
            }

         

            return $this->render('author/list.html.twig', [
                'authors'=>$authors,
                'totalBooks' => $totalBooks,
                
            ]);
    }
    #[Route('/authorDetails/{id}', name: 'authorDetails')]
    public function authorDetails($id)  {
        $authors = array(
            array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' =>
            'victor.hugo@gmail.com ', 'nb_books' => 100),
            array('id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => ' William Shakespeare', 'email' =>
            ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
            array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>
            'taha.hussein@gmail.com', 'nb_books' => 300),
            );
            $author = null;
            foreach ($authors as $a) {
                if ($a['id'] == $id) {
                    $author = $a;
                    break;
                }
            }
    
            if (!$author) {
                throw $this->createNotFoundException('Author not found');
            }

        return $this->render('author/showAuthor.html.twig', [
            'author' => $author,
        ]);
    }

}
