<?php

namespace FFN\NatationBundle\Controller;

use FFN\NatationBundle\Entity\Equipe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NatationController extends Controller
{
    public function viewAction()
    {
        $em = $this->getDoctrine()->getManager();

        $competitions = $em->getRepository('FFNNatationBundle:Competition')->findAll();

        return $this->render('@FFNNatation/Natation/view.html.twig', array(
            'concours' => $competitions
        ));
    }

    public function concoursAction()
    {
        $em = $this->getDoctrine()->getManager();

        $competitions = $em->getRepository('FFNNatationBundle:Competition')->findAll();

        return $this->render('@FFNNatation/Natation/concours.html.twig', array(
            'concours' => $competitions
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

    public function groupeAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $equipe = $em->getRepository('FFNNatationBundle:Equipe')->findOneByIdEquipe($id);

        return $this->render('@FFNNatation/Natation/groupe.html.twig', array(
            'equipe'    => $equipe
        ));
    }
}
