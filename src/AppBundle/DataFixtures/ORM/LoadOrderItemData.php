<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\OrderItem;

class LoadOrderItemData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('pl_PL');
        
        for ($i = 0 ; $i <= 300; $i++) {
            $product = $this->getReference('product_'.$faker->numberBetween(0,49));
            $item = new OrderItem();
            $item->setOrder($this->getReference('order_'.$faker->numberBetween(0,59)));
            $item->setProduct($product);
            $item->setQuantity($faker->numberBetween(1,20));
            $this->setReference('item_'.$i, $item);
            $manager->persist($item);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 9;
    }

}
