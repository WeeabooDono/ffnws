<?php

namespace FFN\NatationBundle\Controller;

use FFN\NatationBundle\Entity\Noter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Noter controller.
 *
 * @Route("noter")
 */
class NoterController extends Controller
{
    /**
     * Lists all noter entities.
     *
     * @Route("/", name="noter_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $noters = $em->getRepository('FFNNatationBundle:Noter')->findAll();

        return $this->render('noter/index.html.twig', array(
            'noters' => $noters,
        ));
    }

    /**
     * Creates a new noter entity.
     *
     * @Route("/new", name="noter_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $noter = new Noter();
        $form = $this->createForm('FFN\NatationBundle\Form\NoterType', $noter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($noter);
            $em->flush();

            return $this->redirectToRoute('noter_show', array('idEquipe' => $noter->getIdEquipe()->getIdEquipe(), 'idPersonne' => $noter->getIdPersonne()->getIdPersonne(), 'idCompetition' => $noter->getIdCompetition()->getIdCompetition()));
        }

        return $this->render('noter/new.html.twig', array(
            'noter' => $noter,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a noter entity.
     *
     * @Route("/{idEquipe}/{idPersonne}/{idCompetition}", name="noter_show")
     * @Method("GET")
     */
    public function showAction(Noter $noter)
    {
        $deleteForm = $this->createDeleteForm($noter);

        return $this->render('noter/show.html.twig', array(
            'noter' => $noter,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing noter entity.
     *
     * @Route("/{idEquipe}/{idPersonne}/{idCompetition}/edit", name="noter_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Noter $noter)
    {
        $deleteForm = $this->createDeleteForm($noter);
        $editForm = $this->createForm('FFN\NatationBundle\Form\NoterType', $noter);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('noter_edit', array('idEquipe' => $noter->getIdEquipe()->getIdEquipe(), 'idPersonne' => $noter->getIdPersonne()->getIdPersonne(), 'idCompetition' => $noter->getIdCompetition()->getIdCompetition()));
        }

        return $this->render('noter/edit.html.twig', array(
            'noter' => $noter,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a noter entity.
     *
     * @Route("/{idNoter}", name="noter_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Noter $noter)
    {
        $form = $this->createDeleteForm($noter);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($noter);
            $em->flush();
        }

        return $this->redirectToRoute('noter_index');
    }

    /**
     * Creates a form to delete a noter entity.
     *
     * @param Noter $noter The noter entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Noter $noter)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('noter_delete', array('idEquipe' => $noter->getIdEquipe()->getIdEquipe(), 'idPersonne' => $noter->getIdPersonne()->getIdPersonne(), 'idCompetition' => $noter->getIdCompetition()->getIdCompetition(), 'idNoter' => $noter->getIdNoter())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
