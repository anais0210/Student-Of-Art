<?php 

namespace App\EventListener;


use App\Entity\UserProfil;
use Doctrine\ORM\EntityManagerInterface;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * class RegistrationListener 
 */
class RegistrationListener implements EventSubscriberInterface
{
    private $router;
    private $entityManager;
    /**
     * @param UrlGeneratorInterface  $router
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(UrlGeneratorInterface $router, EntityManagerInterface $entityManager)
    {
        $this->router = $router;
        $this->entityManager = $entityManager;
    }

    /**
     * @return array  
     */
    public static function getSubscribedEvents()
    {
        return array (
            FOSUserEvents::REGISTRATION_COMPLETED => 'onFOSUserRegistrationSuccess',
        );
    }

    /**
     * @param FilterUserResponseEvent $event 
     */
    public function onFOSUserRegistrationSuccess(FilterUserResponseEvent $event)
    {
        $userProfil = new UserProfil();
        $artist = $event->getUser();
        $artist->setProfil($userProfil);
        $this->entityManager->persist($userProfil);
        $this->entityManager->flush($userProfil);
        $url = $this->router->generate('fos_user_profile_show');
        $event->getResponse()->setTargetUrl($url);
    }
}
