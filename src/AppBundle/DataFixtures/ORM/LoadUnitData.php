<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\Units;

class LoadUnitData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $units = [
            'kg',
            'm2',
            'mb',
            'szt',
            'rg',
            't',
            'm3',
        ];
        
        $i=1;
        foreach ($units as $productUnit) {
            $unit = new Units();
            $unit->setName($productUnit);
            $this->addReference('unit_'.$i++, $unit);
            $manager->persist($unit);
        }
        $manager->flush();
    }

    public function getOrder()
    {
        return 4;
    }

}
