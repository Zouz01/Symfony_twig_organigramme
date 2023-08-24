<?php

namespace App\Controller;

use App\Entity\Position;
use App\Entity\Team;
use App\Form\TeamType;
use App\Repository\PositionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TeamRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request; 

class ServiceController extends AbstractController
{
    #[Route('/team', name: 'team',  methods: ['GET']))]
    public function team( PositionRepository $positionRepository ): Response 

    
    {
       return $this->render('team/index.html.twig', [
            'positions' => $positions,
        ]);
    }
}
