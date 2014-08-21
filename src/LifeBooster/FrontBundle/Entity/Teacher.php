<?php

namespace LifeBooster\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Teacher
 *
 * @ORM\Table(name="teacher")
 * @ORM\Entity(repositoryClass="LifeBooster\FrontBundle\Entity\TeacherRepository")
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
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    protected $civility;
    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    protected $firstName;
    /**
     * @ORM\Column(type="string", length=50, nullable=false)
     */
    protected $lastName;
    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $email;
    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    protected $phone;
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

    }

    /**
     * __toString
     *
     * @return string
     */
    public function __toString()
    {
        return $this->firstName . ' ' . $this->lastName;
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
     * @return Teacher
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get FirstName
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
     * @return Teacher
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Teacher
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Teacher
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Teacher
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
     * Set phone
     *
     * @param string $phone
     * @return Teacher
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get civilities
     *
     * @return array
     */
    public static function getCivilities()
    {
        $array = array('general.civility.mr', 'general.civility.mrs');

        return array_combine($array, $array);
    }

    /**
     * Set civility
     *
     * @param string $civility
     * @return Teacher
     */
    public function setCivility($civility)
    {
        $this->civility = $civility;

        return $this;
    }

    /**
     * Get civility
     *
     * @return string 
     */
    public function getCivility()
    {
        return $this->civility;
    }
}
