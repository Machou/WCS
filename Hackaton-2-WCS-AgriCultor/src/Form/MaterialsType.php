<?php

namespace App\Form;

use App\Entity\Materials;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class MaterialsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('type', ChoiceType::class, [
            'choices' => [
                'tracteur' => 'tracteur',
                'moissonneuse batteuse' => 'moissonneuse batteuse',
                'ensileuse' => 'ensileuse',
            ]
        ])
        ->add('trademark', ChoiceType::class, [
            'choices' => [
                'Lamborghini' => 'Lamborghini',
                'John Deere' => 'John Deere',
                'New Holland' => 'New Holland',
            ]
        ])
        ->add('model', ChoiceType::class, [
            'choices' => [
                'Mach 230 VRT' => 'Mach 230 VRT',
                '1470' => '1470',
                'FR500' => 'FR500',
            ]
        ])
        ->add('year', ChoiceType::class, [
            'choices' => [
                2018 => 2018,
                2010 => 2010,
                2013 => 2013,
            ]
        ])
        ->add('kilometer', IntegerType::class, [
            'label' => 'Kilomètrage',
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Materials::class,
        ]);
    }
}
