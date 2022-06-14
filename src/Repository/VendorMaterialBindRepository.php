<?php

namespace App\Repository;

use App\Entity\VendorMaterialBind;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VendorMaterialBind>
 *
 * @method VendorMaterialBind|null find($id, $lockMode = null, $lockVersion = null)
 * @method VendorMaterialBind|null findOneBy(array $criteria, array $orderBy = null)
 * @method VendorMaterialBind[]    findAll()
 * @method VendorMaterialBind[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VendorMaterialBindRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VendorMaterialBind::class);
    }

    public function add(VendorMaterialBind $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(VendorMaterialBind $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return VendorMaterialBind[] Returns an array of VendorMaterialBind objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VendorMaterialBind
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
