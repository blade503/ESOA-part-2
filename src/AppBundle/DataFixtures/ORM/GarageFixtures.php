<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Garage;
use AppBundle\Entity\Part;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class GarageFixtures implements ORMFixtureInterface
{
    protected $part;

    public function __construct()
    {
        $this->part = array(
            ["Oh My Garage","13, Rue Monte Cristo"],
            ["What's In My Garage", "34, Rue de Penthièvre"],
            ["THE Local Garage", "12, Rue de l'égalité"],
        );
    }

    public function load(ObjectManager $manager)
    {
        foreach ($this->part as $p) {
            $garage = new Garage($p[0], $p[1]);
            $manager->persist($garage);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}