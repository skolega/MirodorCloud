<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\ProductManufacture;
use AppBundle\Form\ProductManufactureType;

/**
 * ProductManufacture controller.
 *
 * @Route("/productmanufacture")
 */
class ProductManufactureController extends Controller
{
    /**
     * Lists all ProductManufacture entities.
     *
     * @Route("/", name="productmanufacture_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $productManufactures = $em->getRepository('AppBundle:ProductManufacture')->findAll();

        return $this->render('productmanufacture/index.html.twig', array(
            'productManufactures' => $productManufactures,
        ));
    }

    /**
     * Creates a new ProductManufacture entity.
     *
     * @Route("/new", name="productmanufacture_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $productManufacture = new ProductManufacture();
        $form = $this->createForm('AppBundle\Form\ProductManufactureType', $productManufacture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productManufacture);
            $em->flush();

            return $this->redirectToRoute('productmanufacture_show', array('id' => $productManufacture->getId()));
        }

        return $this->render('productmanufacture/new.html.twig', array(
            'productManufacture' => $productManufacture,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProductManufacture entity.
     *
     * @Route("/{id}", name="productmanufacture_show")
     * @Method("GET")
     */
    public function showAction(ProductManufacture $productManufacture)
    {
        $deleteForm = $this->createDeleteForm($productManufacture);

        return $this->render('productmanufacture/show.html.twig', array(
            'productManufacture' => $productManufacture,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ProductManufacture entity.
     *
     * @Route("/{id}/edit", name="productmanufacture_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProductManufacture $productManufacture)
    {
        $deleteForm = $this->createDeleteForm($productManufacture);
        $editForm = $this->createForm('AppBundle\Form\ProductManufactureType', $productManufacture);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productManufacture);
            $em->flush();

            return $this->redirectToRoute('productmanufacture_edit', array('id' => $productManufacture->getId()));
        }

        return $this->render('productmanufacture/edit.html.twig', array(
            'productManufacture' => $productManufacture,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProductManufacture entity.
     *
     * @Route("/{id}", name="productmanufacture_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ProductManufacture $productManufacture)
    {
        $form = $this->createDeleteForm($productManufacture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($productManufacture);
            $em->flush();
        }

        return $this->redirectToRoute('productmanufacture_index');
    }

    /**
     * Creates a form to delete a ProductManufacture entity.
     *
     * @param ProductManufacture $productManufacture The ProductManufacture entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProductManufacture $productManufacture)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('productmanufacture_delete', array('id' => $productManufacture->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
