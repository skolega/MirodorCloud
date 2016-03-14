<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Orders;

class LoadOrdersData extends AbstractFixture implements OrderedFixtureInterface
{

    public function getOrder()
    {
        return 8;
    }

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('pl_PL');

        for ($i = 0; $i < 60; $i++) {
            $order = new Orders();
            $order->setRealisationDate($faker->dateTimeThisMonth);
            $order->setDestination($faker->address);
            $order->setDriver($this->getReference('driver_' . $faker->numberBetween(0, 4)));
            $order->setIsSended($faker->randomElement([true, false]));
            $order->setStatus($faker->numberBetween(1, 5));
            $order->setTranshipmentSquare($faker->randomElement([true, false]));
            $order->setManufacture($this->getReference('manufacture_'.$faker->numberBetween(1,5)));
            $this->setReference('order_' . $i, $order);
//            $order->addProduct($this->getReference('product_' . $faker->numberBetween(0, 49)));
            $order->setClient($this->getReference('contractor_' . $faker->numberBetween(0, 39)));
            $order->setDriver($this->getReference('driver_'.$faker->numberBetween(0,4)));

            $manager->persist($order);
        }
        $manager->flush();
    }

}
