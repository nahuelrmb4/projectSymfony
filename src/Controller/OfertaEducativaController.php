<?php

namespace App\Controller;

use App\Entity\OfertaEducativa;
use App\Form\OfertaEducativaType;
use App\Repository\OfertaEducativaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/oferta/educativa')]
class OfertaEducativaController extends AbstractController
{
    #[Route('/', name: 'app_oferta_educativa_index', methods: ['GET'])]
    public function index(OfertaEducativaRepository $ofertaEducativaRepository): Response
    {
        return $this->render('oferta_educativa/index.html.twig', [
            'oferta_educativas' => $ofertaEducativaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_oferta_educativa_new', methods: ['GET', 'POST'])]
    public function new(Request $request, OfertaEducativaRepository $ofertaEducativaRepository): Response
    {
        $ofertaEducativa = new OfertaEducativa();
        $form = $this->createForm(OfertaEducativaType::class, $ofertaEducativa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ofertaEducativaRepository->save($ofertaEducativa, true);

            return $this->redirectToRoute('app_oferta_educativa_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oferta_educativa/new.html.twig', [
            'oferta_educativa' => $ofertaEducativa,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_oferta_educativa_show', methods: ['GET'])]
    public function show(OfertaEducativa $ofertaEducativa): Response
    {
        return $this->render('oferta_educativa/show.html.twig', [
            'oferta_educativa' => $ofertaEducativa,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_oferta_educativa_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, OfertaEducativa $ofertaEducativa, OfertaEducativaRepository $ofertaEducativaRepository): Response
    {
        $form = $this->createForm(OfertaEducativaType::class, $ofertaEducativa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $ofertaEducativaRepository->save($ofertaEducativa, true);

            return $this->redirectToRoute('app_oferta_educativa_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('oferta_educativa/edit.html.twig', [
            'oferta_educativa' => $ofertaEducativa,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_oferta_educativa_delete', methods: ['POST'])]
    public function delete(Request $request, OfertaEducativa $ofertaEducativa, OfertaEducativaRepository $ofertaEducativaRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ofertaEducativa->getId(), $request->request->get('_token'))) {
            $ofertaEducativaRepository->remove($ofertaEducativa, true);
        }

        return $this->redirectToRoute('app_oferta_educativa_index', [], Response::HTTP_SEE_OTHER);
    }
}
