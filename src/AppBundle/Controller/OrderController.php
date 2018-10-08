<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Garage;
use AppBundle\Entity\Part;
use AppBundle\Entity\PartOrder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class OrderController extends Controller
{
    /**
     * @Route("/orders", name="order_by_garage")
     */
    public function partAction(Request $request)
    {
        if (false == $this->container->get('security.authorization_checker')->isGranted('ROLE_USER')){
            throw New AccessDeniedException();
        }

        //Récupération des garages pour le menu
        $garages = $this->getDoctrine()
            ->getRepository(Garage::class)
            ->findAll();

        $orders = $this->getDoctrine()
           ->getRepository(PartOrder::class)
           ->findBy(array('user' => $this->get('security.token_storage')->getToken()->getUser()));

        return $this->render('@App/Orders/index.html.twig',
            array(
                'orders' => $orders,
                'garagesNav' => $garages,
            )
        );
    }

    /**
     * @Route("/orders_admin", name="order_for_admin")
     */
    public function partAdminAction(Request $request)
    {
        if (false == $this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN')){
            throw New AccessDeniedException();
        }

        //Récupération des garages pour le menu
        $garages = $this->getDoctrine()
            ->getRepository(Garage::class)
            ->findAll();

        $orders = $this->getDoctrine()
            ->getRepository(PartOrder::class)
            ->findAll();

        return $this->render('@App/Orders/index.html.twig',
            array(
                'orders' => $orders,
                'garagesNav' => $garages,
            )
        );
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @Route("/orders/updateStatus", name="order_update_status")
     */
    public function updateStatusAction(Request $request)
    {
        if (false == $this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN')){
            throw New AccessDeniedException();
        }

        $manager = $this->container->get('doctrine')->getManager();

        $order = $this->getDoctrine()
            ->getRepository(PartOrder::class)
            ->findOneBy(array('id' => $request->get('orderId')));

        if ($order->getStatus() < PartOrder::DELETED_ORDER) {
            $order->setStatus($request->get('status'));
        }

        $manager->persist($order);
        $manager->flush();

        $this->addFlash("success", "The order status has been updated");

        return $this->redirectToRoute('order_for_admin');
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @Route("/orders/orderCancel", name="order_cancel")
     */
    public function cancelAction(Request $request)
    {
        if (false == $this->container->get('security.authorization_checker')->isGranted('ROLE_USER')){
            throw New AccessDeniedException();
        }

        $manager = $this->container->get('doctrine')->getManager();

        $order = $this->getDoctrine()
            ->getRepository(PartOrder::class)
            ->findOneBy(array('id' => $request->get('orderId')));

        if ($order->getStatus() < PartOrder::DELETED_ORDER) {
            $order->setStatus($request->get('status'));
        }

        $manager->persist($order);
        $manager->flush();

        $this->addFlash("success", "The order has been cancelled");

        if ($this->container->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('order_for_admin');
        } else {
            return $this->redirectToRoute('order_by_garage');
        }


    }

    /**
     * @Route("/orders/{partId}", name="new_order")
     */
    public function newAction(Request $request, $partId)
    {
        //Récupération des garages pour le menu
        $garages = $this->getDoctrine()
            ->getRepository(Garage::class)
            ->findAll();

        $manager = $this->container->get('doctrine')->getManager();

        $part = $this->getDoctrine()
            ->getRepository(Part::class)
            ->findOneBy(array('id' => $partId));

        $newOrder = new PartOrder($this->get('security.token_storage')->getToken()->getUser(), $part, 1);
        $manager->persist($newOrder);

        $part->setQuantityInStock($part->getQuantityInStock() - 1);
        $manager->persist($part);

        $manager->flush();

        $this->addFlash("success", "Your order has been created ! Congrats");

        return $this->redirectToRoute('order_by_garage');
    }
}
