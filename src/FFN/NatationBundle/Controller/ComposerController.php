<?php

namespace FFN\NatationBundle\Controller;

use FFN\NatationBundle\Entity\Composer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Composer controller.
 *
 * @Route("composer")
 */
class ComposerController extends Controller
{
    /**
     * Lists all composer entities.
     *
     * @Route("/", name="composer_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $composers = $em->getRepository('FFNNatationBundle:Composer')->findAll();

        return $this->render('composer/index.html.twig', array(
            'composers' => $composers,
        ));
    }

    /**
     * Creates a new composer entity.
     *
     * @Route("/new", name="composer_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $composer = new Composer();
        $form = $this->createForm('FFN\NatationBundle\Form\ComposerType', $composer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($composer);
            $em->flush();

            return $this->redirectToRoute('composer_show', array('idEquipe' => $composer->getIdEquipe()->getIdEquipe(), 'idPersonne' => $composer->getIdPersonne()->getIdPersonne()));
        }

        return $this->render('composer/new.html.twig', array(
            'composer' => $composer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a composer entity.
     *
     * @Route("/{idEquipe}/{idPersonne}", name="composer_show")
     * @Method("GET")
     */
    public function showAction(Composer $composer)
    {
        $deleteForm = $this->createDeleteForm($composer);

        return $this->render('composer/show.html.twig', array(
            'composer' => $composer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing composer entity.
     *
     * @Route("/{idEquipe}/{idPersonne}/edit", name="composer_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Composer $composer)
    {
        $deleteForm = $this->createDeleteForm($composer);
        $editForm = $this->createForm('FFN\NatationBundle\Form\ComposerType', $composer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('composer_edit', array('idEquipe' => $composer->getIdEquipe()->getIdEquipe(), 'idPersonne' => $composer->getIdPersonne()->getIdPersonne()));
        }

        return $this->render('composer/edit.html.twig', array(
            'composer' => $composer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a composer entity.
     *
     * @Route("/{idComposer}", name="composer_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Composer $composer)
    {
        $form = $this->createDeleteForm($composer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($composer);
            $em->flush();
        }

        return $this->redirectToRoute('composer_index');
    }

    /**
     * Creates a form to delete a composer entity.
     *
     * @param Composer $composer The composer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Composer $composer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('composer_delete', array('idEquipe' => $composer->getIdEquipe()->getIdEquipe(), 'idPersonne' => $composer->getIdPersonne()->getIdPersonne(), 'idComposer' => $composer->getIdComposer())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
