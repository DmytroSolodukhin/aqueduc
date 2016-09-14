<?php
/**
 * Created by PhpStorm.
 * User: dss
 * Date: 16.12.15
 * Time: 12:24
 */

namespace CoreBundle\Admin;

use Application\Sonata\UserBundle\Entity\User;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class ReasonAdmin
 * @package CoreBundle\Admin
 */
class ReasonAdmin extends AbstractAdmin
{

    /**
     * @var
     */
    protected $container;

    /**
     * ForumPostAdmin constructor.
     * @param string $code
     * @param string $class
     * @param string $baseControllerName
     * @param $container
     */
    public function __construct($code, $class, $baseControllerName, $container)
    {
        parent::__construct($code, $class, $baseControllerName);
        $this->container = $container;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('title', 'text',[
            'label' => 'название проблемы',
            ])
            ->add('description','sonata_simple_formatter_type', [
                'format' => 'richhtml',
                'label' => 'Описание',
                'required' => false
            ])
            ->add('visible', 'checkbox',[
                'label' => 'показывать',
                'required' => false
            ]);
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title');
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title')
        ->add('visible', 'boolean', [ 'editable' => true ]);
    }

    /**
     * @param mixed $formPost
     */
    public function prePersist($formPost)
    {
        /** @var User $user */
        $user = $this->container->get('security.context')->getToken()->getUser();
        $formPost->setCity($user->getCityId());
    }
}