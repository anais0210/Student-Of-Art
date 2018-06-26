<?php

namespace App\Form;

use FOS\UserBundle\Form\Type\getBlockPrefix;
use FOS\UserBundle\Form\Type\getParent;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
	public function buildForm ( FormBuilderInterface $builder , array $options )
	{
		 $builder
            ->add('name', null, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Nom'],
                'label_attr' => ['class' => ''],
            ])
             ->add('LastName', null, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Prenom'],
                'label_attr' => ['class' => ''],
            ])
            ->add('upload', null, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Upload'],
                'label_attr' => ['class' => ''],
            ])
            ->add('description', TextareaType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Description'],
                'label_attr' => ['class' => ''],
            ])
        ;
    }

	public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';
    }

      public function getBlockPrefix ()
    {
        return 'app_user_registration' ;
    }
    
    public function getName ()
    {
        return $this -> getBlockPrefix ();
    }
}

