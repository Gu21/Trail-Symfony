<?php

namespace App\Form;


use App\Entity\Races;
use App\Entity\Videos;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class VideosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titleVideo')
            ->add('subtitleVideo')
            ->add('categoryVideo')
            ->add('infoVideo')
            ->add('linkVideo')
            ->add('yearsVideo')
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name_Category',
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
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Videos::class,
        ]);
    }
}
