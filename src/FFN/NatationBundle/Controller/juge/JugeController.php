<?php

namespace FFN\NatationBundle\Controller\juge;

use FFN\NatationBundle\Entity\Noter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Club controller.
 *
 * @Route("juge")
 */
class JugeController extends Controller
{
    /**
     * Lists all club entities.
     *
     * @Route("/", name="juge_index")
     * @Method("GET")
     */
    public function indexAction()
    {

        return $this->render('juge/index.html.twig', array(
            // ...
        ));
    }

    /**
     * @Route("/competitions/list", name="competition_list")
     * @Method("GET")
     */
    public function currentcompetAction()
    {
        $em = $this->getDoctrine()->getManager();

        $competitions = $em->getRepository('FFNNatationBundle:Competition')->findAll();

        return $this->render('juge/competitions.html.twig', array(
            'competitions' => $competitions,
        ));
    }

    /**
     * @Route("/competition/{competition_id}/equipes", name="competition_equipe_list")
     * @Method({"GET", "POST"})
     */
    public function informationAction($competition_id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $notes = $em->getRepository('FFNNatationBundle:Noter')->findByCompetition($competition_id);

        $noter = new Noter();

        if ($request->isMethod('POST')) {
            //$equipe_id = $_POST["equipe"];
            //$personne_id = $_POST["personne"];
            //$compet_id = $_POST["competition"];
            $equipe = $em->getRepository('FFNNatationBundle:Equipe')->findOneById($_POST["equipe"]);
            $personne = $em->getRepository('FFNNatationBundle:Personne')->findOneById($_POST["personne"]);
            $competition = $em->getRepository('FFNNatationBundle:Competition')->findOneById($_POST["competition"]);
            $note = $_POST["note"];

            $noter->setCompetition($competition)
                ->setPersonne($personne)
                ->setEquipe($equipe)
                ->setNote($note);

            $em->persist($noter);
            $em->flush();
        }





        // remplissage d'un tableau avec les id d'équipes présentes en compétition
        $equipes_temp = array();
        for ($i = 0; $i< sizeof($notes); $i++){
            $equipes_temp[$i] = $notes[$i]->getEquipe()->getId();
        }
        $equipes_temp = array_unique($equipes_temp);

        $equipes = array();
        foreach ($equipes_temp as $idequipe){
            $equipes[] = $em->getRepository('FFNNatationBundle:Equipe')->findOneById($idequipe);
        }

        $competitions = $em->getRepository('FFNNatationBundle:Competition')->findOneById($competition_id);

        return $this->render('juge/equipes.html.twig', array(
            'competition' => $competitions,
            'equipes' => $equipes
        ));
    }


}
