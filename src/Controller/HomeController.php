<?php

namespace App\Controller;

use App\Repository;
use App\Entity\Bien;
#use App\Entity\Chauffage;
use App\Repository\BienRepository;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @var BienRepository
     */
    private $repository;
    public function __construct(BienRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/", name="accueil")
     * @return Repsonse
     */
    public function index(): Response
    {
        $liste_biens = $this->repository->find_New();
        return $this->render('pages/home.html.twig', [
            'liste_biens' => $liste_biens
        ]);
    }

    /**
     * @Route ("/biens", name="biens")
     * @return Response
     */

    public function biens(): Response
    {
        $liste_biens = $this->repository->findAllActif();
        #dd($liste_biens);

        return $this->render('pages/biens.html.twig', [
            'menu_courant' => 'biens', 'liste_biens' => $liste_biens
        ]);
    }


    /**
     * @Route ("/biens/{slug}-{id}", name="bien", requirements={"slug": "[a-z0-9\-]*"})
     * @param Bien $liste_biens
     * @return Response
     */

    public function show(Bien $liste_biens, string $slug): Response
    {
        if ($liste_biens->getSlug() !== $slug) {
            return $this->redirectToRoute('bien', [
                'id' => $liste_biens->getId(),
                'slug' => $liste_biens->getSlug()
            ], 301);
        }
        DD($liste_biens);
        
        return $this->render('pages/bien.html.twig', [
            'menu_courant' => 'biens',
            'liste_biens' => $liste_biens
        ]);
    }
}
