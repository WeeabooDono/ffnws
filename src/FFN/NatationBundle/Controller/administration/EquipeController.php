<?php

namespace FFN\NatationBundle\Controller\administration;

use FFN\NatationBundle\Entity\Equipe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Equipe controller.
 *
 * @Route("admin/equipe")
 */
class EquipeController extends Controller
{
    /**
     * Lists all equipe entities.
     *
     * @Route("/", name="equipe_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $equipes = $em->getRepository('FFNNatationBundle:Equipe')->findAll();

        return $this->render('equipe/index.html.twig', array(
            'equipes' => $equipes,
        ));
    }

    /**
     * Creates a new equipe entity.
     *
     * @Route("/new", name="equipe_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $equipe = new Equipe();
        $form = $this->createForm('FFN\NatationBundle\Form\EquipeType', $equipe);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($equipe);
            $em->flush();

            return $this->redirectToRoute('equipe_show', array('equipe_id' => $equipe->getId()));
        }

        return $this->render('equipe/new.html.twig', array(
            'equipe' => $equipe,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a equipe entity.
     *
     * @Route("/{equipe_id}", name="equipe_show")
     * @Method("GET")
     */
    public function showAction(Equipe $equipe_id)
    {
        $deleteForm = $this->createDeleteForm($equipe_id);

        return $this->render('equipe/show.html.twig', array(
            'equipe' => $equipe_id,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing equipe entity.
     *
     * @Route("/{equipe_id}/edit", name="equipe_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Equipe $equipe_id)
    {
        $deleteForm = $this->createDeleteForm($equipe_id);
        $editForm = $this->createForm('FFN\NatationBundle\Form\EquipeType', $equipe_id);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('equipe_edit', array('equipe_id' => $equipe_id->getId()));
        }

        return $this->render('equipe/edit.html.twig', array(
            'equipe' => $equipe_id,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a equipe entity.
     *
     * @Route("/{equipe_id}", name="equipe_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Equipe $equipe_id)
    {
        $form = $this->createDeleteForm($equipe_id);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($equipe_id);
            $em->flush();
        }

        return $this->redirectToRoute('equipe_index');
    }

    /**
     * Creates a form to delete a equipe entity.
     *
     * @param Equipe $equipe The equipe entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Equipe $equipe)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('equipe_delete', array('equipe_id' => $equipe->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
