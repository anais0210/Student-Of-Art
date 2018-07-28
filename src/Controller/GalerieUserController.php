<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * class GalerieUser
 */
class GalerieUserController extends Controller
{
    /**
     * @Route("/profile/galerie", name="galerie")
     * @return render
     */
    public function index()
    {
        return $this->render('userProfil/galerieUser/index.html.twig', [
            'controller_name' => 'GalerieController',
        ]);
    }
}