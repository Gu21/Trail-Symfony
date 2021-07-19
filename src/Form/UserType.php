<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                    'class' => 'emailUser',
                    'placeholder' => 'Email',
                    
                    
                ]
            ]
            
            )

            ->add('roles')
            // ->add('password', PasswordType::class, [
            //     'label' => 'Mot de passe',
            //     'attr' => [
            //         'class' => 'passwordUser',
            //         'placeholder' => 'Mot de passe',
                    
                    
            //     ]
            // ]
            
            // )

            ->add('roles', ChoiceType::class, [
                'choices' => [
                'Administrateur' => User::ROLE_ADMIN,
                'Utilisateur' => User::ROLE_USER,
                ],
                'multiple' => true,
                'expanded' => true,
                'required' => true,
                ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
