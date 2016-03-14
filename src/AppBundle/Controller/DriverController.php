<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Driver;
use AppBundle\Form\DriverType;

/**
 * Driver controller.
 *
 * @Route("/driver")
 */
class DriverController extends Controller
{
    /**
     * Lists all Driver entities.
     *
     * @Route("/", name="driver_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $drivers = $em->getRepository('AppBundle:Driver')->findAll();

        return $this->render('driver/index.html.twig', array(
            'drivers' => $drivers,
        ));
    }

    /**
     * Creates a new Driver entity.
     *
     * @Route("/new", name="driver_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $driver = new Driver();
        $form = $this->createForm('AppBundle\Form\DriverType', $driver);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($driver);
            $em->flush();

            return $this->redirectToRoute('driver_show', array('id' => $driver->getId()));
        }

        return $this->render('driver/new.html.twig', array(
            'driver' => $driver,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Driver entity.
     *
     * @Route("/{id}", name="driver_show")
     * @Method("GET")
     */
    public function showAction(Driver $driver)
    {
        $deleteForm = $this->createDeleteForm($driver);

        return $this->render('driver/show.html.twig', array(
            'driver' => $driver,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Driver entity.
     *
     * @Route("/{id}/edit", name="driver_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Driver $driver)
    {
        $deleteForm = $this->createDeleteForm($driver);
        $editForm = $this->createForm('AppBundle\Form\DriverType', $driver);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($driver);
            $em->flush();

            return $this->redirectToRoute('driver_edit', array('id' => $driver->getId()));
        }

        return $this->render('driver/edit.html.twig', array(
            'driver' => $driver,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Driver entity.
     *
     * @Route("/{id}", name="driver_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Driver $driver)
    {
        $form = $this->createDeleteForm($driver);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($driver);
            $em->flush();
        }

        return $this->redirectToRoute('driver_index');
    }

    /**
     * Creates a form to delete a Driver entity.
     *
     * @param Driver $driver The Driver entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Driver $driver)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('driver_delete', array('id' => $driver->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
