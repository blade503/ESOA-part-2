<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Garage
 *
 * @ORM\Table(name="garage")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GarageRepository")
 */
class Garage
{
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
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Mechanic", mappedBy="garage")
     */
    private $mechanics;

    public function __construct($name, $address)
    {
        $this->address = $address;
        $this->name = $name;
        $this->mechanics = new ArrayCollection();
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
     *
     * @return Garage
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
     * Set address
     *
     * @param string $address
     *
     * @return Garage
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set mechanics
     *
     * @param string $mechanics
     *
     * @return Garage
     */
    public function setMechanics($mechanics)
    {
        $this->mechanics = $mechanics;

        return $this;
    }

    /**
     * Get mechanics
     *
     * @return string
     */
    public function getMechanics()
    {
        return $this->mechanics;
    }

    /**
     * Add mechanic.
     *
     * @param \AppBundle\Entity\Mechanic $mechanic
     *
     * @return Garage
     */
    public function addMechanic(\AppBundle\Entity\Mechanic $mechanic)
    {
        $this->mechanics[] = $mechanic;

        return $this;
    }

    /**
     * Remove mechanic.
     *
     * @param \AppBundle\Entity\Mechanic $mechanic
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeMechanic(\AppBundle\Entity\Mechanic $mechanic)
    {
        return $this->mechanics->removeElement($mechanic);
    }
}
