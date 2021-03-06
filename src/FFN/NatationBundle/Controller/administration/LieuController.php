<?php

namespace FFN\NatationBundle\Controller\administration;

use FFN\NatationBundle\Entity\Lieu;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Lieu controller.
 *
 * @Route("admin/lieu")
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

            return $this->redirectToRoute('lieu_show', array('lieu_id' => $lieu->getId()));
        }

        return $this->render('lieu/new.html.twig', array(
            'lieu' => $lieu,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a lieu entity.
     *
     * @Route("/{lieu_id}", name="lieu_show")
     * @Method("GET")
     */
    public function showAction(Lieu $lieu_id)
    {
        $deleteForm = $this->createDeleteForm($lieu_id);

        return $this->render('lieu/show.html.twig', array(
            'lieu' => $lieu_id,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing lieu entity.
     *
     * @Route("/{lieu_id}/edit", name="lieu_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Lieu $lieu_id)
    {
        $deleteForm = $this->createDeleteForm($lieu_id);
        $editForm = $this->createForm('FFN\NatationBundle\Form\LieuType', $lieu_id);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('lieu_edit', array('lieu_id' => $lieu_id->getId()));
        }

        return $this->render('lieu/edit.html.twig', array(
            'lieu' => $lieu_id,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a lieu entity.
     *
     * @Route("/{lieu_id}", name="lieu_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Lieu $lieu_id)
    {
        $form = $this->createDeleteForm($lieu_id);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($lieu_id);
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
            ->setAction($this->generateUrl('lieu_delete', array('lieu_id' => $lieu->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
