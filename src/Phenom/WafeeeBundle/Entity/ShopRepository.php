<?php

namespace Phenom\WafeeeBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ShopRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ShopRepository extends EntityRepository
{
    public function getAllShops($order = 'DESC')
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT s FROM PhenomWafeeeBundle:Shop s ORDER BY s.id '.$order);
        return $query->getResult();
    }

    public function getShopById($id)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT s FROM PhenomWafeeeBundle:Shop s WHERE s.id='.$id);
        return $query->getOneOrNullResult();
    }

    public function getShopByUserId($user_id)
    {
        $em = $this->getEntityManager();
        $query = $em->createQuery('SELECT s FROM PhenomWafeeeBundle:Shop s WHERE s.user_id='.$user_id);
        return $query->getOneOrNullResult();
    }

    public function checkOwnerShop($user, $idS) {
        $em = $this->getEntityManager();
        $query = $em->createQuery("SELECT s FROM PhenomWafeeeBundle:Shop s WHERE s.id='".$idS."' AND s.user_id='".$user."'");
        return count($query->getOneOrNullResult());
    }
}
