<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Part
 *
 * @ORM\Table(name="part")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PartRepository")
 */
class Part
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
     * @ORM\Column(name="number", type="string", length=255)
     */
    private $number;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantityInStock", type="integer")
     */
    private $quantityInStock;

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
     * Set number
     *
     * @param string $number
     *
     * @return Part
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set quantityInStock
     *
     * @param integer $quantityInStock
     *
     * @return Part
     */
    public function setQuantityInStock($quantityInStock)
    {
        $this->quantityInStock = $quantityInStock;

        return $this;
    }

    /**
     * Get quantityInStock
     *
     * @return integer
     */
    public function getQuantityInStock()
    {
        return $this->quantityInStock;
    }
}
