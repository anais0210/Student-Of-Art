<?php 

namespace App\EventListener;

use App\Services\ImageUpload;
use Doctrine\ORM\EntityManagerInterface;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * class EditProfileListener 
 */
class EditProfileListener implements EventSubscriberInterface
{
    private $entityManager;
    private $tokenStorage;
    private $imageUpload;
    private $logoDirectory;

    /**
     * @param UrlGeneratorInterface  $router
     * @param EntityManagerInterface $entityManager
     * @param ImageUpload            $imageUpload
     * @param string                 $logoDirectory
     */
    public function __construct(EntityManagerInterface $entityManager, TokenStorageInterface $tokenStorage, ImageUpload $imageUpload, string $logoDirectory)
    {
        $this->entityManager = $entityManager;
        $this->tokenStorage = $tokenStorage;
        $this->imageUpload = $imageUpload;
        $this->logoDirectory = $logoDirectory;
    }

    /**
     * @return array  
     */
    public static function getSubscribedEvents()
    {
        return array (
            FOSUserEvents::PROFILE_EDIT_SUCCESS => 'onFOSUserEditProfile',
        );
    }

    /**
     * @param FormEvent $event 
     */
    public function onFOSUserEditProfile(FormEvent $event)
    {
        $form = $event->getForm();
        $artist = $this->tokenStorage->getToken()->getUser();

        /** @var Upload $logo */
        $logo = $form->get('logo');
        $this->imageUpload->upload($logo->getImage(), $this->logoDirectory);
    }
}
