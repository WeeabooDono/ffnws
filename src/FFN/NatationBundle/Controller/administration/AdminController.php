<?php

namespace FFN\NatationBundle\Controller\administration;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Club controller.
 *
 * @Route("admin")
 */
class AdminController extends Controller
{
    /**
     * Lists all club entities.
     *
     * @Route("/", name="admin_index")
     * @Method("GET")
     */
    public function indexAction()
    {

        return $this->render('index.html.twig', array(
            // ...
        ));
    }
}
