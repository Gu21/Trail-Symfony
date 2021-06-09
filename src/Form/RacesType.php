<?php

namespace App\Form;

use App\Entity\Races;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RacesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titleRace')
            ->add('descriptionRace')
            ->add('infoRace')
            ->add('linkRace')
            ->add('pictureRace')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Races::class,
        ]);
    }
}
