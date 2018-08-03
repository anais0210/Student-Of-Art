<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * class Accueil 
 */
class AccueilController extends Controller
{
    /**
     * @Route("/", name="accueil")
     * @return render
     */
    public function index()
    {
        return $this->render('core/homepage.html.twig');
    }
}
