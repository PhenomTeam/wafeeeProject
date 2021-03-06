<?php

namespace Phenom\WafeeeBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ShopFollowRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ShopFollowRepository extends EntityRepository
{
    public function checkIfShopFollowedByUser($idU, $idS) {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
            "SELECT s
            FROM PhenomWafeeeBundle:ShopFollow s
            WHERE s.user_id='".$idU."' AND s.shop_id='".$idS."'"
        );
        return count($query->getResult());
    }
}
