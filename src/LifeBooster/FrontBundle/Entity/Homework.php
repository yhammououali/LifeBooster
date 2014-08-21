<?php

namespace LifeBooster\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Homework
 *
 * @ORM\Table(name="homework")
 * @ORM\Entity(repositoryClass="LifeBooster\FrontBundle\Entity\HomeworkRepository")
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
     * @ORM\ManyToMany(targetEntity="LifeBooster\FrontBundle\Entity\Discipline", mappedBy="disciplines")
     */
    private $disciplines;
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
        $this->disciplines = new ArrayCollection();
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