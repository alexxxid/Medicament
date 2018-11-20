<?php

namespace App\Repository;

use App\Entity\Medicaments;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Medicaments|null find($id, $lockMode = null, $lockVersion = null)
 * @method Medicaments|null findOneBy(array $criteria, array $orderBy = null)
 * @method Medicaments[]    findAll()
 * @method Medicaments[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedicamentsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Medicaments::class);
    }

    // /**
    //  * @return Medicaments[] Returns an array of Medicaments objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Medicaments
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
