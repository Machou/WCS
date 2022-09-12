<?php

namespace App\Form;

use App\Entity\Episode;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

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
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le titre ne peut être vide.',
                    ]),
                ],
            ])
            ->add('synopsis', TextareaType::class, [
                'label' => 'Synopsis',
                'attr' => [
                    'placeholder' => 'Synopsis',
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le synopsis ne peut être vide.',
                    ]),
                ],
            ])
            ->add('number', IntegerType::class, [
                'label' => 'Numéro',
                'attr' => [
                    'placeholder' => 'Numéro',
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le numéro ne peut être vide.',
                    ]),
                    new Length([
                        'min' => 4,
                        'minMessage' => 'Le numéro doit contenir {{ limit }} caractères minimum.',
                        'max' => 4,
                        'maxMessage' => 'Le numéro doit contenir {{ limit }} caractères maximum.',
                    ]),
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
