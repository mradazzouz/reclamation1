<?php

namespace SE\GestrecBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SE\GestrecBundle\Entity\Client;
use SE\GestrecBundle\Form\ClientType;

/**
 * Client controller.
 *
 */
class ClientController extends Controller
{
    /**
     * Lists all Client entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $clients = $em->getRepository('SEGestrecBundle:Client')->findAll();
        if (!($this->get('security.context')->isGranted('ROLE_SUPER_ADMIN'))) {
            return $this->render('SEGestrecBundle:Default:accessDenied.html.twig');
        }

        return $this->render('client/index.html.twig', array(
            'clients' => $clients,
        ));
    }

    /**
     * Creates a new Client entity.
     *
     */
    public function newAction(Request $request)
    {if (!($this->get('security.context')->isGranted('ROLE_SUPER_ADMIN'))) {
        return $this->render('SEGestrecBundle:Default:accessDenied.html.twig');
    }
        $client = new Client();
        $form = $this->createForm('SE\GestrecBundle\Form\ClientType', $client);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
           // dump('a');exit;
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();

            return $this->redirectToRoute('client_show', array('id' => $client->getId()));
        }

/*        return $this->render('SEGestrecBundle:Client:new.html.twig', array(
            'client' => $client,
            'form' => $form->createView(),
        ));*/
   return $this->render('client/new.html.twig', array(
            'client' => $client,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Client entity.
     *
     */
    public function showAction(Client $client)
    {if (!($this->get('security.context')->isGranted('ROLE_SUPER_ADMIN'))) {
        return $this->render('SEGestrecBundle:Default:accessDenied.html.twig');
    }
        $deleteForm = $this->createDeleteForm($client);

        return $this->render('client/show.html.twig', array(
            'client' => $client,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Client entity.
     *
     */
    public function editAction(Request $request, Client $client)
    {if (!($this->get('security.context')->isGranted('ROLE_SUPER_ADMIN'))) {
        return $this->render('SEGestrecBundle:Default:accessDenied.html.twig');
    }
        $deleteForm = $this->createDeleteForm($client);
        $editForm = $this->createForm('SE\GestrecBundle\Form\ClientType', $client);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();

            return $this->redirectToRoute('client_edit', array('id' => $client->getId()));
        }



        return $this->render('client/edit.html.twig', array(
            'client' => $client,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Client entity.
     *
     */
    public function deleteAction(Request $request, Client $client)
    {
        $form = $this->createDeleteForm('SE\GestrecBundle\Form\ClientType',$client);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($client);
            $em->flush();
        }

        return $this->redirectToRoute('SEGestrecBundle:Client:delet.html.twig','client_index');
    }

    /**
     * Creates a form to delete a Client entity.
     *
     * @param Client $client The Client entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Client $client)
    {if (!($this->get('security.context')->isGranted('ROLE_SUPER_ADMIN'))) {
        return $this->render('SEGestrecBundle:Default:accessDenied.html.twig');
    }
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('client_delete', array('id' => $client->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
