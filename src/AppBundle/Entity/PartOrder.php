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
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer")
     */
    private $user;

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
}
