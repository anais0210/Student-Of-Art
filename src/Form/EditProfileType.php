<?php

namespace App\Form;

use App\Form\UploadType;
use FOS\UserBundle\Form\Type\getBlockPrefix;
use FOS\UserBundle\Form\Type\getParent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * class EditProfileType 
 */
class EditProfileType extends AbstractType
{
    /**
     * EditProfileType buildForm
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
                'label' => 'Prénom',
            ])
            ->add('logo', UploadType::class, [
                'attr' => ['class' => ''],
                'label' => 'photo de profil',
                'required' => false
            ])
            ->add('categories', ChoiceType::class, [
                'choices'  =>[
                    'dessinateur' => 'drawing',
                    'peintre'     => 'paint',
                    'sculpteur'    => 'sculptor',
                    'grapheur'    => 'graphics',
                ],
                'label' => 'vous êtes un',
                'multiple' => true,
                'expanded' => true
            ])
            ->add('biography', null, [
                'attr' => ['class' => 'form-control'],
            'label' => 'Biographie'])
            ->add('birthdayDate', BirthdayType::class, [
                'label' => 'age',
                'required' => false
            ])
            ->add('country', null, [
                'attr' => ['class' => 'form-control'],
                'label' => 'pays',
                'required' => false
            ])
            ->add('city', null, [
                'attr' => ['class' => 'form-control'],
                'label' => 'ville',
                'required' => false
            ])
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

