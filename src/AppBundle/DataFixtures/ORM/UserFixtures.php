<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Certification;
use AppBundle\Entity\Garage;
use AppBundle\Entity\Mechanic;
use AppBundle\Entity\Part;
use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures implements ORMFixtureInterface
{
    protected $user;

    public function __construct()
    {
        $this->user = array(
            ["Michael","A", "Oh My Garage", "michael@gmail.com"],
            ["Anthony", "A", "Oh My Garage", "anthony@gmail.com"],
            ["Damien", "C", "Oh My Garage", "damien@gmail.com"],
            ["Nicolas", "B", "What's In My Garage", "nicolas@gmail.com"],
            ["Simon", "C", "What's In My Garage", "simon@gmail.com"],
            ["Eva", "A", "What's In My Garage", "eva@gmail.com"],
            ["Isabelle", "B", "THE Local Garage", "isabelle@gmail.com"],
            ["Antoine", "C", "THE Local Garage", "antoine@gmail.com"],
            ["Etienne", "B", "THE Local Garage", "etienne@gmail.com"],
        );
    }

    public function load(ObjectManager $manager)
    {
        foreach ($this->user as $m) {
            $mechanic = new User($m[0], $m[3]);

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