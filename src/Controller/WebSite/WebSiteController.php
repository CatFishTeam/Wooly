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
            ->findBy([],['id' => 'ASC'], 6);

        $mostPlayedLevels = $this->getDoctrine()
            ->getRepository(Level::class)
            ->findBy([],['played' => 'DESC'], 5);

        if (!$levels || !$mostPlayedLevels) {
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


        $user = $this->getUser();
        $hash = '';
        if (!empty($user)) {
            $hash = hash('ripemd160', $user->getId());
        }

        return $this->render('website/home.html.twig', ['levels' => $levels, 'hash' => $hash, 'mostPlayedLevels' => $mostPlayedLevels]);
    }

}
