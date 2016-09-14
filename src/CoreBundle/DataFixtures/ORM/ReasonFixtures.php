<?php
/**
 * Created by PhpStorm.
 * User: kazak
 * Date: 12/26/15
 * Time: 11:20 PM
 */

namespace CoreBundle\DataFixtures\ORM;

use CoreBundle\Entity\Reason;

class ReasonFixtures extends AbstractForumFixture
{
    /**
     * @return int
     */
    public function getOrder()
    {
        return 30;
    }

    /**
     * @param array $data
     * @return Reason
     */
    protected function createEntity($data)
    {
        /** @var Reason $reason */
        $reason = $this->container->get('reason.handler')->createEntity();

        $reason->setTitle($data['title'])
            ->setDescription($data['description'])
            ->setVisible(true)
            ->setCityId($this->getReference('odessa'));


        return $reason;
    }
} 