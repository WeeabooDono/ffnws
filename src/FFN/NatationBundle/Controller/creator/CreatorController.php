<?php

namespace FFN\NatationBundle\Controller\creator;

use FFN\NatationBundle\Entity\Competition;
use FFN\NatationBundle\Entity\UtilisateurRole;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
/**
 * Club controller.
 *
 * @Route("creator")
 */
class CreatorController extends Controller
{
    /**
     * @Route("/", name="creator_index")
     * @Method("GET")
     */
    public function indexAction()
    {

        return $this->render('createur_competition/index.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/gestion", name="creator_gestion")
     * @Method("GET")
     */
    public function gestionAction()
    {
        $em = $this->getDoctrine()->getManager();

        $competitions = $em->getRepository('FFNNatationBundle:Competition')->findAll();

        return $this->render('createur_competition/gestion.html.twig', array(
            'competitions' => $competitions,
        ));
    }

    /**
     * Creates a new utilisateurrole entity.
     *
     * @Route("/gestion/{competition_id}", name="creator_gestion_juges")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, Competition $competition_id)
    {

        return $this->render('createur_competition/gestion_juge.html.twig', array(
            //
        ));
    }
}
