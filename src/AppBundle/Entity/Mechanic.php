<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mechanic
 *
 * @ORM\Table(name="mechanic")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MechanicRepository")
 */
class Mechanic
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
     * @ORM\Column(name="garage", type="string", length=255)
     */
    private $garage;

    /**
     * @var string
     *
     * @ORM\Column(name="certifications", type="string", length=255)
     */
    private $certifications;

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
     * Set garage
     *
     * @param string $garage
     *
     * @return Mechanic
     */
    public function setGarage($garage)
    {
        $this->garage = $garage;

        return $this;
    }

    /**
     * Get garage
     *
     * @return string
     */
    public function getGarage()
    {
        return $this->garage;
    }

    /**
     * Set certifications
     *
     * @param string $certifications
     *
     * @return Mechanic
     */
    public function setCertifications($certifications)
    {
        $this->certifications = $certifications;

        return $this;
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
}
