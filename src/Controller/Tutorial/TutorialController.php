<?php

namespace App\Controller\Tutorial;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TutorialController extends Controller
{
    /**
     * @Route("/tutorial", name="tutorial")
     */
    public function index()
    {
        return $this->render('tutorial/index.html.twig', [
            'controller_name' => 'TutorialController',
        ]);
    }
}
