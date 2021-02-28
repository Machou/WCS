<?php

namespace App\Form;

use App\Entity\Episode;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EpisodeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titre',
                'attr' => [
                    'placeholder' => 'Titre',
                    'class' => 'form-control',
                ],
            ])
            ->add('synopsis', TextType::class, [
                'label' => 'Synopsis',
                'attr' => [
                    'placeholder' => 'Synopsis',
                    'class' => 'form-control',
                ],
            ])
            ->add('number', TextType::class, [
                'label' => 'Numéro',
                'attr' => [
                    'placeholder' => 'Numéro',
                    'class' => 'form-control',
                ],
            ])
            ->add('season', null, [
                'choice_label' => 'number',
                'label' => 'Saison',
                'attr' => [
                    'placeholder' => 'Saison',
                    'class' => 'form-control',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Episode::class,
        ]);
    }
}
