<?php

namespace Polcode\Bundle\RecruitmentBundle\Admin;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Polcode\Bundle\RecruitmentBundle\Entity\Employee;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Symfony\Component\Validator\Constraints\Count;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\NotBlank;

class EmployeeAdmin extends Admin
{
    /**
     * @var EntityRepository
     */
    private $projectRepo;

    /**
     * @param EntityManagerInterface $entityManager
     * @return $this
     */
    public function setRepositories($entityManager)
    {
        $this->projectRepo = $entityManager->getRepository('PolcodeRecruitmentBundle:Project');
        return $this;
    }


    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('projects');
    }

    public function getNewInstance()
    {
        $instance = parent::getNewInstance();
        /* @var $instance Employee */
        $instance->getProjects()->add($this->projectRepo->findOneBy(['isInternal' => true]));
        return $instance;
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
            ->add('projects')
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
            ->add('projects');
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
            ->add('am')
            ->add('projects');
    }
}
