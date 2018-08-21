<?php

namespace App\Controller;

use App\Entity\Artist;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * class Aritst 
 */
class ArtistController extends Controller
{
    /**
     * @Route("/artist", name="artist")
     * @return render
     */
    public function index()
    {
        $repo = $this->getDoctrine()
        ->getRepository(
        Artist::class);
        $artistes = $repo->findAll();

            return $this->render('artist/index.html.twig', [
                'artistes'
                =>$artistes
                ]
            )
        ;
    }
}
