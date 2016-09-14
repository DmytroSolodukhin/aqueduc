<?php
/**
 * Created by aqaduke.
 * User: dss
 * Date: 06.09.16
 * Time: 16:39
 */

namespace CoreBundle\Handler;

use CoreBundle\Entity\Zakaz;
use CoreBundle\Model\Handler\EntityHandler;
use Symfony\Component\HttpFoundation\Request;

class ZakazHandler extends EntityHandler
{

    public function createZakaz(Request $request)
    {

        $secret = $this->container->getParameter('app_key');
        $post = $request->request->all();

        if($post['hash'] == md5(md5($secret).$post['phone'].$post['user_id'])){

            /** @var Zakaz $zakaz */
            $zakaz = $this->createEntity();

            $reason = $this->container->get('reason.handler')->getEntity($post['reason_id']);
            $user = $this->container->get('customer.handler')->getEntity($post['user_id']);

            $zakaz->setReason($reason);
            $zakaz->setCustomer($user);

            if(isset($post['title'])){
                $zakaz->setTitle($post['title']);
            }

            $zakaz->setVisible(true);
        }

    }
}