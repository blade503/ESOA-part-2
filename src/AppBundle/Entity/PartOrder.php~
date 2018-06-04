<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PartOrder
 *
 * @ORM\Table(name="partOrder")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PartOrderRepository")
 */
class PartOrder
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="partOrders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * Many orders have Many parts
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Part", mappedBy="parts_order")
     */
    private $parts;

    /**
     * @var integer
     *
     * @ORM\Column(name="part_id", type="integer")
     */
    private $part;

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
     * Set user
     *
     * @param integer $user
     *
     * @return PartOrder
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set part
     *
     * @param integer $part
     *
     * @return PartOrder
     */
    public function setPart($part)
    {
        $this->part = $part;

        return $this;
    }

    /**
     * Get part
     *
     * @return integer
     */
    public function getPart()
    {
        return $this->part;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->parts = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add part.
     *
     * @param \AppBundle\Entity\Part $part
     *
     * @return PartOrder
     */
    public function addPart(\AppBundle\Entity\Part $part)
    {
        $this->parts[] = $part;

        return $this;
    }

    /**
     * Remove part.
     *
     * @param \AppBundle\Entity\Part $part
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePart(\AppBundle\Entity\Part $part)
    {
        return $this->parts->removeElement($part);
    }

    /**
     * Get parts.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParts()
    {
        return $this->parts;
    }
}
