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
    #[Route('/default', name: 'default', methods: ['GET'])]
    public function team(PositionRepository $positionRepository): Response 
    {
        $positions = $positionRepository->findAll();
        
        return $this->render('team/index.html.twig', [
            'positions' => $positions,
        ]);
    }
    #[Route('default/ad-new', name: 'team_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em, UploaderPicture $uploaderPicture, UploaderCV $uploaderCV): Response
    {
        $newTeam = new Team();
        // Create a new Position instance and associate it with the new Team
        $position = new Position();
        $newTeam->addPositions($position); // Use addPositions method to associate the Position

        $teamForm = $this->createForm(TeamType::class, $newTeam);
}
}