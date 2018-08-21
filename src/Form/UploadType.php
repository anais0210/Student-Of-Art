<?php

namespace App\Form;

use App\Entity\Artist;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class UploadType
 */
class UploadType extends AbstractType
{
    /**
     * UploadType builForm
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'attr' => [
                    'label' => 'Titre',
                    'class' => 'form-control',
                    'placeholder' => 'Titre',
                ],
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Description'
                ],
            ])
            ->add('image', FileType::class,
                ['label' => 'Image(jpg)']
            )
        ;

        if ($options['need_category']) {
            $builder
                ->add('category', ChoiceType::class, [
                    'label' => 'Categorie',
                    'choices' => [
                        Artist::CATEGORY_DRAWING => Artist::CATEGORY_DRAWING,
                        Artist::CATEGORY_PAINT => Artist::CATEGORY_PAINT,
                        Artist::CATEGORY_SCULPTOR => Artist::CATEGORY_SCULPTOR,
                        Artist::CATEGORY_GRAPHICS => Artist::CATEGORY_GRAPHICS,
                    ]
                ])
            ;
        }
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'App\Entity\Upload',
            'attr' => ['novalidate' => true],
            'need_category' => false,
        ));
    }
}
