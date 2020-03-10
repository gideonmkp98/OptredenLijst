<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Optreden;
use App\Repository\OptredenRepository;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;

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
     * @Route("/comming", name="comming")
     * @param OptredenRepository $optredenRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function komendeoptredens(OptredenRepository $optredenRepository){
        return $this->render('public/comming.html.twig', [
            'optredens' => $optredenRepository->findAll(),
        ]);
    }
    /**
     * @Route("/allperformance", name="allperformance")
     * @param OptredenRepository $optredenRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function allperformance(OptredenRepository $optredenRepository){
        return $this->render('public/allperformance.html.twig', [
            'optredens' => $optredenRepository->findAll(),
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function contact(Request $request, \Swift_Mailer $mailer){

        $form = $this->createForm(ContactType::class);
        dump($form->handleRequest($request));
        if($form->isSubmitted() && $form->isValid()){
            $contactFormData = $form->getData();

            $message = (new \Swift_Message('You Got Mail!'))
                ->setFrom('test@gideonmkp.nl')
                ->setTo('test@gideonmkp.nl')
                ->setBody(
                    $this->render('emails/contact.html.twig', [
                        'data' => $contactFormData,
                    ]), 'text/html');
                $mailer->send($message);

                $this->addFlash('success', 'Message was sent!');
                return $this->redirectToRoute('contact');



        }
        return $this->render('public/contact.html.twig', [
                     'our_form' => $form->createView(),
        ]);
    }
}
