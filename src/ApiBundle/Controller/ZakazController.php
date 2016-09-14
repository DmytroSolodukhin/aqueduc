<?php

namespace ApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations;

/**
 * Class ZakazController.
 *
 * @RouteResource("Zakaz")
 */
class ZakazController extends Controller
{
    /**
     * @return object
     */
    public function getService()
    {
        return $this->container->get('zakaz.handler');
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Zakaz",
     *  description="Get zakaz by filter",
     *  statusCodes={
     *      200 = "Ok",
     *      204 = "Zakaz not found",
     *      400 = "Bad format",
     *      403 = "Forbidden"
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
        return $this->getService()->getEntities(['user_id' => $request->get('user_id')]);
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="Zakaz",
     *  description="Create zakaz",
     *  statusCodes={
     *      200 = "Ok",
     *      204 = "",
     *      400 = "Bad format",
     *      403 = "Forbidden"
     *  }
     *)
     *
     * @param Request $request
     *
     * @return Response
     *
     * @throws \Exception
     */
    public function postAction(Request $request)
    {
        return $this->getService()->createZakaz($request);
    }
}
