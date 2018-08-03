<?php

namespace App\Form;

use FOS\UserBundle\Form\Type\getBlockPrefix;
use FOS\UserBundle\Form\Type\getParent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * class EditProfileType 
 */
class EditProfileType extends AbstractType
{
    /**
     * EditProfileType builForm
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
            ->add('lastName', null, [
                'attr' => ['class' => 'form-control'], 
                'label_attr' => ['class' => ''], 
                'label' => 'Prenom',
            ])
            ->add('logo', null, [
                'attr' => ['class' => ''],
                'label' => 'photo de profil',
            ])
            ->add('description', null, [
                'attr' => ['class' => 'form-control'],
                'label' => 'Biographie'])
        ;
    }

    /**
     * @return FOS\UserBundle\Form\Type\ProfileFormType
     */
    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';
    }

    /**
     * @return fos_user_profile
     */
    public function getBlockPrefix()
    {
        return 'app_user_profile';
    }
}

