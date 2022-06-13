<?php

namespace App\Repository;

use App\Entity\Curiosites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Curiosites>
 *
 * @method Curiosites|null find($id, $lockMode = null, $lockVersion = null)
 * @method Curiosites|null findOneBy(array $criteria, array $orderBy = null)
 * @method Curiosites[]    findAll()
 * @method Curiosites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CuriositesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Curiosites::class);
    }

    public function add(Curiosites $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    /**
     * @return Curiosites[] return un array des curiosites objets
     */
    public function findBySearch($data)
    {
        $query = $this->createQueryBuilder('c');
            if ($data != null){
                $query = $query->join('c.region', 'r')
                            ->andWhere('r.id = :id')
                            ->setParameter('id', $data);
            }
            
            //dd($query->getQuery()->getResult());
            return $query->getQuery()->getResult();
        ;
    }

    public function remove(Curiosites $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Curiosites[] Returns an array of Curiosites objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Curiosites
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
