<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 */
class Product
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
     * @ORM\Column(name="buy_price", type="decimal", precision=10, scale=2)
     */
    private $buyPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="catalog_price", type="decimal", precision=10, scale=2)
     */
    private $catalogPrice;

    /**
     * @var int
     *
     * @ORM\Column(name="packaging", type="decimal", precision=10, scale=2)
     */
    private $packaging;

    /**
     * @var int
     *
     * @ORM\Column(name="weight", type="integer")
     */
    private $weight;

    /**
     * @var int
     *
     * @ORM\Column(name="size", type="integer")
     */
    private $size;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;
    
    /**
     * @ORM\ManyToOne(targetEntity="ProductColor", inversedBy="products")
     * 
     */
    private $color;
    
    /**
     * @ORM\ManyToOne(targetEntity="ProductManufacture", inversedBy="products")
     * 
     */
    private $maufacture;
    
    /**
     * @ORM\ManyToOne(targetEntity="Units", inversedBy="products")
     * 
     */
    private $unit;
    
    /**
     *
     * @ORM\OneToMany(targetEntity="OrderItem", mappedBy="product")
     */
    private $orderItem;
    
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
     * @return Product
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
     * Set buyPrice
     *
     * @param string $buyPrice
     *
     * @return Product
     */
    public function setBuyPrice($buyPrice)
    {
        $this->buyPrice = $buyPrice;

        return $this;
    }

    /**
     * Get buyPrice
     *
     * @return string
     */
    public function getBuyPrice()
    {
        return $this->buyPrice;
    }

    /**
     * Set catalogPrice
     *
     * @param string $catalogPrice
     *
     * @return Product
     */
    public function setCatalogPrice($catalogPrice)
    {
        $this->catalogPrice = $catalogPrice;

        return $this;
    }

    /**
     * Get catalogPrice
     *
     * @return string
     */
    public function getCatalogPrice()
    {
        return $this->catalogPrice;
    }

    /**
     * Set packaging
     *
     * @param integer $packaging
     *
     * @return Product
     */
    public function setPackaging($packaging)
    {
        $this->packaging = $packaging;

        return $this;
    }

    /**
     * Get packaging
     *
     * @return int
     */
    public function getPackaging()
    {
        return $this->packaging;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return Product
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set size
     *
     * @param integer $size
     *
     * @return Product
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Product
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set color
     *
     * @param \AppBundle\Entity\ProductColor $color
     *
     * @return Product
     */
    public function setColor(\AppBundle\Entity\ProductColor $color = null)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return \AppBundle\Entity\ProductColor
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set maufacture
     *
     * @param \AppBundle\Entity\ProductManufacture $maufacture
     *
     * @return Product
     */
    public function setMaufacture(\AppBundle\Entity\ProductManufacture $maufacture = null)
    {
        $this->maufacture = $maufacture;

        return $this;
    }

    /**
     * Get maufacture
     *
     * @return \AppBundle\Entity\ProductManufacture
     */
    public function getMaufacture()
    {
        return $this->maufacture;
    }

    /**
     * Set unit
     *
     * @param \AppBundle\Entity\Units $unit
     *
     * @return Product
     */
    public function setUnit(\AppBundle\Entity\Units $unit = null)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return \AppBundle\Entity\Units
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set orders
     *
     * @param \AppBundle\Entity\Orders $orders
     *
     * @return Product
     */
    public function setOrders(\AppBundle\Entity\Orders $orders = null)
    {
        $this->orders = $orders;

        return $this;
    }

    /**
     * Get orders
     *
     * @return \AppBundle\Entity\Orders
     */
    public function getOrders()
    {
        return $this->orders;
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
     * @return Product
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
     * Add orderItem
     *
     * @param \AppBundle\Entity\Product $orderItem
     *
     * @return Product
     */
    public function addOrderItem(\AppBundle\Entity\Product $orderItem)
    {
        $this->orderItem[] = $orderItem;

        return $this;
    }

    /**
     * Remove orderItem
     *
     * @param \AppBundle\Entity\Product $orderItem
     */
    public function removeOrderItem(\AppBundle\Entity\Product $orderItem)
    {
        $this->orderItem->removeElement($orderItem);
    }

    /**
     * Get orderItem
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrderItem()
    {
        return $this->orderItem;
    }
}
