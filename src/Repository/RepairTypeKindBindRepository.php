<?php

namespace App\Repository;

use App\Entity\RepairTypeKindBind;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RepairTypeKindBind>
 *
 * @method RepairTypeKindBind|null find($id, $lockMode = null, $lockVersion = null)
 * @method RepairTypeKindBind|null findOneBy(array $criteria, array $orderBy = null)
 * @method RepairTypeKindBind[]    findAll()
 * @method RepairTypeKindBind[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RepairTypeKindBindRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RepairTypeKindBind::class);
    }

    public function add(RepairTypeKindBind $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(RepairTypeKindBind $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return RepairTypeKindBind[] Returns an array of RepairTypeKindBind objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RepairTypeKindBind
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
