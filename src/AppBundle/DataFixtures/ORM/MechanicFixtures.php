<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Certification;
use AppBundle\Entity\Garage;
use AppBundle\Entity\Mechanic;
use AppBundle\Entity\Part;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class MechanicFixtures implements ORMFixtureInterface
{
    protected $mechanic;

    public function __construct()
    {
        $this->mechanic = array(
            ["Michael","A", "Oh My Garage"],
            ["Anthony", "A", "Oh My Garage"],
            ["Damien", "C", "Oh My Garage"],
            ["Nicolas", "B", "What's In My Garage"],
            ["Simon", "C", "What's In My Garage"],
            ["Eva", "A", "What's In My Garage"],
            ["Isabelle", "B", "THE Local Garage"],
            ["Antoine", "C", "THE Local Garage"],
            ["Etienne", "B", "THE Local Garage"],
        );
    }

    public function load(ObjectManager $manager)
    {
        foreach ($this->mechanic as $m) {
            $mechanic = new Mechanic($m[0]);

            $certification = $manager
                ->getRepository(Certification::class)
                ->findByCode($m[1]);

            $mechanic->addCertification($certification[0]);

            $garage = $manager
                ->getRepository(Garage::class)
                ->findByName($m[2]);

            $mechanic->setGarage($garage[0]);

            $manager->persist($mechanic);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 4;
    }
}