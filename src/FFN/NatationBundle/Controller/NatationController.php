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

}
