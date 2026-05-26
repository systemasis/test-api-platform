<?php

namespace App\Controller\Api;

use App\Entity\Author;
use App\Entity\Book;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
class BookController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    public function getByAuthor(Author $author): array
    {
        return $this->entityManager->getRepository(Book::class)->findBy(['author' => $author]);
    }
}
