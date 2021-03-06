<?php

namespace AppBundle\Repository;

/**
 * GarageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GarageRepository extends \Doctrine\ORM\EntityRepository
{

    public function findByName($name)
    {
        return $this->createQueryBuilder('garage')
            ->andWhere('garage.name = :name')
            ->setParameter('name', $name)
            ->getQuery()
            ->execute();
    }
}
