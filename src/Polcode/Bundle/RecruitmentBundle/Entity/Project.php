<?php

namespace Polcode\Bundle\RecruitmentBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Project
 */
class Project
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $endAt;

    /**
     * @var boolean
     */
    private $isInternal;

    /**
     * @var AM
     */
    private $am;

    /**
     * @var ArrayCollection|Employee[]
     */
    private $employees;

    public function __construct()
    {
        $this->employees = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Project
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Project
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set endAt
     *
     * @param \DateTime $endAt
     * @return Project
     */
    public function setEndAt($endAt)
    {
        $this->endAt = $endAt;

        return $this;
    }

    /**
     * Get endAt
     *
     * @return \DateTime
     */
    public function getEndAt()
    {
        return $this->endAt;
    }

    /**
     * Set isInternal
     *
     * @param boolean $isInternal
     * @return Project
     */
    public function setIsInternal($isInternal)
    {
        $this->isInternal = $isInternal;

        return $this;
    }

    /**
     * Get isInternal
     *
     * @return boolean
     */
    public function getIsInternal()
    {
        return $this->isInternal;
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
     * @return AM
     */
    public function getAm()
    {
        return $this->am;
    }

    /**
     * @param AM $am
     * @return $this
     */
    public function setAm(AM $am)
    {
        $this->am = $am;
        return $this;
    }

    public function __toString()
    {
        return $this->getName().' ('.$this->getId().')';
    }
}
