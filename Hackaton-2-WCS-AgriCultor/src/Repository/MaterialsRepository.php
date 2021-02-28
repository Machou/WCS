<?php

namespace App\Repository;

use App\Entity\Materials;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Materials|null find($id, $lockMode = null, $lockVersion = null)
 * @method Materials|null findOneBy(array $criteria, array $orderBy = null)
 * @method Materials[]    findAll()
 * @method Materials[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MaterialsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Materials::class);
    }

    /**
     * @return Materials[]
    */
    public function search(string $type, string $trademark, string $model, int $year): array
    {
        $query = $this
            ->createQueryBuilder('m')
            ->andWhere('m.type = :type')
            ->setParameter('type', $type)
            ->andWhere('m.trademark = :trademark')
            ->setParameter('trademark', $trademark)
            ->andWhere('m.model = :model')
            ->setParameter('model', $model)
            ->andWhere('m.year = :year')
            ->setParameter('year', $year);

        return $query->getQuery()->getResult();
    }
}
