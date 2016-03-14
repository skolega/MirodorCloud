<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Driver
 *
 * @ORM\Table(name="driver")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DriverRepository")
 */
class Driver
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
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="car_number", type="string", length=255)
     */
    private $carNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="driver_name", type="string", length=255)
     */
    private $driverName;

    /**
     * @var string
     *
     * @ORM\Column(name="driver_phone", type="string", length=255)
     */
    private $driverPhone;

    /**
     * @var int
     *
     * @ORM\Column(name="car_capacity", type="integer")
     */
    private $carCapacity;
    
    /**
     * @ORM\OneToMany(targetEntity="Orders", mappedBy="driver")
     * 
     */
    private $orders;
    
    public function __toString()
    {
        return $this->name;
    }


    /**
     * Get id
     *
     * @return int
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
     * @return Driver
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
     * Set carNumber
     *
     * @param string $carNumber
     *
     * @return Driver
     */
    public function setCarNumber($carNumber)
    {
        $this->carNumber = $carNumber;

        return $this;
    }

    /**
     * Get carNumber
     *
     * @return string
     */
    public function getCarNumber()
    {
        return $this->carNumber;
    }

    /**
     * Set driverName
     *
     * @param string $driverName
     *
     * @return Driver
     */
    public function setDriverName($driverName)
    {
        $this->driverName = $driverName;

        return $this;
    }

    /**
     * Get driverName
     *
     * @return string
     */
    public function getDriverName()
    {
        return $this->driverName;
    }

    /**
     * Set driverPhone
     *
     * @param string $driverPhone
     *
     * @return Driver
     */
    public function setDriverPhone($driverPhone)
    {
        $this->driverPhone = $driverPhone;

        return $this;
    }

    /**
     * Get driverPhone
     *
     * @return string
     */
    public function getDriverPhone()
    {
        return $this->driverPhone;
    }

    /**
     * Set carCapacity
     *
     * @param integer $carCapacity
     *
     * @return Driver
     */
    public function setCarCapacity($carCapacity)
    {
        $this->carCapacity = $carCapacity;

        return $this;
    }

    /**
     * Get carCapacity
     *
     * @return int
     */
    public function getCarCapacity()
    {
        return $this->carCapacity;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->orders = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add order
     *
     * @param \AppBundle\Entity\Orders $order
     *
     * @return Driver
     */
    public function addOrder(\AppBundle\Entity\Orders $order)
    {
        $this->orders[] = $order;

        return $this;
    }

    /**
     * Remove order
     *
     * @param \AppBundle\Entity\Orders $order
     */
    public function removeOrder(\AppBundle\Entity\Orders $order)
    {
        $this->orders->removeElement($order);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrders()
    {
        return $this->orders;
    }

    /**
     * Set orders
     *
     * @param \AppBundle\Entity\Orders $orders
     *
     * @return Driver
     */
    public function setOrders(\AppBundle\Entity\Orders $orders = null)
    {
        $this->orders = $orders;

        return $this;
    }
}
