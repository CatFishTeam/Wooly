<?php
namespace App\Controller\WebSite;

use App\Entity\Level;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class WebSiteController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {

        $levels = $this->getDoctrine()
            ->getRepository(Level::class)
            ->findAll();

        if (!$levels) {
            throw $this->createNotFoundException(
                'No level found'
            );
        }
        // 1. Using the shortcut method of the controller

        // Adding a success type message
//        $this->addFlash("success", "This is a success message");
//        $this->addFlash("success", "This is my second success message");

        // Adding a warning type message
//        $this->addFlash("warning", "This is a warning message");

        // Adding an error type message
//        $this->addFlash("error", "This is an error message");

        return $this->render('website/home.html.twig', ['levels' => $levels]);
    }

}
