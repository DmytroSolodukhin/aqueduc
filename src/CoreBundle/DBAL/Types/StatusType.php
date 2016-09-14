<?php
/**
 * Created by PhpStorm.
 * User: in
 * Date: 13.07.16
 * Time: 12:22.
 */

namespace CoreBundle\DBAL\Types;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

/**
 * Class StatusType.
 */
final class StatusType extends AbstractEnumType
{
    const TASK = 'task';
    const CHECKLIST = 'checklist';

    protected static $choices = [
        self::TASK => 'task',
        self::CHECKLIST => 'checklist',
    ];
}
