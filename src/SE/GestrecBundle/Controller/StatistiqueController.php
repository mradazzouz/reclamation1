<?php
/**
 * Created by PhpStorm.
 * User: Ellouze Skander
 * Date: 20/11/2016
 * Time: 23:15
 */

namespace SE\GestrecBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SE\GestrecBundle\Entity\Client;
use SE\GestrecBundle\Form\ClientType;

class StatistiqueController extends  controller
{

    public function  ClientReclamationAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clients = $em->getRepository('SEGestrecBundle:Client')->findAll();
        if (!($this->get('security.context')->isGranted('ROLE_SUPER_ADMIN'))) {
            return $this->render('SEGestrecBundle:Default:accessDenied.html.twig');
        }

        return $this->render('statistique.html.twig', array(
            'clients' => $clients,
        ));

    }

}