<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Optreden;
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
     */
    public function history(){
        return true;
    }
    public function komendeOptredens(){
        return true;
    }
    public function weekOptredens(){
        return true;
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
