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
     * @Route("/level/{id}", requirements={"id" = "\d+"}, name="level")
     */
    public function index(Level $level)
    {
        dump($level);
        return $this->render('level/index.html.twig', ['level' => $level]);
    }
}