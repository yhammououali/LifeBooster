<?php

namespace LifeBooster\FrontBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
	/**
	 * @Route("/home")
	 * @Template()
	 */
    public function indexAction()
    {
        return $this->render('LifeBoosterFrontBundle:Default:index.html.twig');
    }

}
