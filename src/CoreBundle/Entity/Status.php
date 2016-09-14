<?php
/**
 * Created by aqaduke.
 * User: dss
 * Date: 08.09.16
 * Time: 20:06
 */

namespace CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="status")
 */
class Status
{
    use ITDTrait;
}