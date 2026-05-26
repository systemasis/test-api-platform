<?php

namespace App\Controller\Api;

use App\Entity\Book;
use App\Entity\Review;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\Routing\Attribute\Route;

#[AsController]
class ReviewController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }

    #[Route(
        path: '/review/rates-over/{rate}',
        name: 'review_by_rate',
        defaults: [
            '_api_resource_class' => Book::class,
            '_api_operation_name' => '_api_/book/{author}/collection',
        ],
        methods: ['GET'],
    )]
    public function reviewByRate(int $rate): array
    {
        return $this->entityManager->getRepository(Review::class)
            ->createQueryBuilder('r')
            ->where('r.rate >= :rate')
            ->setParameter('rate', $rate)
            ->getQuery()
            ->getResult();
    }
}
