<?php 

namespace App\EventListener;


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
    /**
     * @param UrlGeneratorInterface  $router
     */
    public function __construct(UrlGeneratorInterface $router)
    {
        $this->router = $router;
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
        $url = $this->router->generate('fos_user_profile_show');
        $event->getResponse()->setTargetUrl($url);
    }
}
