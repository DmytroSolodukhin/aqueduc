<?php
/**
 * Created by PhpStorm.
 * User: kazak
 * Date: 12/26/15
 * Time: 11:20 PM
 */

namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Entity\Status;

class StatusFixtures extends AbstractForumFixture
{
    /**
     * @return int
     */
    public function getOrder()
    {
        return 20;
    }

    /**
     * @param array $data
     * @return Status
     */
    protected function createEntity($data)
    {
        /** @var Status $status */
        $status = $this->container->get('status.handler')->createEntity();

        $status->setTitle($data['title']);

        return $status;
    }
} 