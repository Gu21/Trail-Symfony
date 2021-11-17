<?php

namespace App\Form;

use App\Entity\Races;
use App\Entity\Participants;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParticipantsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titleParticipant')
            ->add('descriptionParticipant')
            ->add('linkParticipant')
            ->add('race', EntityType::class, [
                'class' => Races::class,
                'choice_label' => 'titleRace',
            ])
            ->add('downloadRegistrationParticipant');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Participants::class,
        ]);
    }
}
