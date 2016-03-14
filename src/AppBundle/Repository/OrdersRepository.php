<?php

namespace AppBundle\Repository;

/**
 * OrdersRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OrdersRepository extends \Doctrine\ORM\EntityRepository
{

    public function findTodayOrders($startDate, $endDate)
    {
        $query = $this->getEntityManager()
                ->createQuery(
                'SELECT o '
                . 'FROM AppBundle:Orders o '
                . 'WHERE o.realisationDate >= :startDate '
                . 'AND o.realisationDate <= :endDate '
                . 'ORDER BY o.realisationDate ASC'
        );

        $query->setParameters([
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);

        return $query->getResult();
    }

}
