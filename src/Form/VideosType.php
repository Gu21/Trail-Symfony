<?php

namespace App\Form;


use App\Entity\Races;
use App\Entity\Videos;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


class VideosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titleVideo', TextType::class, [
                'label' => 'Titre',
            ])
            ->add('subtitleVideo', TextType::class, [
                'label' => 'Sous-titre',
            ])
            ->add('categoryVideo', TextType::class, [
                'label' => 'Catégorie vidéo',
            ])
            ->add('infoVideo',CKEditorType::class, [
                'label' => 'Info vidéo',
            ])
            ->add('linkVideo', TextType::class, [
                'label' => 'Lien vidéo',
            ])
            ->add('yearsVideo', TextType::class, [
                'label' => 'Année vidéo',
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name_Category',
                'label' => 'Catégorie',
            ])
            ->add('pictureVideo', FileType::class, [
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
                ])

            ->add('race', EntityType::class, [
                'class' => Races::class,
                'choice_label' => 'titleRace',
                'label' => 'Course',
               
            ]);
            
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Videos::class,
        ]);
    }
}
