<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Contractors;

class LoadContractorsData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('pl_PL');
        
        for($i = 0; $i <= 40; $i++){
            $contractor = new Contractors();
            $contractor->setBuyLimit($faker->numberBetween(10000, 30000));
            $contractor->setCity($faker->city);
            $contractor->setContract($faker->randomElement([true, false]));
            $contractor->setDiscount($faker->numberBetween(0, 50));
            $contractor->setEmail($faker->email);
            $contractor->setName($faker->name);
            $contractor->setNip($faker->numberBetween(1000000000, 9999999999));
            $contractor->setPhone($faker->phoneNumber);
            $contractor->setPostcode($faker->postcode);
            $contractor->setStreet($faker->streetName);
            $contractor->setStreetNumber($faker->numberBetween(1,300));
            $contractor->setType($faker->numberBetween(1,5));
            $this->setReference('contractor_' . $i, $contractor);
            
            $manager->persist($contractor);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 6;
    }

}
