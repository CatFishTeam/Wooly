<?php
namespace App\Controller\Level;

use App\Entity\Level;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class LevelController extends Controller
{
    /**
     * @Route("/level/{id}", requirements={"id" = "\d+"}, name="levelIndex")
     */
    public function index(Level $level)
    {
        return $this->render('level/index.html.twig', ['level' => $level]);
    }

    /**
     * @Route("/levels", name="levelListing")
     */
    public function listing()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $levels = $entityManager->getRepository(Level::class)->findAll();
        return $this->render('level/listing.html.twig', ['levels' => $levels]);
    }
}