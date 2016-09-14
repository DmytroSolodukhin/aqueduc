<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Application\Sonata\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations;

/**
 * Class UserController.
 *
 * @RouteResource("User")
 */
class UserController extends Controller
{

    /**
     * @return object
     */
    public function getService()
    {
        return $this->container->get('customer.handler');
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="User",
     *  description="Get users by filter",
     *  statusCodes={
     *      200 = "Ok",
     *      204 = "Users not found",
     *      400 = "Bad format",
     *      403 = "Forbidden"
     *  },
     *  input={
     *     "class" = "CoreBundle\Form\User\UserGetType",
     *     "city_id" = ""
     *  }
     *)
     * @Annotations\Get("/")
     *
     * @param Request $request
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function getAction(Request $request)
    {
        $user_id = $request->query->get('user_id');

        if($user_id){
            $user = $this->getService()->getEntity($user_id);

            return $this->returnUser($user);
        }

        return ['error' => 204];

    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="User",
     *  description="Login user",
     *  input={
     *       "class" = "CoreBundle\Form\User\UserLoginType",
     *       "name" = ""
     *  },
     *  statusCodes={
     *      200 = "Ok",
     *      204 = "Users not found",
     *      400 = "Bad format",
     *      403 = "Forbidden"
     *  }
     *)
     * @Annotations\Post("/login")
     *
     * @param Request $request
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function postLoginAction(Request $request)
    {
        $post = $request->request->all();

        /** @var User $user */
        $user =  $this->getService()->processCheckUser($post);

        return $this->returnUser($user);
    }

    private function returnUser(User $user)
    {
        $zakaz = $this->getService()->getZakaz($user);

        return [
            'user_id' => $user->getId(),
            'order' => $zakaz,
            'city' => $user->getCityId()
        ];
    }
}
