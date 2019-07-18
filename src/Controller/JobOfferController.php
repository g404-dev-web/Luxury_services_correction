<?php

namespace App\Controller;

use App\Entity\JobOffer;
use App\Form\JobOfferType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/job/offer")
 */
class JobOfferController extends AbstractController
{
    /**
     * @Route("/", name="job_offer_index", methods={"GET"})
     */
    public function index(): Response
    {
        $jobOffers = $this->getDoctrine()
            ->getRepository(JobOffer::class)
            ->findAll();

        return $this->render('job_offer/index.html.twig', [
            'job_offers' => $jobOffers,
        ]);
    }



    /**
     * @Route("/{id}", name="job_offer_show", methods={"GET"})
     */
    public function show(JobOffer $jobOffer): Response
    {
        return $this->render('job_offer/show.html.twig', [
            'job_offer' => $jobOffer,
        ]);
    }


}
