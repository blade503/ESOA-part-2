<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Certification;
use AppBundle\Entity\Garage;
use AppBundle\Entity\Part;
use AppBundle\Entity\PartOrder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class OrderController extends Controller
{
    /**
     * @Route("/orders", name="order_by_garage")
     */
    public function partAction(Request $request)
    {

        //Récupération des garages pour le menu
        $garages = $this->getDoctrine()
            ->getRepository(Garage::class)
            ->findAll();

        /*
         $orders = $this->getDoctrine()
            ->getRepository(PartOrder::class)
            ->findBy(array('user' => $this->get('')));
        */
        return $this->render('@App/Parts/index.html.twig',
            array(
                //'orders' => $orders,
                'garagesNav' => $garages,
            )
        );
    }
}
