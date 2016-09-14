<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations;

/**
 * Class ReasonController.
 *
 * @RouteResource("Reason")
 */
class ReasonController extends Controller
{

    /**
     * @return object
     */
    public function getService()
    {
        return $this->container->get('reason.handler');
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Reason",
     *  description="Get reason by filter",
     *  statusCodes={
     *      200 = "Ok",
     *      204 = "Reason not found",
     *      400 = "Bad format",
     *      403 = "Forbidden"
     *  },
     *  input={
     *     "class" = "CoreBundle\Form\Reason\ReasonGetType",
     *     "city_id" = ""
     *  }
     *)
     *
     * @param Request $request
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function getAction(Request $request)
    {
        $city_id = $request->query->get('city_id');

        if($city_id){
            return $this->getService()->getEntities(['city_id' => $city_id]);

        }

        return ['error' => 204];

    }

}
