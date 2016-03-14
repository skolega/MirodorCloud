<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @ORM\OneToMany(targetEntity="Orders", mappedBy="createdBy")
     * 
     */
    private $order;
    
    /**
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return User
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
     * Add order
     *
     * @param \AppBundle\Entity\Orders $order
     *
     * @return User
     */
    public function addOrder(\AppBundle\Entity\Orders $order)
    {
        $this->order[] = $order;

        return $this;
    }

    /**
     * Remove order
     *
     * @param \AppBundle\Entity\Orders $order
     */
    public function removeOrder(\AppBundle\Entity\Orders $order)
    {
        $this->order->removeElement($order);
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
