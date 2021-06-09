<?php

namespace App\Form;

use App\Entity\Volunteers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VolunteersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titleVolunteer')
            ->add('descriptionVolunteer')
            ->add('nameVolunteer')
            ->add('firstNameVolunteer')
            ->add('phoneVolunteer')
            ->add('objectVolunteer')
            ->add('messageVolunteer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Volunteers::class,
        ]);
    }
}
