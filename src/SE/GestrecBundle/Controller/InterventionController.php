<?php

namespace SE\GestrecBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SE\GestrecBundle\Entity\Intervention;
use SE\GestrecBundle\Form\InterventionType;

/**
 * Intervention controller.
 *
 */
class InterventionController extends Controller
{
    /**
     * Lists all Intervention entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $interventions = $em->getRepository('SEGestrecBundle:Intervention')->findAll();

        return $this->render('intervention/index.html.twig', array(
            'interventions' => $interventions,
        ));
    }

    /**
     * Creates a new Intervention entity.
     *
     */
    public function newAction(Request $request)
    {if (!($this->get('security.context')->isGranted('ROLE_SUPER_ADMIN'))) {
        return $this->render('SEGestrecBundle:Default:accessDenied.html.twig');
    }
        $intervention = new Intervention();
        $form = $this->createForm('SE\GestrecBundle\Form\InterventionType', $intervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($intervention);
            $em->flush();

            return $this->redirectToRoute('intervention_show', array('id' => $intervention->getId()));
        }

        return $this->render('intervention/new.html.twig', array(
            'intervention' => $intervention,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Intervention entity.
     *
     */
    public function showAction(Intervention $intervention)
    {
        $deleteForm = $this->createDeleteForm($intervention);

        return $this->render('intervention/show.html.twig', array(
            'intervention' => $intervention,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Intervention entity.
     *
     */
    public function editAction(Request $request, Intervention $intervention)
    {
        $deleteForm = $this->createDeleteForm($intervention);
        $editForm = $this->createForm('SE\GestrecBundle\Form\InterventionType', $intervention);
        $editForm->handleRequest($request);

     /*   $super_admin=true;
        if (!($this->get('security.context')->isGranted('ROLE_SUPER_ADMIN'))) {
           $super_admin=false;
        }*/



        if ($editForm->isSubmitted() && $editForm->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($intervention);
            $em->flush();

            return $this->redirectToRoute('intervention_edit', array('id' => $intervention->getId()));
        }

        return $this->render('intervention/edit.html.twig', array(
            'intervention' => $intervention,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
           // 'super_admin'=>$super_admin
        ));
    }

    /**
     * Deletes a Intervention entity.
     *
     */
    public function deleteAction(Request $request, Intervention $intervention)
    {if (!($this->get('security.context')->isGranted('ROLE_SUPER_ADMIN'))) {
        return $this->render('SEGestrecBundle:Default:accessDenied.html.twig');
    }
        $form = $this->createDeleteForm($intervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($intervention);
            $em->flush();
        }

        return $this->redirectToRoute('intervention_index');
    }

    /**
     * Creates a form to delete a Intervention entity.
     *
     * @param Intervention $intervention The Intervention entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Intervention $intervention)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('intervention_delete', array('id' => $intervention->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
