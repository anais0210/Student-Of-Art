<?php 

namespace App\Form;

use App\Entity\PrivateSell;
use App\Entity\Upload;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * class PrivateSellType 
 */
class PrivateSellType extends AbstractType
{
	public function buildForm(FormBuilderInterface $builder, array $options)
	{
        $artist = $options['artist'];

		$builder
            ->add('nameEvent', null, [
                'attr' => [
            		'placeholder' => 'Nom de la vente',
            		'class' => 'form-control',
            	],
                'label' =>'Nom de la vente*',
            ])
            ->add('date', DateTimeType::class, [
                'label' => 'Date de votre vente*',
            ]) 			
            ->add('oeuvres', EntityType::class, array(
    			'class' => Upload::class,
    			'choice_label' => 'title',
                'by_reference' => false,
    			'multiple' => true,
    			'label' => 'Sélèctionner vos oeuvres',
    			'attr' => ['class' => 'form-control select2'],
                'query_builder' => function (EntityRepository $er) use ($artist) {
                    return $er->createQueryBuilder('u')
                        ->Where('u.artist = :artist')
                        ->andWhere('u.category IS NOT NULL')
                        ->andWhere('u.privateSell IS NULL')
                        ->setParameter('artist', $artist);
                }
			))
            ->add('numberPlaces', null, [
                'attr' => [
                	'placeholder' => 'nombre de participants',
                	'class' => 'form-control',
                ],
                'label' => 'Nombres de places* (de 1 à 15)',
            ])
            ->add('address', null, [
                'attr' => [
                    'placeholder' =>'lieux de la vente',
                    'class' => 'form-control',
                ],
                'label' => 'Adresse*',
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PrivateSell::class,
            'attr' => ['novalidate' => true],
            'artist' => null,
        ]);
    }
}