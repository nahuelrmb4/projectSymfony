<?php

// src/Controller/SearchController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Instituto;

class SearchController extends AbstractController
{
    public function search(Request $request): Response
    {
        $query = $request->query->get('query');

        if ($query) {
            $institutos = $this->getDoctrine()
                ->getRepository(Instituto::class)
                ->createQueryBuilder('i')
                ->where('i.nombre LIKE :query')
                ->setParameter('query', '%' . $query . '%')
                ->getQuery()
                ->getResult();
        } else {
            $institutos = [];
        }

        return $this->render('search/index.html.twig', [
            'institutos' => $institutos,
            'query' => $query,
        ]);
    }
}
