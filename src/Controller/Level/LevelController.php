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

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class LevelController extends Controller
{
    /**
     * @Route("/level/{id}", requirements={"id" = "\d+"}, name="levelIndex")
     * @param Level $level
     * @return Response
     */
    public function index(Level $level)
    {
        $user = $this->getUser();
        $entityManager = $this->getDoctrine()->getManager();
        $mark = "";
        if($user){
            $mark = $entityManager->getRepository(Mark::class)->getScoreByUserAndLevel($user->getId(), $level->getId());
        }


        /* Test JSON */
        /*
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizers, $encoders);
        $jsonUser = $serializer->serialize($user, 'json');
        dump($jsonUser);

        $hash = hash('ripemd160', json_encode($user));
        dump($hash);
        */

        return $this->render('level/index.html.twig', ['user' => $user, 'level' => $level, 'mark' => $mark]);
    }

    /**
     * @Route("/levels", name="levelListing")
     */
    public function listing()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $levels = $entityManager->getRepository(Level::class)->findAll();
        foreach ($levels as $level){
            $marks = $entityManager->getRepository(Level::class)->getGlobalNote($level);
            $total = 0;
            $i = 0;
            foreach ($marks as $mark){
                $i++;
                $total += $mark['score'];
            }
            if($i != 0) $total = $total / $i;
            $level->score = $total;
        }

        $bestLevels = $levels;

        usort($bestLevels, function ($a, $b) {
            return $a->score < $b->score;
        });

        $bestLevels = array_slice($bestLevels, 0, 6);

        return $this->render('level/listing.html.twig', ['levels' => $levels, 'bestLevels' => $bestLevels]);
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