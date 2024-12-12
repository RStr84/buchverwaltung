<?php

namespace App\Controller;

use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{

    #[Route('/', name: 'app_main_letsgo')]
    public function letsgo(Book $book, EntityManagerInterface $entityManager, Request $request): Response
    {
        $form = $this->createForm()
        return $this->render('main/letsgo.html.twig');


    }
}