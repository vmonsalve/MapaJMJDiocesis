<?php

namespace Tiempo\AdminBundle\Controller;

use Tiempo\AdminBundle\Entity\Usuarios;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Usuario controller.
 *
 */
class UsuariosController extends Controller
{
    public function datosUsuario(Request $request){
        $session = $request->getSession();
        $usuario = $session->get('administrador');
        return $usuario;
    }


    /**
     * Displays a form to edit an existing usuario entity.
     *
     */
    public function editAction(Request $request, Usuarios $usuario)
    {
        $editForm = $this->createForm('Tiempo\AdminBundle\Form\UsuariosType', $usuario);
        $editForm->handleRequest($request);

        $passwords =  $datosForm = $request->request->get('tiempo_adminbundle_usuarios');

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $encoder = $this->container->get('security.encoder_factory')->getEncoder($usuario);
            $usuario->setPassword($encoder->encodePassword($passwords['password']['first'], $usuario->getSalt()));

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('administrator_usuarios_edit', array('id' => $usuario->getId()));
        }

        $datosUsuario  = $this->datosUsuario($request);
        $ruta = $this->generateUrl('administrator_usuarios_edit', array('id' => $usuario->getId()));

        return $this->render('TiempoAdminBundle:usuarios:edit.html.twig', array(
            'usuario' => $usuario,
            'edit_form' => $editForm->createView(),
            'username' => $datosUsuario["nombre"],
            'titulo'   => 'Usuario',
            'small'    => 'Editar',
            'ruta'     => $ruta,
        ));
    }


}
