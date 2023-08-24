use App\Service\UploaderPicture;
use App\Service\UploaderCV;
use Symfony\Component\HttpFoundation\Response;

// ... (autres use statements)

class ServiceController extends AbstractController
{
    #[Route('/default', name: 'default', methods: ['GET'])]
    public function team(PositionRepository $positionRepository): Response 
    {
        // ... (votre méthode team)
    }

    #[Route('default/ad-new', name: 'team_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $em, UploaderPicture $uploaderPicture, UploaderCV $uploaderCV): Response
    {
        $newTeam = new Team();
        // Create a new Position instance and associate it with the new Team
        $position = new Position();
        $newTeam->addPositions($position); // Use addPositions method to associate the Position

        $teamForm = $this->createForm(TeamType::class, $newTeam);
        $teamForm->handleRequest($request);

        if ($teamForm->isSubmitted() && $teamForm->isValid()) {
            // Upload and set picture and CV here if needed
            // For example:
            // $uploaderPicture->upload($newTeam->getPhoto());
            // $uploaderCV->upload($newTeam->getCV());

            $em->persist($newTeam);
            $em->flush();

            // Redirect to a success page or do other actions
            return $this->redirectToRoute('team_new');
        }

        return $this->render('team/new.html.twig', [
            'teamForm' => $teamForm->createView(),
        ]);
    }
}
