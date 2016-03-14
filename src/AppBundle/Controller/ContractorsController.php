<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Contractors;
use AppBundle\Form\ContractorsType;

/**
 * Contractors controller.
 *
 * @Route("/contractors")
 */
class ContractorsController extends Controller
{
    /**
     * Lists all Contractors entities.
     *
     * @Route("/", name="contractors_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $contractors = $em->getRepository('AppBundle:Contractors')->findAll();

        return $this->render('contractors/index.html.twig', array(
            'contractors' => $contractors,
        ));
    }

    /**
     * Creates a new Contractors entity.
     *
     * @Route("/new", name="contractors_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $contractor = new Contractors();
        $form = $this->createForm('AppBundle\Form\ContractorsType', $contractor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contractor);
            $em->flush();

            return $this->redirectToRoute('contractors_show', array('id' => $contractor->getId()));
        }

        return $this->render('contractors/new.html.twig', array(
            'contractor' => $contractor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Contractors entity.
     *
     * @Route("/{id}", name="contractors_show")
     * @Method("GET")
     */
    public function showAction(Contractors $contractor)
    {
        $deleteForm = $this->createDeleteForm($contractor);

        return $this->render('contractors/show.html.twig', array(
            'contractor' => $contractor,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Contractors entity.
     *
     * @Route("/{id}/edit", name="contractors_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Contractors $contractor)
    {
        $deleteForm = $this->createDeleteForm($contractor);
        $editForm = $this->createForm('AppBundle\Form\ContractorsType', $contractor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contractor);
            $em->flush();

            return $this->redirectToRoute('contractors_edit', array('id' => $contractor->getId()));
        }

        return $this->render('contractors/edit.html.twig', array(
            'contractor' => $contractor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Contractors entity.
     *
     * @Route("/{id}", name="contractors_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Contractors $contractor)
    {
        $form = $this->createDeleteForm($contractor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($contractor);
            $em->flush();
        }

        return $this->redirectToRoute('contractors_index');
    }

    /**
     * Creates a form to delete a Contractors entity.
     *
     * @param Contractors $contractor The Contractors entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Contractors $contractor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contractors_delete', array('id' => $contractor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
