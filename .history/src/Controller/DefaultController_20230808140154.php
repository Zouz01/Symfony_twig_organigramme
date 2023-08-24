<?php

namespace App\Controller;

use App\Entity\Team;
use App\Entity\Position;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TeamRepository;
use App\Repository\PositionRepository;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(TeamRepository $teamRepository, PositionRepository $positionRepository): Response
    {
        $teams = $teamRepository->findAll(); // Récupérer les équipes depuis le repository
        
        return $this->render('default/index.html.twig', [
            'team' => $teams, // Passer la variable 'teams' au template
        ]);
    }
    
    #[Route('/default/shows/{id}', name: 'app_shows')]
    public function shows(TeamRepository $repository, PositionRepository $positionRepository, int $id): Response
    {
        $team = $repository->findOneBy(["id" => $id]);
        $position = $positionRepository->findOneBy(["id" => $id]);
        
        return $this->render('default/shows.html.twig', [
            'team' => $team,
            // Autres données à passer au template si nécessaire
        ]);
    }

    #[Route('/api/team/{id}', methods: ['PATCH'])]
    public function updateTeam(Request $request, int $id): Response
    {
        // Fetch the team from the database based on the $id parameter
        $entityManager = $this->getDoctrine()->getManager();
        $team = $entityManager->getRepository(Team::class)->find($id);

        if (!$team) {
            throw $this->createNotFoundException('Team not found for id ' . $id);
        }

        // Parse and process the JSON data from the request body
        $jsonData = json_decode($request->getContent(), true);

        // Check if the 'manager_id' key exists in the JSON data
        if (isset($jsonData['manager_id'])) {
            // Update the manager_id value of the team
            $team->setManagerId($jsonData['manager_id']);

            // Persist the changes to the database
            $entityManager->flush();
        }

        // Return a success response
        return $this->json(['message' => 'Team updated successfully']);
    }
}
