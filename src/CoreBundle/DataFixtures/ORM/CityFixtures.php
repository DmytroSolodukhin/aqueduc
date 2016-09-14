<?php
/**
 * Created by PhpStorm.
 * User: kazak
 * Date: 12/26/15
 * Time: 11:20 PM
 */

namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Entity\City;

class CityFixtures extends AbstractForumFixture
{
    /**
     * @return int
     */
    public function getOrder()
    {
        return 10;
    }

    /**
     * @param array $data
     * @return City
     */
    protected function createEntity($data)
    {
        /** @var City $city */
        $city = $this->container->get('city.handler')->createEntity();

        $city->setTitle($data['name']);

        return $city;
    }
} 