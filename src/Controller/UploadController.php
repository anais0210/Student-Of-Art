<?php

namespace App\Controller;

use App\Entity\Upload;
use App\Form\UploadType;
use Doctrine\Bundle\DoctrineBundle\Repository\getRepository;
use Doctrine\ORM\persist;
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
        $form = $this->createForm(UploadType::class, $upload, ['need_category' => true]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form -> isValid()) {
            $file = $upload->getImage();
            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('gallery_directory'),
            $fileName);
            $upload->setArtist($this->getUser());
            $upload->setFileName($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($upload);
            $em->flush();
            $request->request->replace();

            return $this->redirect($this->generateUrl('new_upload'));
        }

        return $this->render('upload/upload.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        return md5(uniqid());
    }

    /**
     * getRepository 
     */
    public function findByCategory()
    {
        $repository = $this->getDoctrine()
        ->getManager()
        ->getRepository(
        Upload::class);

        $categories = $repository->FindAll();
    }
}
