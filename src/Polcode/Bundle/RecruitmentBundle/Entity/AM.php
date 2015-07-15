<?php

namespace Polcode\Bundle\RecruitmentBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * AM
 */
class AM
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $email;

    /**
     * @var ArrayCollection|Project[]
     */
    private $projects;

    /**
     * @var ArrayCollection|Employee[]
     */
    private $employees;

    public function __construct()
    {
        $this->employees = new ArrayCollection();
        $this->projects = new ArrayCollection();
    }


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return AM
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return AM
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return AM
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return ArrayCollection|Employee[]
     */
    public function getEmployees()
    {
        return $this->employees;
    }

    /**
     * @param ArrayCollection|Employee[] $employees
     * @return $this
     */
    public function setEmployees(ArrayCollection $employees)
    {
        $this->employees = $employees;
        return $this;
    }

    /**
     * @return ArrayCollection|Project[]
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * @param ArrayCollection|Project[] $projects
     * @return $this
     */
    public function setProjects(ArrayCollection $projects)
    {
        $this->projects = $projects;
        return $this;
    }


    public function __toString()
    {
        return $this->getFirstName() . ' ' . $this->getLastName() . ' (' . $this->getEmail() . ')';
    }
}
