<?php

namespace FFN\NatationBundle\Controller\administration;

use FFN\NatationBundle\Entity\Composer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Composer controller.
 *
 * @Route("admin/composer")
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

            return $this->redirectToRoute('composer_show', array('equipe_id' => $composer->getEquipe()->getId(), 'personne_id' => $composer->getPersonne()->getId()));
        }

        return $this->render('composer/new.html.twig', array(
            'composer' => $composer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a composer entity.
     *
     * @Route("/{equipe_id}/{personne_id}", name="composer_show")
     * @Method("GET")
     */
    public function showAction($equipe_id, $personne_id)
    {
        $em = $this->getDoctrine()->getManager();
        $composer = $em->getRepository('FFNNatationBundle:Composer')->findOneBy(
            array(
                'equipe' => $equipe_id,
                'personne' => $personne_id
            )
        );
        $deleteForm = $this->createDeleteForm($composer);

        return $this->render('composer/show.html.twig', array(
            'composer' => $composer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing composer entity.
     *
     * @Route("/{equipe_id}/{personne_id}/edit", name="composer_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, $equipe_id, $personne_id)
    {
        $em = $this->getDoctrine()->getManager();
        $composer = $em->getRepository('FFNNatationBundle:Composer')->findOneBy(
            array(
                'equipe' => $equipe_id,
                'personne' => $personne_id
            )
        );

        $deleteForm = $this->createDeleteForm($composer);
        $editForm = $this->createForm('FFN\NatationBundle\Form\ComposerType', $composer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('composer_edit', array('equipe_id' => $composer->getEquipe()->getId(), 'personne_id' => $composer->getPersonne()->getId()));
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
     * @Route("/{equipe_id}/{personne_id}", name="composer_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $equipe_id, $personne_id)
    {
        $em = $this->getDoctrine()->getManager();
        $composer = $em->getRepository('FFNNatationBundle:Composer')->findOneBy(
            array(
                'equipe' => $equipe_id,
                'personne' => $personne_id
            )
        );


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
            ->setAction($this->generateUrl('composer_delete', array('equipe_id' => $composer->getEquipe()->getId(), 'personne_id' => $composer->getPersonne()->getId(), 'composer_id' => $composer->getIdComposer())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
