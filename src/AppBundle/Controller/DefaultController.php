<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Certification;
use AppBundle\Entity\Garage;
use AppBundle\Entity\Part;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        //Récupération des garages pour le menu
        $garages = $this->getDoctrine()
            ->getRepository(Garage::class)
            ->findAll();

        return $this->render('@App/Home/index.html.twig', array(
            'garagesNav' => $garages,
        ));
    }

    /**
     * @Route("/certifications", name="certifications_index")
     */
    public function certificationAction(Request $request)
    {

        //Récupération des garages pour le menu
        $garages = $this->getDoctrine()
            ->getRepository(Garage::class)
            ->findAll();

        $certifications = $this->getDoctrine()
            ->getRepository(Certification::class)
            ->findAll();

        return $this->render('@App/Certifiation/index.html.twig',
            array(
                'certifications' => $certifications,
                'garagesNav' => $garages,
            )
        );
    }

    /**
     * @Route("/parts", name="parts_index")
     */
    public function partAction(Request $request)
    {

        //Récupération des garages pour le menu
        $garages = $this->getDoctrine()
            ->getRepository(Garage::class)
            ->findAll();

        $parts = $this->getDoctrine()
            ->getRepository(Part::class)
            ->findAll();

        return $this->render('@App/Parts/index.html.twig',
            array(
                'parts' => $parts,
                'garagesNav' => $garages,
            )
        );
    }

    /**
     * @Route("/garage/{id}", name="garage_index")
     */
    public function garageAction(Request $request, $id)
    {
        //Récupération des garages pour le menu
        $garages = $this->getDoctrine()
            ->getRepository(Garage::class)
            ->findAll();

        $garage = $this->getDoctrine()
            ->getRepository(Garage::class)
            ->findOneBy(array('id' => $id));

        return $this->render('@App/Garage/index.html.twig',
            array(
                'garage' => $garage,
                'garagesNav' => $garages,
            )
        );
    }
}
