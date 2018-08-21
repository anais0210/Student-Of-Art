<?php

namespace App\Controller;

use App\Entity\Upload;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * class GalerieUser
 */
class GalerieUserController extends Controller
{
    /**
     * @Route("/profile/galerie", name="galerie")
     * @return render
     */
    public function index(EntityManagerInterface $em)
    {
        return $this->render('userProfil/galerieUser/index.html.twig', [
            'oeuvres' => $em->getRepository(Upload::class)->findByArtist($this->getUser())
        ]);
    }

     /**
     * @Route("/profile/galerie/image", name="image")
     * @return render
     */
    public function indexImage(EntityManagerInterface $em)
    {
        return $this->render('userProfil/galerieUser/image.html.twig', [
            'oeuvres' => $em->getRepository(Upload::class)->findByArtist($this->getUser())
        ]);
    }
}