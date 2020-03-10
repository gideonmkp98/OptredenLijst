<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Optreden;
use App\Repository\OptredenRepository;
use App\Form\ContactType;

class PublicController extends AbstractController
{
    /**
     * @Route("/", name="public")
     */
    public function index()
    {
        return $this->render('public/index.html.twig', [
            'controller_name' => 'PublicController',
        ]);
    }

    /**
     * @Route("/history", name="history")
     * @param OptredenRepository $optredenRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function history(OptredenRepository $optredenRepository)
    {
        return $this->render('public/history.html.twig', [
            'optredens' => $optredenRepository->findAll(),
        ]);
    }
    /**
     * @Route("/contact", name="controler")
     */
    public function contact(){
        $form = $this->createForm(ContactType::class);

        return $this->render('public/contact.html.twig', [
                      'our_form' => $form->createView(),
        ]);
    }
}
