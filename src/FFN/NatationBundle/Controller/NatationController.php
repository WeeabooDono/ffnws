<?php

namespace FFN\NatationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NatationController extends Controller
{
    public function viewAction()
    {
        return $this->render('@FFNNatation/Natation/view.html.twig', array(
            // ...
        ));
    }

    public function concoursAction()
    {
        return $this->render('@FFNNatation/Natation/concours.html.twig', array(
            // ...
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
        return $this->render('@FFNNatation/Natation/information.html.twig', array(
            'id'    => $id
        ));
    }

    public function groupeAction($id)
    {
        return $this->render('@FFNNatation/Natation/groupe.html.twig', array(
            'id'    => $id
        ));
    }
}
