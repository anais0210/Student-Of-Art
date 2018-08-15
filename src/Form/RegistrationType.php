<?php

namespace App\Form;

use FOS\UserBundle\Form\Type\getBlockPrefix;
use FOS\UserBundle\Form\Type\getParent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
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
                'label' => 'Nom',
                'attr' => ['placeholder' => 'Nom']
            ])
            ->add('lastName', null, [
                'label' => 'Prénom',
                'attr' => ['placeholder' => 'Prénom']
            ])
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'options' => array(
                    'translation_domain' => 'FOSUserBundle',
                    'attr' => array(
                        'autocomplete' => 'new-password',
                    ),
                ),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'confirmer '),
                'invalid_message' => 'fos_user.password.mismatch',
            ))
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
}

