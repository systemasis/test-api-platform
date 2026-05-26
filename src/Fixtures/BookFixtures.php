<?php

namespace App\Fixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for($i = 0; $i < 10; ++$i) {
            $book = new Book();
            $book->setTitle('Book '.$i);
            $book->setAuthor('Authoooor');

            $manager->persist($book);
        }

        $manager->flush();
    }

}
