<?php

namespace FFN\NatationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NatationController extends Controller
{
    public function accueilAction()
    {
        $em = $this->getDoctrine()->getManager();

        $competitions = $em->getRepository('FFNNatationBundle:Competition')->findAll();

        return $this->render('@FFNNatation/Natation/accueil.html.twig', array(
            'competitions' => $competitions
        ));
    }

    public function competitionsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $competitions = $em->getRepository('FFNNatationBundle:Competition')->findAll();

        return $this->render('@FFNNatation/Natation/competitions.html.twig', array(
            'competitions' => $competitions
        ));
    }

    public function servicesAction()
    {
        return $this->render('@FFNNatation/Natation/services.html.twig', array(
            // ...
        ));
    }

    public function profilesAction()
    {
        return $this->render('@FFNNatation/Natation/profiles.html.twig', array(
            // ...
        ));
    }

    public function informationAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $noter = $em->getRepository('FFNNatationBundle:Noter')->findByIdCompetition($id);
        // remplissage d'un tableau avec les id d'équipes présentes en compétition
        $equipes_temp = array();
        for ($i = 0; $i< sizeof($noter); $i++){
           $equipes_temp[$i] = $noter[$i]->getIdEquipe()->getIdEquipe();
        }
        $equipes_temp = array_unique($equipes_temp);

        $equipes = array();
        foreach ($equipes_temp as $idequipe){
            $equipes[] = $em->getRepository('FFNNatationBundle:Equipe')->findOneByIdEquipe($idequipe);
        }

        $competitions = $em->getRepository('FFNNatationBundle:Competition')->findOneByIdCompetition($id);

        return $this->render('@FFNNatation/Natation/information.html.twig', array(
            'concour' => $competitions,
            'equipes' => $equipes
        ));
    }

    public function equipeAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $equipe = $em->getRepository('FFNNatationBundle:Equipe')->findOneByIdEquipe($id);
        $personnes = $em->getRepository('FFNNatationBundle:Composer')->findByIdEquipe($id);
        $curr_equipe = array();
        foreach ($personnes as $personne){
            if ($personne->getIsActif())
                $curr_equipe[] = $personne->getIdPersonne();
        }

        return $this->render('@FFNNatation/Natation/equipe.html.twig', array(
            'equipe'    => $equipe,
            'curr_equipe'=> $curr_equipe
        ));
    }

    public function information_nageurAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $personne = $em->getRepository('FFNNatationBundle:Personne')->findOneByIdPersonne($id);
        $noter = $em->getRepository('FFNNatationBundle:Noter')->findAll();
        return $this->render('@FFNNatation/Natation/information_nageur.html.twig', array(
            'personne'    => $personne,
            'noter'       => $noter
        ));
    }
}
