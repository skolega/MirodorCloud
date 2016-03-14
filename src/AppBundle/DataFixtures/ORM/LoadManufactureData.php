<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\ProductManufacture;

class LoadManufactureData extends AbstractFixture implements OrderedFixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('pl_PL');
        $manufactures = [
            'polbruk',
            'joniec',
            'kost-bet',
            'cellfast',
            'ekobruk',
        ];

        $i = 1;
        foreach ($manufactures as $manufacture) {
            $productmanufacture = new ProductManufacture();
            $productmanufacture->setName($manufacture);
            $productmanufacture->setAddress($faker->address);
            $productmanufacture->setEmail($faker->email);
            $productmanufacture->setTelephone($faker->phoneNumber);
            $this->setReference('manufacture_' . $i++, $productmanufacture);
            $manager->persist($productmanufacture);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }

}
