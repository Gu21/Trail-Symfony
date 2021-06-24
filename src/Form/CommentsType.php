<?php

namespace App\Form;

use App\Entity\Comments;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\checkboxType;

class CommentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titleComment', TextType::class, [
                'label' => 'Titre commentaire',
                'attr' => [
                    'class' => 'form-control','titleComment',
                    'placeholder' => 'Titre',
                    
                    
                ]
            ]
            
            )


            ->add('nameComment', TextType::class, [
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-control','nameComment',
                    'placeholder' => 'Nom',
                ]
            ] )

            ->add('emailComment', EmailType::class, [
                'label' => 'Email',
                'attr' => [
                'class' => 'form-control','emailComment',
                'placeholder' => 'Email',
            ]
        ])
            ->add('commentComments', TextareaType::class, [
                'label' => 'Commentaire',
                'attr' => [
                'class' => 'form-control',
                'placeholder' => 'Commentaire','commentComments',
                
            ]
        ])

            ->add('Envoyer', SubmitType::class, [
                'attr' => [
                'class' => 'validate',
                
            ]
        ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comments::class,
        ]);
    }
}
