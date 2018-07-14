<?php
namespace App\Controller\Level;

use App\Entity\Level;
use App\Entity\Mark;
use App\Entity\User;
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
        $user = $this->getUser();
        $entityManager = $this->getDoctrine()->getManager();
        $mark = $entityManager->getRepository(Mark::class)->getScoreByUserAndLevel($user->getId(), $level->getId());
        return $this->render('level/index.html.twig', ['user' => $user, 'level' => $level, 'mark' => $mark]);
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