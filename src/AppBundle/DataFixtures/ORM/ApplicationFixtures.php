<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Certification;
use AppBundle\Entity\Garage;
use AppBundle\Entity\Part;
use AppBundle\Entity\PartOrder;
use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ApplicationFixtures implements ORMFixtureInterface
{
    protected $part;

    protected $certification;

    protected $garage;

    protected $user;

    protected $encoder;

    protected $order;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;

        $this->part = array(
            ["P_C20_001","Cylinder", 10, 75, "Cylinder.png","A"],
            ["P_C20_002", "Main Gear", 10, 25, "MainGear.png","B"],
            ["P_C20_101", "Lock", 10, 10, "Lock.png","C"],
            ["P_C21_202", "Propulsion unit", 10, 160, "PropulsionUnit.png","A"],
            ["P_C21_215", "Shaft", 10, 25, "Shaft.png","D"],
            ["P_C22_001", "Worm Gear", 10, 50, "WormGear.png","B"],
            ["P_C22_003", "Gear", 10, 27, "Gear.png","A"],
            ["P_C22_004", "Main Gear1", 10, 26, "MainGear1.png","A"],
            ["P_C23_004", "Engine Element", 10, 25, "EngineElement.png","B"],
            ["P_C24_012", "Engine Element 2", 10, 75, "EngineElement2.png","D"],
            ["P_C25_101", "Mount 0", 10, 20, "Mount0.png","C"],
            ["P_C25_102", "Mount 1", 10, 17, "Mount1.png","B"],
            ["P_C26_001", "Addon 0", 10, 7, "Addon0.png","A"],
        );

        $this->certification = array(
            ["Alpha Certification", "A", "That's certification A"],
            ["Bravo Certification", "B", "That's certification B"],
            ["Charlie Certification", "C", "That's certification C"],
            ["Delta Certification", "D", "That's certification D"],
        );

        $this->garage = array(
            ["Oh My Garage","13, Rue Monte Cristo"],
            ["What's In My Garage", "34, Rue de Penthièvre"],
            ["THE Local Garage", "12, Rue de l'égalité"],
        );

        $this->user = array(
            ["Michael","A", "Oh My Garage", "michael@gmail.com", array('ROLE_MECHANIC'), 'mecha'],
            ["Anthony", "A", "Oh My Garage", "anthony@gmail.com", array('ROLE_MECHANIC'), 'mecha'],
            ["Damien", "C", "Oh My Garage", "damien@gmail.com", array('ROLE_MECHANIC'), 'mecha'],
            ["Nicolas", "B", "What's In My Garage", "nicolas@gmail.com", array('ROLE_MECHANIC'), 'mecha'],
            ["Simon", "C", "What's In My Garage", "simon@gmail.com", array('ROLE_MECHANIC'), 'mecha'],
            ["Eva", "A", "What's In My Garage", "eva@gmail.com", array('ROLE_MECHANIC'), 'mecha'],
            ["Isabelle", "B", "THE Local Garage", "isabelle@gmail.com", array('ROLE_MECHANIC'), 'mecha'],
            ["Antoine", "C", "THE Local Garage", "antoine@gmail.com", array('ROLE_MECHANIC'), 'mecha'],
            ["Etienne", "B", "THE Local Garage", "etienne@gmail.com", array('ROLE_MECHANIC'), 'mecha'],
            ["Alexandre", "", "", "admin@gmail.com", array('ROLE_ADMIN'), 'admin'],
        );

        $this->order = array(
            ["P_C20_001","Michael", 2],
            ["P_C20_002","Anthony", 1],
            ["P_C20_101","Damien", 7],
            ["P_C21_202","Nicolas", 4],
            ["P_C21_215","Simon", 9],
            ["P_C22_001","Eva", 1],
            ["P_C22_003","Isabelle", 2],
            ["P_C22_004","Antoine", 4],
            ["P_C23_004","Etienne", 2],
        );
    }

    public function load(ObjectManager $manager)
    {
        foreach ($this->part as $p) {
            $product = new Part($p[0], $p[1], $p[2],$p[3], $p[4]);
            $product->setCertification($p[5]);
            $manager->persist($product);
        }

        $manager->flush();

        foreach ($this->certification as $p) {
            $product = new Certification($p[0], $p[1], $p[2]);
            $manager->persist($product);
        }

        $manager->flush();

        foreach ($this->garage as $p) {
            $garage = new Garage($p[0], $p[1]);
            $manager->persist($garage);
        }

        $manager->flush();

        foreach ($this->user as $m) {
            if ($m[5] == 'admin'){
                $admin = new User($m[0], $m[3], $m[4]);
                $admin->setPassword($this->encoder->encodePassword($admin, 'goodpassword'));
                $admin->setGarage(null);
                $manager->persist($admin);
            } else {
                $mechanic = new User($m[0], $m[3], $m[4]);

                $mechanic->setPassword($this->encoder->encodePassword($mechanic, 'goodpassword'));

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
        }

        $manager->flush();

        foreach ($this->order as $p) {
            $part = $manager
                ->getRepository(Part::class)
                ->findOneBySerialNumber($p[0]);

            $user = $manager
                ->getRepository(User::class)
                ->findOneByName($p[1]);

            $order = new PartOrder($user, $part, $p[2]);
            $manager->persist($order);
        }

        $manager->flush();
    }

}