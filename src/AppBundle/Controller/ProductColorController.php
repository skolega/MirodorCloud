<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\ProductColor;
use AppBundle\Form\ProductColorType;

/**
 * ProductColor controller.
 *
 * @Route("/productcolor")
 */
class ProductColorController extends Controller
{
    /**
     * Lists all ProductColor entities.
     *
     * @Route("/", name="productcolor_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $productColors = $em->getRepository('AppBundle:ProductColor')->findAll();

        return $this->render('productcolor/index.html.twig', array(
            'productColors' => $productColors,
        ));
    }

    /**
     * Creates a new ProductColor entity.
     *
     * @Route("/new", name="productcolor_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $productColor = new ProductColor();
        $form = $this->createForm('AppBundle\Form\ProductColorType', $productColor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productColor);
            $em->flush();

            return $this->redirectToRoute('productcolor_show', array('id' => $productColor->getId()));
        }

        return $this->render('productcolor/new.html.twig', array(
            'productColor' => $productColor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProductColor entity.
     *
     * @Route("/{id}", name="productcolor_show")
     * @Method("GET")
     */
    public function showAction(ProductColor $productColor)
    {
        $deleteForm = $this->createDeleteForm($productColor);

        return $this->render('productcolor/show.html.twig', array(
            'productColor' => $productColor,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ProductColor entity.
     *
     * @Route("/{id}/edit", name="productcolor_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ProductColor $productColor)
    {
        $deleteForm = $this->createDeleteForm($productColor);
        $editForm = $this->createForm('AppBundle\Form\ProductColorType', $productColor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($productColor);
            $em->flush();

            return $this->redirectToRoute('productcolor_edit', array('id' => $productColor->getId()));
        }

        return $this->render('productcolor/edit.html.twig', array(
            'productColor' => $productColor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ProductColor entity.
     *
     * @Route("/{id}", name="productcolor_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ProductColor $productColor)
    {
        $form = $this->createDeleteForm($productColor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($productColor);
            $em->flush();
        }

        return $this->redirectToRoute('productcolor_index');
    }

    /**
     * Creates a form to delete a ProductColor entity.
     *
     * @param ProductColor $productColor The ProductColor entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ProductColor $productColor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('productcolor_delete', array('id' => $productColor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
