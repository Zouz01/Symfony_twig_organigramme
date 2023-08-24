<?php

namespace App\Controller;

use App\Repository\TeamRepository;
use App\Entity\Team;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PositionRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\VarDumper\VarDumper;

class DefaultController extends AbstractController
{
    #[Route('/default', name: 'app_default')]
    public function index(TeamRepository $repository, PositionRepository $positionRepository): Response
    {
        // Récupération de tous les membres de l'équipe et de toutes les positions
        $team = $repository->findAll();
        $positions = $positionRepository->findAll();

        // Créer des tableaux pour chaque groupe en fonction de la position
        $managerGroup = [];
        $secondRankGroup = [];
        $thirdRankGroup = [];
        $fourthRankGroup = [];

        foreach ($team as $teamMember) {
            dump($teamMember); // Afficher le membre de l'équipe (pour le débogage)

            // Récupérer toutes les positions de l'équipe
            $positions = $teamMember->getPositions();

            // Pour trouver le manager correspondant
            $managerId = $teamMember->getManagerId();
            if ($managerId !== null) {
                $manager = $repository->find($managerId);
                if ($manager) {
                    $managerPosition = $manager->getPositions()[0]->getLabel();
                    $teamMember->managerPosition = $managerPosition;
                }
            }

            // Parcourir les positions de l'équipe et les trier dans les groupes appropriés
            foreach ($positions as $position) {
                if ($position->getId() == 1) {
                    $managerGroup[] = $teamMember;
                } elseif ($position->getId() == 4 || $position->getId() == 3 || $position->getId() == 2) {
                    $secondRankGroup[] = $teamMember;
                } elseif ($position->getId() == 5 || $position->getId() == 6 || $position->getId() == 7) {
                    $thirdRankGroup[] = $teamMember;
                } elseif ($position->getId() == 8) {
                    $fourthRankGroup[] = $teamMember;
                }
            }
        }

        // Afficher les groupes (pour le débogage)
        dump($managerGroup);
        dump($secondRankGroup);
        dump($thirdRankGroup);
        dump($fourthRankGroup);
        dump($team);
        // die('Reached here.'); // Arrêter l'exécution ici (pour le débogage)

        // Rendre le template en passant les données nécessaires
        return $this->render('default/index.html.twig', [
            'managerGroup' => $managerGroup,
            'secondRankGroup' => $secondRankGroup,
            'thirdRankGroup' => $thirdRankGroup,
            'fourthRankGroup' => $fourthRankGroup,
            'positions' => $positions,
        ]);
    }

    
    #[Route('default/shows/{id}', name: 'app_shows')]
    public function shows(TeamRepository $teamRepository, PositionRepository $positionRepository, int $id): Response
    {
        $team = $teamRepository->findOneBy(["id" => $id]);
        $position = $positionRepository->findOneBy(["id" => $id]);

        return $this->render('default/shows.html.twig', [
            'team' => $team,
            'position' => $position,
        ]);
    }
    
    #[Route('/team', name: 'team', methods: ['GET'])]
    public function team(PositionRepository $positionRepository): Response 
    {
        $positions = $positionRepository->findAll();
            
        return $this->render('team/index.html.twig', [
            'positions' => $positions,
        ]);
    }
}
