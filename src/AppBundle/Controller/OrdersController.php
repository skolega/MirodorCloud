<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Orders;
use AppBundle\Form\OrdersType;
use AppBundle\Entity\OrderItem;

/**
 * Orders controller.
 *
 * @Route("/orders")
 */
class OrdersController extends Controller
{

    /**
     * Lists all Orders entities.
     *
     * @Route("/list/{dat}", name="orders_index", defaults={"dat" = null})
     * @Method("GET")
     */
    public function indexAction($dat)
    {
        if (!$dat) {
            $startDate = date('Y-m-d 00:00:00');
            $endDate = date('Y-m-d 23:59:59');
        } elseif($dat == "all") {
            $startDate = date("1900-01-01 00:00:00");
            $endDate = date("9999-01-01 23:59:59");
        }else{
            $startDate = date($dat . ' 00:00:00');
            $endDate = date($dat . ' 23:59:59');
        } 
        
        $em = $this->getDoctrine()->getManager();
        $orders = $em->getRepository('AppBundle:Orders')->findTodayOrders($startDate, $endDate);
        
        return $this->render('orders/index.html.twig', array(
                    'orders' => $orders,
        ));
    }

    /**
     * Creates a new Orders entity.
     *
     * @Route("/new", name="orders_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $order = new Orders();
        $form = $this->createForm('AppBundle\Form\OrdersType', $order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();

            return $this->redirectToRoute('orders_show', array('id' => $order->getId()));
        }

        return $this->render('orders/new.html.twig', array(
                    'order' => $order,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Orders entity.
     *
     * @Route("/{id}", name="orders_show")
     * @Method({"GET","POST"})
     */
    public function showAction(Request $request, Orders $order)
    {
        $deleteForm = $this->createDeleteForm($order);
        $em = $this->getDoctrine()->getManager();

        $orderItem = new OrderItem();
        $orderItem->setOrder($order);
        $form = $this->createForm('AppBundle\Form\OrderItemType', $orderItem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($orderItem);
            $em->flush();

            return $this->redirectToRoute('orders_show', array('id' => $order->getId()));
        }

        $products = $em->getRepository('AppBundle:Product')->findAll();

        return $this->render('orders/show.html.twig', array(
                    'order' => $order,
                    'products' => $products,
                    'orderItem' => $orderItem,
                    'form' => $form->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Orders entity.
     *
     * @Route("/{id}/edit", name="orders_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Orders $order)
    {
        $deleteForm = $this->createDeleteForm($order);
        $editForm = $this->createForm('AppBundle\Form\OrdersType', $order);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($order);
            $em->flush();

            return $this->redirectToRoute('orders_edit', array('id' => $order->getId()));
        }

        return $this->render('orders/edit.html.twig', array(
                    'order' => $order,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Orders entity.
     *
     * @Route("/{id}", name="orders_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Orders $order)
    {
        $form = $this->createDeleteForm($order);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($order);
            $em->flush();
        }

        return $this->redirectToRoute('orders_index');
    }

    /**
     * Creates a form to delete a Orders entity.
     *
     * @param Orders $order The Orders entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Orders $order)
    {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('orders_delete', array('id' => $order->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

    /**
     * Send a Orders entity.
     *
     * @Route("/{id}/{to}", name="send_order")
     */
    public function sendAction(Orders $order, $to)
    {
        $message = \Swift_Message::newInstance()
                ->setSubject('Zamowienie nr' . $order->getId())
                ->setFrom('send@example.com')
                ->setTo($to)
                ->setBody(
                $this->renderView(
                        // app/Resources/views/Emails/registration.html.twig
                        'Emails/order.html.twig', array(
                    'name' => $order->getClient()->getName(),
                    'driver' => $order->getDriver()->getName(),
                    'carNb' => $order->getDriver()->getCarNumber(),
                    'orderId' => $order->getId(),
                        )
                ), 'text/html'
        );

        $this->get('mailer')->send($message);

        return $this->redirectToRoute('orders_show', array('id' => $order->getId()));
    }

}
