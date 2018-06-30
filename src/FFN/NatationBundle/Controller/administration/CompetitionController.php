<?php

namespace FFN\NatationBundle\Controller\administration;

use FFN\NatationBundle\Entity\Competition;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Competition controller.
 *
 * @Route("admin/competition")
 */
class CompetitionController extends Controller
{
    /**
     * Lists all competition entities.
     *
     * @Route("/", name="competition_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $competitions = $em->getRepository('FFNNatationBundle:Competition')->findAll();

        return $this->render('competition/index.html.twig', array(
            'competitions' => $competitions,
        ));
    }

    /**
     * Creates a new competition entity.
     *
     * @Route("/new", name="competition_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $competition = new Competition();
        $form = $this->createForm('FFN\NatationBundle\Form\CompetitionType', $competition);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($competition);
            $em->flush();

            return $this->redirectToRoute('competition_show', array('competition_id' => $competition->getId()));
        }

        return $this->render('competition/new.html.twig', array(
            'competition' => $competition,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a competition entity.
     *
     * @Route("/{competition_id}", name="competition_show")
     * @Method("GET")
     */
    public function showAction(Competition $competition_id)
    {
        $deleteForm = $this->createDeleteForm($competition_id);

        return $this->render('competition/show.html.twig', array(
            'competition' => $competition_id,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing competition entity.
     *
     * @Route("/{competition_id}/edit", name="competition_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Competition $competition_id)
    {
        $deleteForm = $this->createDeleteForm($competition_id);
        $editForm = $this->createForm('FFN\NatationBundle\Form\CompetitionType', $competition_id);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('competition_edit', array('competition_id' => $competition_id->getId()));
        }

        return $this->render('competition/edit.html.twig', array(
            'competition' => $competition_id,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'lieu' => $competition_id->getLieu()->getNom(),
        ));
    }

    /**
     * Deletes a competition entity.
     *
     * @Route("/{competition_id}", name="competition_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Competition $competition_id)
    {
        $form = $this->createDeleteForm($competition_id);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($competition_id);
            $em->flush();
        }

        return $this->redirectToRoute('competition_index');
    }

    /**
     * Creates a form to delete a competition entity.
     *
     * @param Competition $competition The competition entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Competition $competition)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('competition_delete', array('competition_id' => $competition->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
