<?php

namespace App\Form;

use App\Entity\Races;
use App\Entity\Pictures;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PicturesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titlePicture')
            ->add('subtitlePicture')
            ->add('categoryPicture')
            ->add('infoPicture')
            ->add('linkPicture')
            ->add('race', EntityType::class, [
                'class' => Races::class,
                'choice_label' => 'titleRace',
            ])
            ->add('yearsPicture')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Pictures::class,
        ]);
    }
}
