<?php

namespace App\Controller;

use App\Entity\PrivateSell;
use App\Form\PrivateSellType;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\getManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\createForm;
use Symfony\Bundle\FrameworkBundle\Controller\getDoctrine;
use Symfony\Component\Form\Extension\HttpFoundation\handleRequest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * class PrivateSellController
 */
class PrivateSellController extends Controller
{
    /**
     * @Route("/profile/private/sell", name="private_sell")
     * 
     * @param Request $request
     * @return render
     */
    public function new(Request $request)
    {
        $privateSell = new privateSell();
        $form = $this->createForm(PrivateSellType::class, $privateSell,
        ['artist' => $this->getUser()]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            dump($form->get('oeuvres')->getData());
            $privateSell->setArtist($this->getUser());
            $em = $this->getDoctrine()->getManager();
            $em->persist($privateSell);
            $em->flush();
            $request->request->replace();

             return $this->redirect($this->generateUrl('private_sell'));
        }

        return $this->render('private_sell/index.html.twig', ['form' => $form->createView()]);
    }

    /**
     * @return render 
     */
    public function list()
    {
        $privateSells = $this->getDoctrine()
            ->getRepository(PrivateSell::class)
            ->findByArtist($this->getUser());

        return $this->render(
            'private_sell/list.html.twig',
            ['privateSells' => $privateSells]
        );
    }
}
