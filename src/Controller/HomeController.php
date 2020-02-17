<?php

namespace App\Controller;

use App\Entity\AirConditioning;
use App\Entity\Light;
use App\Entity\Shutter;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        $light = $this->getFirstEntity(Light::class);
        $shutter = $this->getFirstEntity(Shutter::class);
        $air = $this->getFirstEntity(AirConditioning::class);

        return $this->render('home/index.html.twig', compact('light', 'shutter', 'air'));
    }

    private function getFirstEntity($entity)
    {
        return $this->em->getRepository($entity)->findAll()[0] ?? null;
    }
}
