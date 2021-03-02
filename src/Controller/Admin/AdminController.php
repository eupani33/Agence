<?php

namespace App\Controller\Admin;

use App\Entity\Bien;
use App\Entity\Chauffage;
use App\Entity\Option;
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
     * @Route("/admin", name="admin.index")
     */
    public function index(): Response
    {
        $liste_biens = $this->repository->findAll();
        return $this->render('admin/index.html.twig', compact('liste_biens'));
    }

    /**
     * @Route("/admin/nouveau", name="admin.new")
     */
    public function new(Request $request)
    {
        $bien = new Bien();
        $form = $this->createForm(BienType::class, $bien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($bien);
            $this->em->Flush();
            $this->addFlash('succes', 'Ajout realisé');
            return $this->redirectToRoute('admin.index');
        }

        return $this->render('admin/nouveau.html.twig', [
            'bien' => $bien,
            'form' => $form->createView()
        ]);
    }



    /**
     * @Route("/admin/{id}", name="admin.edit", methods="GET|POST")
     * @param Bien $bien
     * @param Request $request
     * @return Symfony\Component\HttpFoundation\Response
     */
    public function edit(Bien $bien, Request $request): Response
    {
        #DD($bien);
        $form = $this->createForm(BienType::class, $bien);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->Flush();
            $this->addFlash('succes', 'Edition jour realisée');
            return $this->redirectToRoute('admin.index');
        }

        return $this->render('admin/edit.html.twig', [
            'bien' => $bien,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/admin/{id}", name="admin.delete", methods="DELETE")   
     */

    public function delete(Bien $bien, Request $request)
    {
        if ($this->isCsrfTokenValid('delete' . $bien->getId(), $request->get('_token'))) {
            $this->em->remove($bien);
            $this->em->Flush();
            $this->addFlash('succes', 'Suppression realisée');
        }
        return $this->redirectToRoute('admin.index');
    }
}
