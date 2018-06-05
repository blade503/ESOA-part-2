<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Certification;
use AppBundle\Entity\Garage;
use AppBundle\Entity\User;
use Doctrine\Bundle\FixturesBundle\ORMFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures implements ORMFixtureInterface
{
    protected $user;

    protected $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;

        $this->user = array(
            ["Michael","A", "Oh My Garage", "michael@gmail.com", array('ROLE_MECHANIC')],
            ["Anthony", "A", "Oh My Garage", "anthony@gmail.com", array('ROLE_MECHANIC')],
            ["Damien", "C", "Oh My Garage", "damien@gmail.com", array('ROLE_MECHANIC')],
            ["Nicolas", "B", "What's In My Garage", "nicolas@gmail.com", array('ROLE_MECHANIC')],
            ["Simon", "C", "What's In My Garage", "simon@gmail.com", array('ROLE_MECHANIC')],
            ["Eva", "A", "What's In My Garage", "eva@gmail.com", array('ROLE_MECHANIC')],
            ["Isabelle", "B", "THE Local Garage", "isabelle@gmail.com", array('ROLE_MECHANIC')],
            ["Antoine", "C", "THE Local Garage", "antoine@gmail.com", array('ROLE_MECHANIC')],
            ["Etienne", "B", "THE Local Garage", "etienne@gmail.com", array('ROLE_MECHANIC')],
        );
    }

    public function load(ObjectManager $manager)
    {
        foreach ($this->user as $m) {
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

        $manager->flush();
    }

    public function getOrder()
    {
        return 4;
    }
}