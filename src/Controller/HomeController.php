<?php

namespace App\Controller;

use App\Repository;
use App\Entity\Bien;
use App\Entity\RechercheBien;
use App\Repository\BienRepository;
use Doctrine\ORM\Mapping\Id;
use Knp\Component\Pager\Paginator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Form\RechercheType;

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

    public function biens(PaginatorInterface $paginator, Request $request): Response
    {

        $recherche = new RechercheBien;
        $form = $this->createForm(RechercheType::class, $recherche);
        $form->handleRequest($request);

        $liste_biens = $paginator->paginate(
            $this->repository->find_Query($recherche),
            $request->query->getInt('page', 1), //page par defaut
            9 //nbr biens par page
        );


        return $this->render('pages/biens.html.twig', [
            'menu_courant' => 'biens',
            'liste_biens' => $liste_biens,
            'form' => $form->createView() 
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

        return $this->render('pages/bien.html.twig', [
            'menu_courant' => 'biens',
            'liste_biens' => $liste_biens
        ]);
    }
}
