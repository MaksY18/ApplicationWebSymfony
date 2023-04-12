<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ControllerPrincipalController extends AbstractController
{
    #[Route('/controller/principal', name: 'app_controller_principal')]
    public function index(): Response
    {
        return $this->render('controller_principal/index.html.twig', [
            'controller_name' => 'ControllerPrincipalController',
        ]);
    }
}
