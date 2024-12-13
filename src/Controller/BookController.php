<?php

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookFormType;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/book')]
class BookController extends AbstractController
{
    #[Route('/', name: 'app_book_index')]
    public function index(BookRepository $bookRepository) : Response
    {
        return $this->render('book/index.html.twig', ["books" => $bookRepository->findAll()]);
}

    #[Route('/show/{id}', name: 'app_book_show')]
    public function show(int $id, BookRepository $bookRepository) : Response
    {
        return $this->render('book/show.html.twig', ["book" => $bookRepository->find($id)]);
    }

    #[Route('/{id}', name: 'app_book_edit')]
    public function edit(Book $book, EntityManagerInterface $entityManager, Request $request): Response
    {
        $form = $this->createForm(BookFormType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $book = $form->getData();
            $entityManager->persist($book);
            $entityManager->flush();
            return $this->redirectToRoute('app_book_show', ['id' => $book->getId()]);
        }

        return $this->render('book/edit.html.twig', ["form" => $form->createView()]);
    }

    #[Route('/{id}/delete', name: 'app_book_delete')]
    public function delete(Book $book, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($book);
        $entityManager->flush();
        return $this->redirectToRoute('app_book_index');
    }

    #[Route('/new', name: 'app_book_new')]
    public function new(EntityManagerInterface $entityManager, Request $request): Response
    {
        $book = new Book();
        $form = $this->createForm(BookFormType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $book = $form->getData();
            $entityManager->persist($book);
            $entityManager->flush();
            return $this->redirectToRoute('app_book_show', ['id' => $book->getId()]);
//            return new Response('Ich bin drin');

        } else {
            return $this->render('book/new.html.twig', ["form" => $form->createView()]);
        }
    }

}