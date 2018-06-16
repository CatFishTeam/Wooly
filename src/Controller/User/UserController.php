<?php
namespace App\Controller\User;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends Controller
{
    /**
     * @Route("/user/{usernameCanonical}", name="userIndex")
     */
    public function index(User $user)
    {
        dump($user);
        $levels = $user->getLevels();
        dump($levels);
        return $this->render('user/index.html.twig', ['user' => $user, 'levels' => $levels]);
    }

}