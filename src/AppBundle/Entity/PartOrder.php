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
    const NEW_ORDER = 0;
    const ACCEPTED_ORDER = 10;
    const IN_TRANSIT_ORDER = 20;
    const DELIVERED_ORDER = 30;
    const DELETED_ORDER = 40;

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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Part", inversedBy="Orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $part;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity", type="integer")
     */
    private $quantity;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * Constructor
     */
    public function __construct($user, $part, $quantity)
    {
        $this->user = $user;
        $this->part = $part;
        $this->quantity = $quantity;
        $this->status = PartOrder::NEW_ORDER;
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
     * Set quantity.
     *
     * @param int $quantity
     *
     * @return PartOrder
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * Get quantity.
     *
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set part.
     *
     * @param \AppBundle\Entity\Part $part
     *
     * @return PartOrder
     */
    public function setPart(\AppBundle\Entity\Part $part)
    {
        $this->part = $part;

        return $this;
    }

    /**
     * Get part.
     *
     * @return \AppBundle\Entity\Part
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * Set status.
     *
     * @param int $status
     *
     * @return PartOrder
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }
}
