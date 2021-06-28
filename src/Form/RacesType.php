<?php

namespace App\Form;

use App\Entity\Races;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RacesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titleRace', TextType::class, [
                'label' => 'Titre',
            ])
            ->add('descriptionRace',CKEditorType::class, [
                'label' => 'Description course',
            ])
            ->add('infoRace',CKEditorType::class, [
                'label' => 'Info course',
            ])

            ->add('linkRace', TextType::class, [
                'label' => 'Lien course',
            ])

            ->add('pictureRace', FileType::class, [
                'label' => 'Photo',
                'mapped' => false,
                'required' => false,
                'constraints' => [
                new File([
                'maxSize' => '1024k',
                'mimeTypes' => [
                'image/*',
                ],
                'mimeTypesMessage' => 'Veuillez entrer un format de document valide',
                
                ])
            ],
                ]);
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Races::class,
        ]);
    }
}
