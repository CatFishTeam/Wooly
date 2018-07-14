<?php
namespace App\Controller\Level;

use App\Entity\Level;
use App\Entity\Mark;
use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/saveNote", name="saveNote")
     */
    public function saveNote(Request $request)
    {
        $level_id = $request->request->get('level');
        $score = $request->request->get('rating');
        $user_id = $request->request->get('user');

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->getRepository(Mark::class)->setScoreByUserAndLevel($user_id, $level_id, $score);

        exit;
    }
}