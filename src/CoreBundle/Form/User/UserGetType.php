<?php

namespace CoreBundle\Form\User;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Created by aqaduke.
 * User: dss
 * Date: 11.09.16
 * Time: 3:20
 */
class UserGetType
{
    /**
     * @Assert\NotBlank()
     */
    protected $user_id = '';

    /**
     * @param FormEvent $event
     */
    public function preSubmit(FormEvent $event)
    {
        $event
            ->getForm()
            ->add('user_id', IntegerType::class, [
                'required' => true,
            ]);
    }
}