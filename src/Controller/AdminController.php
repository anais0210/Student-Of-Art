<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * class AdminController
 */
class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     * @return render
     */
    public function index()
    {
        return $this->render('admin/.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }
}
