<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\Controller\Api\AuthorController;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(
    operations: [
        new GetCollection(
            uriTemplate: '/authors',
            controller: AuthorController::class,
            read: false,
            name: 'collection'
        ),
    ]
)]
#[ORM\Entity()]
class Author
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private int $id;

    #[ORM\Column]
    private string $name;

    #[ORM\OneToMany(targetEntity: Book::class, mappedBy: 'authors')]
    private ?iterable $books;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getBooks(): ?iterable
    {
        return $this->books;
    }

    public function setBooks(?iterable $books): void
    {
        $this->books = $books;
    }
}
