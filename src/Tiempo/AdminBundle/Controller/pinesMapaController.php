<?php

namespace Tiempo\AdminBundle\Controller;

use Tiempo\AdminBundle\Entity\pinesMapa;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Pinesmapa controller.
 *
 */
class pinesMapaController extends Controller
{

    public function datosUsuario(Request $request){
        $session = $request->getSession();
        $usuario = $session->get('administrador');
        return $usuario;
    }

    /**
    * set datatable configs
    * @return \Waldo\DatatableBundle\Util\Datatable
    */
    private function _datatable() {
        $controller_instance = $this;
        $em = $this->getDoctrine()->getManager();
        return $this->get('datatable')
                ->setEntity("TiempoAdminBundle:pinesMapa", "p")
                ->setFields(
                        array(
                            "Id"           => 'p.id',
                            "Título"       => 'p.titulo',
                            "Descripción"  => 'p.descripcion',
                            "Latitud"      => 'p.latitud',
                            "Longitud"     => 'p.latitud',
                            'ver'          => 'p.id',
                            "Editar"       => 'p.id',
                            "Eliminar"     => 'p.id',
                            "_identifier_" => 'p.id'
                        )
                )
                ->setRenderer(
                    function(&$data) use ($controller_instance){
                      foreach ($data as $key => $value){
                        if ($key == 5) {
                          $data[$key] = $controller_instance
                                      ->get('templating')
                                      ->render(
                                          'TiempoAdminBundle:pinesmapa:btnver.html.twig',
                                          array('value' => $value)
                                      );
                        }
                        if ($key == 6) {
                          $data[$key] = $controller_instance
                                      ->get('templating')
                                      ->render(
                                          'TiempoAdminBundle:pinesmapa:btneditar.html.twig',
                                          array('value' => $value)
                                      );
                        }
                        if ($key == 7) {
                          $data[$key] = $controller_instance
                                      ->get('templating')
                                      ->render(
                                          'TiempoAdminBundle:pinesmapa:btneliminar.html.twig',
                                          array('value' => $value)
                                      );
                        }
                      }
                    }
                )
                ->setSearch(true)
                ->setOrder("p.id", "desc");
    }

    public function pinesGridAction(){
        return $this->_datatable()->execute();
    }


    /**
     * Lists all pinesMapa entities.
     *
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $datosUsuario  = $this->datosUsuario($request);
        $ruta = $this->generateUrl('administrator_pinesmapa_index');

        $this->_datatable();

        return $this->render('TiempoAdminBundle:pinesmapa:index.html.twig', array(
            'username' => $datosUsuario["nombre"],
            'titulo'   => 'Geolocalización',
            'small'    => 'Principal',
            'ruta'     => $ruta,
        ));
    }

    /**
     * Creates a new pinesMapa entity.
     *
     */
    public function newAction(Request $request)
    {
        $pinesMapa = new Pinesmapa();
        $form = $this->createForm('Tiempo\AdminBundle\Form\pinesMapaType', $pinesMapa);
        $form->handleRequest($request);

        $datosUsuario  = $this->datosUsuario($request);
        $ruta = $this->generateUrl('administrator_pinesmapa_index');


        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($pinesMapa);
            $em->flush();

            $this->get('session')->getFlashBag()->add(
                'mensajeExito',
                'Tu pin se ah creado con éxito'
            );

            return $this->redirectToRoute('administrator_pinesmapa_index');
        }

        return $this->render('TiempoAdminBundle:pinesmapa:new.html.twig', array(
            'pinesMapa' => $pinesMapa,
            'form' => $form->createView(),
            'username' => $datosUsuario["nombre"],
            'titulo'   => 'Geolocalización',
            'small'    => 'Crear',
            'ruta'     => $ruta,
        ));
    }


    /**
     * Displays a form to edit an existing pinesMapa entity.
     *
     */
    public function editAction(Request $request, pinesMapa $pinesMapa)
    {
        $editForm = $this->createForm('Tiempo\AdminBundle\Form\pinesMapaType', $pinesMapa);
        $editForm->handleRequest($request);
        $datosUsuario  = $this->datosUsuario($request);
        $ruta = $this->generateUrl('administrator_pinesmapa_index');


        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->get('session')->getFlashBag()->add(
                'mensajeExito',
                'Tu pin se ah editado con éxito'
            );

            return $this->redirectToRoute('administrator_pinesmapa_edit', array('id' => $pinesMapa->getId()));
        }

        return $this->render('TiempoAdminBundle:pinesmapa:edit.html.twig', array(
            'pinesMapa' => $pinesMapa,
            'edit_form' => $editForm->createView(),
            'username' => $datosUsuario["nombre"],
            'titulo'   => 'Geolocalización',
            'small'    => 'Editar',
            'ruta'     => $ruta,
        ));
    }

    /**
     * Deletes a pinesMapa entity.
     *
     */
    public function deleteAction($id)
    {
 
        $em = $this->getDoctrine()->getManager();

        $pinesMapa = $em->getRepository('TiempoAdminBundle:pinesMapa')->findOneBy(array('id' => $id));

        $em->remove($pinesMapa);
        $em->flush();

         $this->get('session')->getFlashBag()->add(
            'mensajeError',
            'Tu Pin se ah eliminado con éxito'
        );

        return $this->redirectToRoute('administrator_pinesmapa_index');
    }
}
