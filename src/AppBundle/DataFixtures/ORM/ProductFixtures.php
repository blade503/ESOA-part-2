<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Part;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ProductFixtures implements ORMFixtureInterface
{
    protected $part;

    public function __construct()
    {
        $this->part = array(
            ["P_C20_001","Cylinder", 10, 75, "Cylinder.png"],
            ["P_C20_002", "Main Gear", 10, 25, "MainGear.png"],
            ["P_C20_101", "Lock", 10, 10, "Lock.png"],
            ["P_C21_202", "Propulsion unit", 10, 160, "PropulsionUnit.png"],
            ["P_C21_215", "Shaft", 10, 25, "Shaft.png"],
            ["P_C22_001", "Worm Gear", 10, 50, "WormGear.png"],
            ["P_C22_003", "Gear", 10, 27, "Gear.png"],
            ["P_C22_004", "Main Gear1", 10, 26, "MainGear1.png"],
            ["P_C23_004", "Engine Element", 10, 25, "EngineElement.png"],
            ["P_C24_012", "Engine Element 2", 10, 75, "EngineElement2.png"],
            ["P_C25_101", "Mount 0", 10, 20, "Mount0.png"],
            ["P_C25_102", "Mount 1", 10, 17, "Mount1.png"],
            ["P_C26_001", "Addon 0", 10, 7, "Addon0.png"],
        );
    }

    public function load(ObjectManager $manager)
    {
        foreach ($this->part as $p) {
            $product = new Part($p[0], $p[1], $p[2],$p[3], $p[4]);
            $manager->persist($product);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}