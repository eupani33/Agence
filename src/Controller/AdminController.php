<?php

namespace App\Controller;

use App\Entity\Bien;
use App\Entity\Chauffage;
use App\Form\BienType;
use App\Repository\BienRepository;
use Doctrine\ORM\EntityManagerInterface;
 use Proxies\__CG__\App\Entity\Chauffage as EntityChauffage;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class AdminController extends AbstractController
{
    /**
     * @var BienRepository
     */
    private $repository;
    public function __construct(BienRepository $repository,  EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    } 


    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $liste_biens = $this->repository->findAll();
        return $this->render('admin/index.html.twig', compact('liste_biens'));
    }

    /**
     * @Route("/admin/{id}", name="admin.edit")
     * @param Bien $bien
     * @return Response
     */
    public function edit(Bien $bien, Request $request ): Response
    { 
        
        $form = $this->createForm(BienType::class, $bien);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) { 
              $this->em->Flush();
              return $this->redirectToRoute('admin');
        }


        #DD($bien);
        return $this->render('admin/edit.html.twig', [
            'bien' => $bien,
            'form' => $form->createView(),
        ]);
    }
}
