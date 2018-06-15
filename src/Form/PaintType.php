<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PaintType
 */
class PaintType extends AbstractType
{
    /**
     * PaintType builForm
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Titre'],
                'label_attr' => ['class' => ''],
            ])
            ->add('description', TextareaType::class, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Description'],
                'label_attr' => ['class' => ''],
            ])
            ->add('artiste', null, [
                'attr' => ['class' => 'form-control', 'placeholder' => 'Nom de l\'artiste'],
                'label_attr' => ['class' => ''],
            ])
            ->add('image', FileType::class, array( 'label' => 'Image(jpg)'))
            ->add('envoyer', SubmitType::class, [
                'attr' => ['class' => 'btn btn-primary'],
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\Entity\Paint',
            'attr' => ['novalidate' => true],
        ));
    }
}
