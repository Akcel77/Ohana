<?php

namespace App\Controller;

use App\Entity\Booking;
use App\Form\BookingType;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookingController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/booking', name: 'app_booking')]
    public function index(Request $request): Response
    {

        $days = $this->entityManager->getRepository(Booking::class)->findAvailableSlots();
        $form = $this->createForm(BookingType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {

            return $this->render('test/test.html.twig', [

            ]);
        }
        return $this->render('booking/index.html.twig', [
            'form' => $form->createView(),
            'days' => $days,
        ]);
    }
}
