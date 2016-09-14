<?php

namespace CoreBundle\Form\Reason;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * Created by aqaduke.
 * User: dss
 * Date: 11.09.16
 * Time: 2:57
 */
class ReasonGetType
{
    /**
     * @Assert\NotBlank()
     */
    protected $city_id = '';

    /**
     * @param FormEvent $event
     */
    public function preSubmit(FormEvent $event)
    {
        $event
            ->getForm()
            ->add('city_id', IntegerType::class, [
                'required' => true,
            ]);
    }
}