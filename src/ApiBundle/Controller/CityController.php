<?php
/**
 * Created by aqaduke.
 * User: dss
 * Date: 08.09.16
 * Time: 19:14
 */

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
 * @RouteResource("City")
 */
class CityController extends Controller
{

    /**
     * @return object
     */
    public function getService()
    {
        return $this->container->get('city.handler');
    }

    /**
     * @ApiDoc(
     *  resource=true,
     *  section="City",
     *  description="Get reason by filter",
     *  statusCodes={
     *      200 = "Ok",
     *      204 = "City not found",
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
        return $this->getService()->getEntities();
    }
}