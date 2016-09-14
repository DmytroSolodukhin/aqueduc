<?php
/**
 * Created by PhpStorm.
 * User: kazak
 * Date: 12/26/15
 * Time: 11:20 PM
 */

namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Entity\Zakaz;

class ZakazFixtures extends AbstractForumFixture
{
    /**
     * @return int
     */
    public function getOrder()
    {
        return 40;
    }

    /**
     * @param array $data
     * @return Zakaz
     */
    protected function createEntity($data)
    {
        /** @var Zakaz $zakaz */
        $zakaz = $this->container->get('zakaz.handler')->createEntity();

        $zakaz->setTitle($data['title'])
            ->setCustomer($this->getReference('user'))
            ->setReason($this->getReference('reason1'))
            ->setVisible(true)
            ->setStatus($this->getReference('open'));

        return $zakaz;
    }
} 