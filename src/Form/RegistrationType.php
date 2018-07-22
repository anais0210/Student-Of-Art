<?php

namespace App\Form;

use FOS\UserBundle\Form\Type\getBlockPrefix;
use FOS\UserBundle\Form\Type\getParent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * class RegistrationType 
 */
class RegistrationType extends AbstractType
{
    /**
     * RegistrationType builForm
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm ( FormBuilderInterface $builder , array $options )
    {
        $builder
                ->add('name', null, [
                    'attr' => ['class' => 'form-control'], 
                    'label_attr' => ['class' => ''],
                    'label' => 'Nom',
            ])
                ->add('LastName', null, [
                    'attr' => ['class' => 'form-control'], 
                    'label_attr' => ['class' => ''], 
                    'label' => 'Prenom',
            ])
        ;
    }

    /**
     * @return FOS\UserBundle\Form\Type\RegistrationFormType
     */
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

    /**
     * @return app_user_registration
     */
    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    /**
     * @return getBlockPrefix 
     */
    public function getName()
    {
        return $this -> getBlockPrefix();
    }

     /**
     * @return getBlockPrefix 
     */
    public function getPrenom()
    {
        return $this -> getBlockPrefix();
    }
}

