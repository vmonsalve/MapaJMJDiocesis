<?php

namespace Tiempo\MapasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction(){
    	$em = $this->getDoctrine()->getManager();
    	$coordenadas = $em->getRepository('TiempoAdminBundle:pinesMapa')->findAll();
        return $this->render('TiempoMapasBundle:Default:index.html.twig', array(
        	'coordenadas' => $coordenadas
        ));
    }

    public function pinAction($id){
    	$em = $this->getDoctrine()->getManager();
    	$pin = $em->getRepository('TiempoAdminBundle:pinesMapa')->findOneBy(Array('id' => $id));

    	return $this->render('TiempoMapasBundle:Default:pin.html.twig', array(
    		'pin' => $pin
    	));
    }
}
