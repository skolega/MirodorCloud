<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\ProductColor;

class LoadColorData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('pl_PL');
        
        for ($i = 0 ; $i <= 22; $i++) {
            $color = new ProductColor();
            $color->setName($faker->colorName . $i);
            $this->setReference('color_'.$i, $color);
            $manager->persist($color);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }

}
