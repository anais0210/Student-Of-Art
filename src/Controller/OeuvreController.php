<?php

namespace App\Controller;

use App\Entity\Upload;
use Doctrine\ORM\findAll;
use Doctrine\ORM\getRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\getDoctrine;
use Symfony\Component\Routing\Annotation\Route;

/**
 * class OeuvreController
 */
class OeuvreController extends Controller
{
    /**
     * @Route("/oeuvre/{categorie}", name="oeuvre")
     * @return render
     */
    public function index($categorie)
    {
    	$repo = $this->getDoctrine()->getRepository(Upload:: class);
    	$results = $repo->findAll();

        return $this->render('oeuvre/index.html.twig', ['categorie' => $categorie, 'oeuvres' => $results]);
    }
}
