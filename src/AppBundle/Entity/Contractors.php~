<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contractors
 *
 * @ORM\Table(name="contractors")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContractorsRepository")
 */
class Contractors
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
     * @ORM\Column(name="street", type="string", length=255, nullable=true)
     */
    private $street;

    /**
     * @var string
     *
     * @ORM\Column(name="street_number", type="string", length=255, nullable=true)
     */
    private $streetNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="postcode", type="string", length=6, nullable=true)
     */
    private $postcode;

    /**
     * @var string
     *
     * @ORM\Column(name="nip", type="string", length=255, nullable=true)
     */
    private $nip;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

    /**
     * @var int
     *
     * @ORM\Column(name="discount", type="integer", nullable=true)
     */
    private $discount;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255, nullable=true)
     */
    private $phone;

    /**
     * @var int
     *
     * @ORM\Column(name="buy_limit", type="integer", nullable=true)
     */
    private $buyLimit;

    /**
     * @var bool
     *
     * @ORM\Column(name="contract", type="boolean")
     */
    private $contract;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;
    
    /**
     * @ORM\OneToMany(targetEntity="Orders", mappedBy="client")
     * 
     */
    private $order;
    
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
     * @return Contractors
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
     * Set street
     *
     * @param string $street
     *
     * @return Contractors
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set streetNumber
     *
     * @param string $streetNumber
     *
     * @return Contractors
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    /**
     * Get streetNumber
     *
     * @return string
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Contractors
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     *
     * @return Contractors
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set nip
     *
     * @param string $nip
     *
     * @return Contractors
     */
    public function setNip($nip)
    {
        $this->nip = $nip;

        return $this;
    }

    /**
     * Get nip
     *
     * @return string
     */
    public function getNip()
    {
        return $this->nip;
    }

    /**
     * Set type
     *
     * @param integer $type
     *
     * @return Contractors
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set discount
     *
     * @param integer $discount
     *
     * @return Contractors
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return int
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return Contractors
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
     * Set buyLimit
     *
     * @param integer $buyLimit
     *
     * @return Contractors
     */
    public function setBuyLimit($buyLimit)
    {
        $this->buyLimit = $buyLimit;

        return $this;
    }

    /**
     * Get buyLimit
     *
     * @return int
     */
    public function getBuyLimit()
    {
        return $this->buyLimit;
    }

    /**
     * Set contract
     *
     * @param boolean $contract
     *
     * @return Contractors
     */
    public function setContract($contract)
    {
        $this->contract = $contract;

        return $this;
    }

    /**
     * Get contract
     *
     * @return bool
     */
    public function getContract()
    {
        return $this->contract;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Contractors
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
     * @return Contractors
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
     * @return Contractors
     */
    public function setOrders(\AppBundle\Entity\Orders $orders = null)
    {
        $this->orders = $orders;

        return $this;
    }

    /**
     * Get order
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrder()
    {
        return $this->order;
    }
}
