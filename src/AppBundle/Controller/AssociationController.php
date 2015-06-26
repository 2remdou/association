<?php
/**
 * Created by PhpStorm.
 * User: mdoutoure
 * Date: 25/06/2015
 * Time: 15:58
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\Route;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Patch;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Util\Codes;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
//use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;


class AssociationController extends ApiController {
    private function processForm($objet,$objetType,$nameRoute=null){
        $form = $this->createForm($objetType,$objet);
        $request = $this->get('request');
        $form->submit($request);
        if($form->isValid()){
            $em = $this->getEntityManager();
            $em->persist($objet);
            $em->flush();
            $routeParam = array(
                'id' => $objet->getId(),
                '_format' => $request->get('_format'),
            );
            $response = new Response();
            $response->setStatusCode(Codes::HTTP_CREATED);
            if($nameRoute){
                $response->headers->set('Location',$this->generateUrl($nameRoute,$routeParam,true));
            }
            return $response;
        }
        return $this->view($form,Codes::HTTP_BAD_REQUEST);
    }
    private function wrapper($nameClass){
        $request = $this->get('request');
        $objet=$this->deserialize($nameClass,$request);
        return $objet;

    }
    private function save($objet,$route){
        $request = $this->get('request');
        $method = $request->getMethod();
        if($method==="POST"){
            $statusCode = Codes::HTTP_CREATED;
        }
        else{
            $statusCode = Codes::HTTP_OK;
        }

        $em = $this->getEntityManager();
        $em->persist($objet);
        $em->flush();
        /*try{
            $em->persist($objet);
            $em->flush();
        }catch (\Exception $e){
            $error = array(
                "type" => "info",
                "message"  => "J'ai encore cassé l'application, veuillez contacter l'Admin"
            );
            return $this->view(array('errors'=>$error),Codes::HTTP_BAD_REQUEST);
        }*/


        $routeParam = array(
            'id' => $objet->getId(),
            '_format' => $request->get('_format'),
        );
        $response = new Response();
        $response->setStatusCode(Codes::HTTP_CREATED);
        if($route){
            $response->headers->set('Location',$this->generateUrl($route,$routeParam,true));
        }
        return $this->view($response,$statusCode);
    }
    /**
     * @Route("/", name="homepage", options={"expose"=true})
     */
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }
} 