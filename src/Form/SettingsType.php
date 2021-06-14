<?php

namespace App\Form;

use App\Entity\Settings;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class SettingsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        
            ->add('eventSetting')
            ->add('eventSetting', DateType::class, [
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'dd-MM-yyyy',
            ])
            ->add('eventSetting', DateType::class, [
                'years' => range(1960, date('Y')+20) 
            ])
            
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Settings::class,
        ]);
    }
}
