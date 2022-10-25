<?php

namespace App\Controller;

use App\Form\BookingType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookingController extends AbstractController
{
    #[Route('/booking', name: 'app_booking')]
    public function index(Request $request): Response
    {

        $form = $this->createForm(BookingType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            dd($form->getData());
            return $this->render('test/test.html.twig', [

            ]);
        }
        return $this->render('booking/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
