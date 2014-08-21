<?php

namespace LifeBooster\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Discipline
 *
 * @ORM\Table(name="discipline")
 * @ORM\Entity(repositoryClass="LifeBooster\FrontBundle\Entity\DisciplineRepository")
 */
class Teacher
{
	/**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
    */
    protected $id;
    /**
     * @ORM\ManyToMany(targetEntity="LifeBooster\FrontBundle\Entity\Homework", inversedBy="homeworks", cascade={"persist"})
     * @ORM\JoinTable(name="discipline_homeworks")
     */
    private $homeworks;
    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    protected $name;
    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    protected $code;
    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
    */
    protected $createdAt;
    /**
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
    */
    protected $updatedAt;

    /**
     * __construct
     */
    public function __construct()
    {
        $this->homeworks = new ArrayCollection();
    }

    /**
     * __toString
     *
     * @return string
     */
    public function __toString()
    {
        return '';
    }
}