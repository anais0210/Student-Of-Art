<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * class UserProfil
 */
class UserProfilController extends Controller
{
    /**
     * @Route("/user-profil", name="user_profil")
     * @return render
     */
    public function index()
    {
        return $this->render('profil/index.html.twig', [
            'controller_name' => 'UserProfilController',
        ]);
    }
}
