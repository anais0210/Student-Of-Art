<?php

namespace App\Controller;

use App\Entity\Paint;
use App\Form\PaintType;
use FOS\UserBundle\Form\Factory\createForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller ;
use Symfony\Component\Form\Extension\HttpFoundation\handleRequest;
use Symfony\Component\Form\isSubmitted;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\Routing\Annotation\Route ;

/**
 * class Paint 
 */
class PaintController extends Controller
{
    /**
     * @Route("/paint", name="new_paint")
     * @param Request $request
     * @return render
     */
    public function new(Request $request)
    {
        $paint = new Paint();
        $form = $this->createForm(PaintType::class, $paint);
        $form -> handleRequest($request);

        if ($form -> isSubmitted() && $form -> isValid()) {
            $file = $paint -> getPaint();
            $fileName = $this -> generateUniqueFileName() . '.' . $file -> guessExtension();
            $file -> move(
                $this -> getParameter('paint_directory'),
                $fileName
            );
            $image -> setImage($fileName);

            return $this -> redirect($this -> generateUrl('app_paint_list'));
        }

        return $this -> render('paint/paint.html.twig', array(
            'form' => $form -> createView(),
        ));
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        return md5(uniqid());
    }
}
