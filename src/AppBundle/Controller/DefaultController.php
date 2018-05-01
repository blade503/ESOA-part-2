<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Certification;
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

        return $this->render('@App/Home/index.html.twig');
        /*
                $products = $this->getDoctrine()
                    ->getRepository(Product::class)
                    ->findAll();
        */


    }

    /**
     * @Route("/certification", name="certification")
     */
    public function certificationAction(Request $request)
    {

        /*$certifications = $this->getDoctrine()
            ->getRepository(Certification::class)
            ->findAll();
*/
        return $this->render('@App/Certifiation/index.html.twig'/*,
            array(
                'certifications' => $certifications,
            )*/
        );
    }

    /**
     * @Route("/parts", name="parts_index")
     */
    public function partAction(Request $request)
    {

        $parts = $this->getDoctrine()
            ->getRepository(Part::class)
            ->findAll();

        return $this->render('@App/Parts/index.html.twig',
            array(
                'parts' => $parts,
            )
        );




    }
}
