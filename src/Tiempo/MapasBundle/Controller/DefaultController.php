<?php

namespace Tiempo\MapasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$coordenadas = $em->getRepository('TiempoAdminBundle:pinesMapa')->findAll();
        return $this->render('TiempoMapasBundle:Default:index.html.twig', array(
        	'coordenadas' => $coordenadas
        ));
    }
}
