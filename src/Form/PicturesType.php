<?php

namespace App\Form;

use App\Entity\Races;
use App\Entity\Pictures;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class PicturesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titlePicture', TextType::class, [
                'label' => 'Titre',
            ])
            ->add('subtitlePicture', TextType::class, [
                'label' => 'Sous-titre',
            ])
            ->add('categoryPicture', TextType::class, [
                'label' => 'Catégorie photo',
            ])
            ->add('infoPicture', CKEditorType::class, [
                'label' => 'Description photo',
            ])
            ->add('linkPicture', TextType::class, [
                'label' => 'Lien de la photo',
            ])
            ->add('race', EntityType::class, [
                'class' => Races::class,
                'choice_label' => 'titleRace',
            ], TextType::class, [
                'label' => 'Catégorie course',
            ])
            ->add('yearsPicture', TextType::class, [
                'label' => 'Année',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pictures::class,
        ]);
    }
}
