<?php

namespace App\Form;

use App\Entity\Partners;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PartnersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            // ->add('titlePartner', TextType::class, [
            //     'label' => 'Titre',])
            // ->add('picturePartner')
            // ->add('descriptionPartner')
            // ->add('downloadFolderPartner')
            ->add('picturePartner', FileType::class, [
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
            'data_class' => Partners::class,
        ]);
    }
}
