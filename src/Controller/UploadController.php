<?php

namespace App\Controller;

use App\Entity\Upload;
use App\Form\UploadType;
use Doctrine\Bundle\DoctrineBundle\Repository\getRepository;
use FOS\UserBundle\Form\Factory\createForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller ;
use Symfony\Component\Form\Extension\HttpFoundation\handleRequest;
use Symfony\Component\Form\isSubmitted;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\Routing\Annotation\Route ;

/**
 * class Upload 
 */
class UploadController extends Controller
{
    /**
     * @Route("/upload", name="new_upload")
     * @param Request $request
     * @return render
     */
    public function new(Request $request)
    {
        $upload = new Upload();
        $form = $this->createForm(UploadType::class, $upload);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form -> isValid()) {
            $file = $upload->getUpload();
            $fileName = $this->generateUniqueFileName() . '.' . $file -> guessExtension();
            $file->move(
                $this -> getParameter('upload_directory'),
                $fileName
            );
            $image -> setImage($fileName);

            return $this -> redirect($this -> generateUrl('app_upload_list'));
        }

        return $this -> render('upload/upload.html.twig', array(
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

    public function findByCategory()
    {
        $repository = $this
        ->getDoctrine()->getManager()->getRepository(Upload:: class)
        ;

        $categories = $repository->FindAll();
    }
}
