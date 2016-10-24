<?php

namespace SE\GestrecBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SE\GestrecBundle\Entity\Intervenant;
use SE\GestrecBundle\Form\IntervenantType;

/**
 * Intervenant controller.
 *
 */
class IntervenantController extends Controller
{
    /**
     * Lists all Intervenant entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $intervenants = $em->getRepository('SEGestrecBundle:Intervenant')->findAll();

        return $this->render('intervenant/index.html.twig', array(
            'intervenants' => $intervenants,
        ));
    }

    /**
     * Creates a new Intervenant entity.
     *
     */
    public function newAction(Request $request)
    {
        $intervenant = new Intervenant();
        $form = $this->createForm('SE\GestrecBundle\Form\IntervenantType', $intervenant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($intervenant);
            $em->flush();

            return $this->redirectToRoute('intervenant_show', array('id' => $intervenant->getId()));
        }

        return $this->render('intervenant/new.html.twig', array(
            'intervenant' => $intervenant,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Intervenant entity.
     *
     */
    public function showAction(Intervenant $intervenant)
    {
        $deleteForm = $this->createDeleteForm($intervenant);

        return $this->render('intervenant/show.html.twig', array(
            'intervenant' => $intervenant,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Intervenant entity.
     *
     */
    public function editAction(Request $request, Intervenant $intervenant)
    {
        $deleteForm = $this->createDeleteForm($intervenant);
        $editForm = $this->createForm('SE\GestrecBundle\Form\IntervenantType', $intervenant);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($intervenant);
            $em->flush();

            return $this->redirectToRoute('intervenant_edit', array('id' => $intervenant->getId()));
        }

        return $this->render('intervenant/edit.html.twig', array(
            'intervenant' => $intervenant,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Intervenant entity.
     *
     */
    public function deleteAction(Request $request, Intervenant $intervenant)
    {
        $form = $this->createDeleteForm($intervenant);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($intervenant);
            $em->flush();
        }

        return $this->redirectToRoute('intervenant_index');
    }

    /**
     * Creates a form to delete a Intervenant entity.
     *
     * @param Intervenant $intervenant The Intervenant entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Intervenant $intervenant)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('intervenant_delete', array('id' => $intervenant->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
