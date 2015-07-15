<?php

namespace Polcode\Bundle\RecruitmentBundle\Admin;

use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class EmployeeAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('project');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('am')
            ->add('project')
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
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('am')
            ->add('project', null, ['required' => true, 'query_builder' => function (EntityRepository $repo) {
                return $repo->createQueryBuilder('p')->orderBy('p.isInternal', 'desc'); // just making sure internal project is first on list
            }]);
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('am');
    }

    public function validate(ErrorElement $errorElement, $object)
    {
        $errorElement
            ->with('firstName')->addConstraint(new NotBlank())->end()
            ->with('lastName')->addConstraint(new NotBlank())->end()
            ->with('email')->addConstraint(new NotBlank())->addConstraint(new Email())->end()
            ->with('am')->addConstraint(new NotBlank())->end()
            ->with('project')->addConstraint(new NotBlank())->end();
    }
}
