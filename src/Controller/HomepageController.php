<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
  #[Route('', name: 'app_homepage')]
  public function index(): Response
  {
      return $this->render('homepage/index.html.twig');
  }
  
  #[Route('/homepage/preinscripcion.html.twig', name: 'app_preinsc')]
  public function app_preinsc(): Response
  {
      return $this->render('homepage/preinscripcion.html.twig');
  }
  
  #[Route('/homepage/plataforma.html.twig', name: 'app_plataforma')]
  public function app_plataforma(): Response
  {
      return $this->render('homepage/plataforma.html.twig');
  }
  
  #[Route('/instituto/index', name: 'app_instituto')]
  public function app_instituto(): Response
  {
      return $this->render('instituto/index.html.twig');
  }



}

