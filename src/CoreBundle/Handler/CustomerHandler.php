<?php
/**
 * Created by aqaduke.
 * User: dss
 * Date: 08.09.16
 * Time: 20:33
 */

namespace CoreBundle\Handler;

use Application\Sonata\UserBundle\Entity\User;
use CoreBundle\Model\Handler\EntityHandler;

/**
 * Class CustomerHandler
 * @package CoreBundle\Handler
 */
class CustomerHandler extends EntityHandler
{

    /**
     * @param $post
     * @return User
     */
    public function processCheckUser($post)
    {
        /** @var User $user */
        $user = $this->getEntityBy(['phone'=>$post['phone']]);

        if(!$user){
            $user = $this->createEntity();

            $this->registerUser($user, $post);

            $user = $this->getEntityBy(['phone'=>$post['phone']]);
        }

        return $user;
    }

    /**
     * @param User $user
     * @param $post
     * @return mixed
     */
    private function registerUser($user, $post)
    {
        $user->setUsername($post['phone']);
        $user->setEnabled(true);
        $user->setEmail($post['phone']);
        $user->setPhone($post['phone']);

        $city = $this->container->get('city.handler')->getEntity($post['city_id']);

        $user->setCityId($city);
        $user->setRoles(['ROLE_USER']);

        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);
        $encodedPass = $encoder->encodePassword($post['phone'], $user->getSalt());

        $user->setPassword($encodedPass);

        $this->objectManager->persist($user);
        $this->objectManager->flush();

        return $user;
    }

    /**
     * @param $user
     * @return mixed
     */
    public function getZakaz($user)
    {
         return $this->container->get('zakaz.handler')->getEntities(['customer' => $user]);
    }
}