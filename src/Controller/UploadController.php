<?php

namespace App\Controller;

use App\Entity\Upload;
use App\Form\UploadType;
use App\Services\ImageUpload;
use Doctrine\Bundle\DoctrineBundle\Repository\getRepository;
use Doctrine\ORM\persist;
use FOS\UserBundle\Form\Factory\createForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller ;
use Symfony\Component\Form\Extension\HttpFoundation\handleRequest;
use Symfony\Component\Form\isSubmitted;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\Routing\Annotation\Route ;

/**
 * class UploadController
 */
class UploadController extends Controller
{
    /**
     * @Route("/profile/upload", name="new_upload")
     * 
     * @param Request     $request
     * @param ImageUpload $imageUpload
     * @return render
     */
    public function new(Request $request, ImageUpload $imageUpload)
    {
        $upload = new Upload();
        $form = $this->createForm(UploadType::class, $upload, ['need_category' => true]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form -> isValid()) {
            $file = $upload->getImage();
            $fileName = $imageUpload->upload($file);

            $upload->setArtist($this->getUser());
            $upload->setFileName($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($upload);
            $em->flush();

            return $this->redirect($this->generateUrl('new_upload'));
        }

        return $this->render('upload/upload.html.twig', ['form' => $form->createView()]);
    }
}