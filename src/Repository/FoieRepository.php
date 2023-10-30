<?php

namespace App\Repository;

use App\Entity\Foie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Foie>
 *
 * @method Foie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Foie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Foie[]    findAll()
 * @method Foie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FoieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Foie::class);
    }

//    /**
//     * @return Foie[] Returns an array of Foie objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('f.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Foie
//    {
//        return $this->createQueryBuilder('f')
//            ->andWhere('f.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
