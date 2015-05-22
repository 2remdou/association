<?php
/**
 * Created by PhpStorm.
 * User: mdoutoure
 * Date: 25/06/2015
 * Time: 15:58
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
//use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations\Route;


class AssociationController extends ApiController {

    /**
     * @Route("/", name="homepage", options={"expose"=true})
     */
    public function indexAction()
    {
        return $this->render('AppBundle::index.html.twig');
    }
} 
