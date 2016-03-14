<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

use AppBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function getOrder()
    {
        return 1;
    }

    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('pl_PL');
        
        $user = new User();
            $user->setEmail('abadambuczek@gmail.com');
            $user->setEnabled(true);
            $user->setPlainPassword('admin');
            $user->setName($faker->name);
            $user->setUsername('admin');
            $user->hasRole('ROLE_ADMIN');
            $this->setReference('user_admin', $user);
            $manager->persist($user);
        
        for($i=0; $i<20; $i++){
            $user = new User();
            $user->setEmail($faker->email);
            $user->setEnabled(true);
            $user->setPlainPassword('user' . $i);
            $user->setName($faker->name);
            $user->setUsername('user'.$i);
            $user->hasRole('ROLE_USER');
            $this->setReference('user_' . $i, $user);
            $manager->persist($user);
        }
        $manager->flush();
        
    }
}
