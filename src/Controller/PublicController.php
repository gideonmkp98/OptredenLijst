<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Optreden;

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
    public function history(){
     return true;
    }
    public function komendeOptredens(){
        return true;
    }
    public function weekOptredens(){
        return true;
    }
}
