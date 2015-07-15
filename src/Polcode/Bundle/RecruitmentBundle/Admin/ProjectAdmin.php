<?php

namespace Polcode\Bundle\RecruitmentBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Symfony\Component\Validator\Constraints\NotBlank;

class ProjectAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
            ->add('isInternal')
            ->add('createdAt')
            ->add('endAt')
            ->add('am')
            ->add('id');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name')
            ->add('isInternal')
            ->add('createdAt')
            ->add('endAt')
            ->add('am')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ));
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name')
            ->add('isInternal')
            ->add('createdAt', null, ['data' => new \DateTime()])// we could define current date in entity constructor but let's keep the entities as simple as possible
            ->add('endAt')
            ->add('am');
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('name')
            ->add('isInternal')
            ->add('createdAt')
            ->add('endAt')
            ->add('am');
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('name')->addConstraint(new NotBlank())->end()
            ->with('createdAt')->addConstraint(new NotBlank())->end();
    }


}
