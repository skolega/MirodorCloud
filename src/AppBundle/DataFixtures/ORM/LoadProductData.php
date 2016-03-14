<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Product;

class LoadProductData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('pl_PL');

        for ($i = 0; $i < 50; $i++) {
            $buyprice = $faker->numberBetween(10, 250);
            $product = new Product();
            $product->setBuyPrice($buyprice);
            $product->setCatalogPrice($buyprice + $faker->numberBetween(10, 250));
            $product->setColor($this->getReference('color_' . $faker->numberBetween(1, 22)));
            $product->setMaufacture($this->getReference('manufacture_' . $faker->numberBetween(1, 5)));
            $product->setName($faker->word . $i);
            $product->setPackaging($faker->numberBetween(7, 14));
            $product->setSize($faker->numberBetween(2, 10));
            $product->setUnit($this->getReference('unit_' . $faker->numberBetween(1, 7)));
            $product->setWeight($faker->numberBetween(601, 1901));
            $this->setReference('product_' . $i, $product);
            $manager->persist($product);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 5;
    }

}
