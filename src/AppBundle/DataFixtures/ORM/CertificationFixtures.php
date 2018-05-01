<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Certification;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CertificationFixtures implements ORMFixtureInterface
{
    protected $certification;

    public function __construct()
    {
        $this->certification = array(
            ["Alpha Certification", "A", "That's certification A"],
            ["Bravo Certification", "B", "That's certification B"],
            ["Charlie Certification", "C", "That's certification C"],
        );
    }

    public function load(ObjectManager $manager)
    {
        foreach ($this->certification as $p) {
            $product = new Certification($p[0], $p[1], $p[2]);
            $manager->persist($product);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}