<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PrivateSellController extends Controller
{
    /**
     * @Route("/private/sell", name="private_sell")
     */
    public function index()
    {
        return $this->render('private_sell/index.html.twig', [
            'controller_name' => 'PrivateSellController',
        ]);
    }
}
