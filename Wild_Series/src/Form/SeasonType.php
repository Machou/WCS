<?php

namespace App\Form;

use App\Entity\Season;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class SeasonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('number', IntegerType::class, [
                'label' => 'Saison n°',
                'attr' => [
                    'placeholder' => 'Numéro',
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le numéro d\'épisode ne peut être vide.',
                    ]),
                ],
            ])
            ->add('year', IntegerType::class, [
                'label' => 'Année',
                'attr' => [
                    'placeholder' => 'Année',
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'L\'année ne peut être vide.',
                    ]),
                    new Length([
                        'min' => 4,
                        'minMessage' => 'L\'année doit contenir {{ limit }} caractères minimum.',
                        'max' => 4,
                        'maxMessage' => 'L\'année doit contenir {{ limit }} caractères maximum.',
                    ]),
                ],
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description',
                'attr' => [
                    'placeholder' => 'Description',
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'La description ne peut être vide.',
                    ]),
                ],
            ])
            ->add('program', null, [
                'choice_label' => 'title',
                'label' => 'Série',
                'attr' => [
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'La série ne peut être vide.',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Season::class,
        ]);
    }
}
