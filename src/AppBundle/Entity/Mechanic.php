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
    public function __construct($name)
    {
        $this->name = $name;
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Garage", inversedBy="mechanics")
     * @ORM\JoinColumn(name="garage_id", referencedColumnName="id")
     */
    private $garage;

    /**
     * Many Mechnanic have many certifications.
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Certification", inversedBy="mechanics")
     * @ORM\JoinTable(name="mechanics_certifications")
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
}
