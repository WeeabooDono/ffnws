<?php

namespace FFN\NatationBundle\Controller\administration;

use FFN\NatationBundle\Entity\UtilisateurRole;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * UtilisateurRole controller.
 *
 * @Route("admin/utilisateurrole")
 */
class UtilisateurRoleController extends Controller
{
    /**
     * Lists all utilisateurrole entities.
     *
     * @Route("/", name="utilisateurrole_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $utilisateurroles = $em->getRepository('FFNNatationBundle:UtilisateurRole')->findAll();

        return $this->render('utilisateurrole/index.html.twig', array(
            'utilisateurroles' => $utilisateurroles,
        ));
    }

    /**
     * Creates a new utilisateurrole entity.
     *
     * @Route("/new", name="utilisateurrole_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $utilisateurrole = new UtilisateurRole();
        $form = $this->createForm('FFN\NatationBundle\Form\UtilisateurRoleType', $utilisateurrole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($utilisateurrole);
            $em->flush();

            return $this->redirectToRoute('utilisateurrole_show', array('role_id' => $utilisateurrole->getRole()->getId(), 'personne_id' => $utilisateurrole->getPersonne()->getId(), 'competition_id' => $utilisateurrole->getCompetition()->getId()));
        }

        return $this->render('utilisateurrole/new.html.twig', array(
            'utilisateurrole' => $utilisateurrole,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a utilisateurrole entity.
     *
     * @Route("/{role_id}/{personne_id}/{competition_id}", name="utilisateurrole_show")
     * @Method("GET")
     */
    public function showAction($role_id, $personne_id, $competition_id)
    {
        $em = $this->getDoctrine()->getManager();
        $utilisateurrole = $em->getRepository('FFNNatationBundle:UtilisateurRole')->findOneBy(
            array(
                'role' => $role_id,
                'personne' => $personne_id,
                'competition' => $competition_id
            )
        );

        $deleteForm = $this->createDeleteForm($utilisateurrole);

        return $this->render('utilisateurrole/show.html.twig', array(
            'utilisateurrole' => $utilisateurrole,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing utilisateurrole entity.
     *
     * @Route("/{role_id}/{personne_id}/{competition_id}/edit", name="utilisateurrole_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, $role_id, $personne_id, $competition_id)
    {
        $em = $this->getDoctrine()->getManager();
        $utilisateurrole = $em->getRepository('FFNNatationBundle:UtilisateurRole')->findOneBy(
            array(
                'role' => $role_id,
                'personne' => $personne_id,
                'competition' => $competition_id
            )
        );

        $deleteForm = $this->createDeleteForm($utilisateurrole);
        $editForm = $this->createForm('FFN\NatationBundle\Form\UtilisateurRoleType', $utilisateurrole);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('utilisateurrole_edit', array('role_id' => $utilisateurrole->getRole()->getId(), 'personne_id' => $utilisateurrole->getPersonne()->getId(), 'competition_id' => $utilisateurrole->getCompetition()->getId()));
        }

        return $this->render('utilisateurrole/edit.html.twig', array(
            'utilisateurrole' => $utilisateurrole,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a utilisateurrole entity.
     *
     * @Route("/{role_id}/{personne_id}/{competition_id}", name="utilisateurrole_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $role_id, $personne_id, $competition_id)
    {
        $em = $this->getDoctrine()->getManager();
        $utilisateurrole = $em->getRepository('FFNNatationBundle:UtilisateurRole')->findOneBy(
            array(
                'role' => $role_id,
                'personne' => $personne_id,
                'competition' => $competition_id
            )
        );

        $form = $this->createDeleteForm($utilisateurrole);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($utilisateurrole);
            $em->flush();
        }

        return $this->redirectToRoute('utilisateurrole_index');
    }

    /**
     * Creates a form to delete a utilisateurrole entity.
     *
     * @param UtilisateurRole $utilisateurrole The utilisateurrole entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(UtilisateurRole $utilisateurrole)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('utilisateurrole_delete', array('role_id' => $utilisateurrole->getRole()->getId(), 'personne_id' => $utilisateurrole->getPersonne()->getId(), 'competition_id' => $utilisateurrole->getCompetition()->getId(), 'idUtilisateurRole' => $utilisateurrole->getIdUtilisateurRole())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
