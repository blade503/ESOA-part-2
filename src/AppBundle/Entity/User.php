<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User
{
    public function __construct($name, $email, $roles = array('ROLE_USER'))
    {
        $this->name = $name;
        $this->roles = $roles;
        $this->email = $email;
        $this->password = 'abcd';
        $this->certifications = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Garage", inversedBy="users")
     * @ORM\JoinColumn(name="garage_id", referencedColumnName="id")
     */
    private $garage;

    /**
     * Many User have many certifications.
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Certification", inversedBy="users")
     * @ORM\JoinTable(name="users_certifications")
     */
    private $certifications;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PartOrder", mappedBy="user")
     */
    private $partOrders;

    /**
     * @var array
     *
     * Roles can be 'ROLE_USER', 'ROLE_MECHANIC', 'ROLE_GARAGE', 'ROLE_BE'
     */
    private $roles;

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
     *
     * @return Mechanic
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
     * Get certifications
     *
     * @return string
     */
    public function getCertifications()
    {
        return $this->certifications;
    }

    /**
     * Add certification.
     *
     * @param \AppBundle\Entity\Certification $certification
     *
     * @return Mechanic
     */
    public function addCertification(\AppBundle\Entity\Certification $certification)
    {
        $this->certifications[] = $certification;

        return $this;
    }

    /**
     * Remove certification.
     *
     * @param \AppBundle\Entity\Certification $certification
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCertification(\AppBundle\Entity\Certification $certification)
    {
        return $this->certifications->removeElement($certification);
    }

    /**
     * Set garage.
     *
     * @param \AppBundle\Entity\Garage|null $garage
     *
     * @return Mechanic
     */
    public function setGarage(\AppBundle\Entity\Garage $garage = null)
    {
        $this->garage = $garage;

        return $this;
    }

    /**
     * Get garage.
     *
     * @return \AppBundle\Entity\Garage|null
     */
    public function getGarage()
    {
        return $this->garage;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Add partOrder.
     *
     * @param \AppBundle\Entity\PartOrder $partOrder
     *
     * @return User
     */
    public function addPartOrder(\AppBundle\Entity\PartOrder $partOrder)
    {
        $this->partOrders[] = $partOrder;

        return $this;
    }

    /**
     * Remove partOrder.
     *
     * @param \AppBundle\Entity\PartOrder $partOrder
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePartOrder(\AppBundle\Entity\PartOrder $partOrder)
    {
        return $this->partOrders->removeElement($partOrder);
    }

    /**
     * Get partOrders.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPartOrders()
    {
        return $this->partOrders;
    }
}
