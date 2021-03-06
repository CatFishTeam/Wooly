<?php
namespace App\EventListener;

use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class LoginListener {

protected $userManager;

    public function __construct(UserManagerInterface $userManager){
        $this->userManager = $userManager;
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        $user = $event->getAuthenticationToken()->getUser();
        return new Response($user->getId());
    }
}