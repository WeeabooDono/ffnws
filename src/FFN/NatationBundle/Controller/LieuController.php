<?php

namespace FFN\NatationBundle\Controller;

use FFN\NatationBundle\Entity\Lieu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Lieu controller.
 *
 * @Route("lieu")
 */
class LieuController extends Controller
{
    /**
     * Lists all lieu entities.
     *
     * @Route("/", name="lieu_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $lieus = $em->getRepository('FFNNatationBundle:Lieu')->findAll();

        return $this->render('lieu/index.html.twig', array(
            'lieus' => $lieus,
        ));
    }

    /**
     * Creates a new lieu entity.
     *
     * @Route("/new", name="lieu_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $lieu = new Lieu();
        $form = $this->createForm('FFN\NatationBundle\Form\LieuType', $lieu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($lieu);
            $em->flush();

            return $this->redirectToRoute('lieu_show', array('idLieu' => $lieu->getIdlieu()));
        }

        return $this->render('lieu/new.html.twig', array(
            'lieu' => $lieu,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a lieu entity.
     *
     * @Route("/{idLieu}", name="lieu_show")
     * @Method("GET")
     */
    public function showAction(Lieu $lieu)
    {
        $deleteForm = $this->createDeleteForm($lieu);

        return $this->render('lieu/show.html.twig', array(
            'lieu' => $lieu,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing lieu entity.
     *
     * @Route("/{idLieu}/edit", name="lieu_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Lieu $lieu)
    {
        $deleteForm = $this->createDeleteForm($lieu);
        $editForm = $this->createForm('FFN\NatationBundle\Form\LieuType', $lieu);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lieu_edit', array('idLieu' => $lieu->getIdlieu()));
        }

        return $this->render('lieu/edit.html.twig', array(
            'lieu' => $lieu,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a lieu entity.
     *
     * @Route("/{idLieu}", name="lieu_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Lieu $lieu)
    {
        $form = $this->createDeleteForm($lieu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lieu);
            $em->flush();
        }

        return $this->redirectToRoute('lieu_index');
    }

    /**
     * Creates a form to delete a lieu entity.
     *
     * @param Lieu $lieu The lieu entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Lieu $lieu)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lieu_delete', array('idLieu' => $lieu->getIdlieu())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
