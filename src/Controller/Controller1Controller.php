<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Controller1Controller extends AbstractController
{
    /**
     * @Route("/controller1", name="controller1")
     */
    public function index()
    {
        return $this->render('controller1/index.html.twig', [
            'controller_name' => 'Controller1Controller',
        ]);
    }

    /**
     *  @Route("/controller1/monAction1");
     */
    public function monAction1(){
        $text = "Ce controller est nouveau et je suis juste une action à l'intérieur";
        $res = new Response();
        $res->headers->set('Content-Type', 'text-html');
        $res->setContent($text);
        return $res;
    }

    /**
     *  @Route("/controller1/belgique");
     */
    public function belgique(){
        $text = "Vive la Belgique !";
        $response = new Response();
        $response->headers->set('Content-Type', 'text-html');
        $response->setContent($text);
        return $response;
    }

    /**
     * @Route("/controller1/moyenne/{nmb1}/{nmb2}/{nmb3}")
     */

    public function afficheMoyenne(Request $request){
        $n1 = (double)$request->get("nmb1");
        $n2 = (double)$request->get("nmb2");
        $n3 = (double)$request->get("nmb3");
        $moyenne = ($n1 + $n2 + $n3) / 3 ;
        return new Response("<h2>Votre moyenne : " . $moyenne . "</h2>");
    }

    /**
     * @Route("controller1/array");
     */
    public function array(){
        $arrayNoms = ["Pikachu","Emolga","Eloise","Saitama"];
        return $this->render('controller1/array.html.twig', ['arrNom' => $arrayNoms]);
    }

    /**
     * @Route("controller1/add/{nmb1}/{nmb2}");
     */
    public function add(Request $req){
        return $this->render('controller1/add.html.twig', ['result' => ((double)$req->get('nmb1') + (double)$req->get('nmb2'))]);
    }

    /**
     * @Route("controller1/redirect/{num}");
     */
    public function redirectTo(Request $req){
        $url = ((double)$req->get("num") > 50) ? "https://www.google.com" : "https://duckduckgo.com/" ;
        return $this->redirect($url);
    }

    /**
     * @Route("controller1/ifelse");
    */
    public function ifelse(){
        $h = date('H');
        return $this->render("controller1/ifelse.html.twig", ['h' => (int)$h]);
    }
}
