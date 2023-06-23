<?php

namespace App\Controller;

use App\Entity\Sede;
use App\Form\SedeType;
use App\Repository\SedeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/sede')]
class SedeController extends AbstractController
{
    #[Route('/', name: 'app_sede_index', methods: ['GET'])]
    public function index(SedeRepository $sedeRepository): Response
    {
        return $this->render('sede/index.html.twig', [
            'sedes' => $sedeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_sede_new', methods: ['GET', 'POST'])]
    public function new(Request $request, SedeRepository $sedeRepository): Response
    {
        $sede = new Sede();
        $form = $this->createForm(SedeType::class, $sede);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sedeRepository->save($sede, true);

            return $this->redirectToRoute('app_sede_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sede/new.html.twig', [
            'sede' => $sede,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sede_show', methods: ['GET'])]
    public function show(Sede $sede): Response
    {
        return $this->render('sede/show.html.twig', [
            'sede' => $sede,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_sede_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Sede $sede, SedeRepository $sedeRepository): Response
    {
        $form = $this->createForm(SedeType::class, $sede);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $sedeRepository->save($sede, true);

            return $this->redirectToRoute('app_sede_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('sede/edit.html.twig', [
            'sede' => $sede,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_sede_delete', methods: ['POST'])]
    public function delete(Request $request, Sede $sede, SedeRepository $sedeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sede->getId(), $request->request->get('_token'))) {
            $sedeRepository->remove($sede, true);
        }

        return $this->redirectToRoute('app_sede_index', [], Response::HTTP_SEE_OTHER);
    }
}
