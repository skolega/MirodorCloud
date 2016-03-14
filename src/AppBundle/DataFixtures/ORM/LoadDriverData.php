<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Driver;

class LoadDriverData extends AbstractFixture implements OrderedFixtureInterface
{

    public function getOrder()
    {
        return 7;
    }

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('pl_PL');
        
        for ($i = 0; $i < 5; $i++) {
            $driver = new Driver();
            $driver->setCarCapacity($faker->numberBetween(800, 24000));
            $driver->setCarNumber($faker->word . $faker->numberBetween(11111,99999));
            $driver->setDriverName($faker->name);
            $driver->setDriverPhone($faker->phoneNumber);
            $driver->setName($faker->word . $i);
            $this->setReference('driver_' . $i, $driver);
            $manager->persist($driver);
        }
        $manager->flush();
    }

}
