<?php

namespace App\Form;

use App\Entity\RegisterTrail;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RegisterTrailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('newletterRegisterTrail')

            //---------Upload fichier pdf-----------------
            ->add('newletterRegisterTrail', FileType::class, [
                'label' => 'Inscription trail',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        // 'maxSize' => '1024k',
                        // 'mimeTypes' => [
                        // 'pdf',
                        // ],
                        'mimeTypesMessage' => 'Veuillez entrer un format de document valide',

                    ])
                ],
            ])
            //-----END----Upload fichier pdf-----------------


            ->add('infoRegisterTrail', CKEditorType::class, [
                'label' => 'Info trail', //Changer le label
            ])

            ->add('linkRegisterTrail',TextType::class, [
                'label' => 'Lien inscription trail', //Changer le label
            ])

            ->add('linkVolunteerRegisterTrail',TextType::class, [
                'label' => 'Lien inscription bénévoles', //Changer le label
            ])


            // ->add('newletterPartnerRegisterTrail')

            ->add('newletterPartnerRegisterTrail', FileType::class, [
                'label' => 'Inscription partenaires',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        // 'maxSize' => '1024k',
                        // 'mimeTypes' => [
                        //     'image/*',
                        // ],
                        'mimeTypesMessage' => 'Veuillez entrer un format de document valide',

                    ])
                ],
            ])

            // ->add('internalRulesRegisterTrail')

            ->add('internalRulesRegisterTrail', FileType::class, [
                'label' => 'Réglement intérieur',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        // 'maxSize' => '1024k',
                        // 'mimeTypes' => [
                        //     'image/*',
                        // ],
                        'mimeTypesMessage' => 'Veuillez entrer un format de document valide',

                    ])
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RegisterTrail::class,
        ]);
    }
}
