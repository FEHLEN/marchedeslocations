<?php

namespace App\Repository;

use App\Entity\Offreslocations;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Offreslocations>
 *
 * @method Offreslocations|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offreslocations|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offreslocations[]    findAll()
 * @method Offreslocations[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OffreslocationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offreslocations::class);
    }

    public function add(Offreslocations $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    /**
     * @return Offreslocations[] return un array de offreslocations objets
     */
    public function findByRegion($region = null)
    {
        $query = $this->createQueryBuilder('o');
            if ($region != null){
                $query = $query->join('o.regions', 'r')
                            ->andWhere('r.id = :id')
                            ->setParameter('id', $region);
            }
            
            //dd($query->getQuery()->getResult());
            return $query->getQuery()->getResult();
        ;
    }

    public function remove(Offreslocations $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Offreslocations[] Returns an array of Offreslocations objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Offreslocations
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
