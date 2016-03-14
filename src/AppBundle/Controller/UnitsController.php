<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Units;
use AppBundle\Form\UnitsType;

/**
 * Units controller.
 *
 * @Route("/units")
 */
class UnitsController extends Controller
{
    /**
     * Lists all Units entities.
     *
     * @Route("/", name="units_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $units = $em->getRepository('AppBundle:Units')->findAll();

        return $this->render('units/index.html.twig', array(
            'units' => $units,
        ));
    }

    /**
     * Creates a new Units entity.
     *
     * @Route("/new", name="units_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $unit = new Units();
        $form = $this->createForm('AppBundle\Form\UnitsType', $unit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($unit);
            $em->flush();

            return $this->redirectToRoute('units_show', array('id' => $unit->getId()));
        }

        return $this->render('units/new.html.twig', array(
            'unit' => $unit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Units entity.
     *
     * @Route("/{id}", name="units_show")
     * @Method("GET")
     */
    public function showAction(Units $unit)
    {
        $deleteForm = $this->createDeleteForm($unit);

        return $this->render('units/show.html.twig', array(
            'unit' => $unit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Units entity.
     *
     * @Route("/{id}/edit", name="units_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Units $unit)
    {
        $deleteForm = $this->createDeleteForm($unit);
        $editForm = $this->createForm('AppBundle\Form\UnitsType', $unit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($unit);
            $em->flush();

            return $this->redirectToRoute('units_edit', array('id' => $unit->getId()));
        }

        return $this->render('units/edit.html.twig', array(
            'unit' => $unit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Units entity.
     *
     * @Route("/{id}", name="units_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Units $unit)
    {
        $form = $this->createDeleteForm($unit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($unit);
            $em->flush();
        }

        return $this->redirectToRoute('units_index');
    }

    /**
     * Creates a form to delete a Units entity.
     *
     * @param Units $unit The Units entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Units $unit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('units_delete', array('id' => $unit->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
