<?php

namespace App\Form;

use App\Entity\Projets;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProjetsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom du projet',
                'attr' => [
                    'placeholder' => 'Nom du projet',
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le nom du projet ne peut être vide.',
                    ]),
                ],
            ])
            ->add('description', TextType::class, [
                'label' => 'Description du projet',
                'attr' => [
                    'placeholder' => 'Description du projet',
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'La descritpion du projet ne peut être vide.',
                    ]),
                ],
            ])
            ->add('screen', FileType::class, [
                'data_class' => null,
                'label' => 'Capture d\'écran',
                'attr' => [
                    'placeholder' => 'Capture d\'écran',
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'La capture d\'écran ne peut être vide.',
                    ]),
                    new File([
                        'maxSize' => '2048k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Merci de télécharger une image.',
                    ])
                ],
            ])
            ->add('date', DateType::class, [
                'placeholder' => [
                    'placeholder' => 'Select a value',
                ],
                'model_timezone' => 'Europe/Paris',
                'years' => range(2000, date('Y')),
                'format' => 'dd MM yyyy',
                'constraints' => [
                    new NotBlank([
                        'message' => 'La date ne peut être vide.',
                    ]),
                ],
            ])
            ->add('lien', TextType::class, [
                'label' => 'Lien du projet',
                'attr' => [
                    'placeholder' => 'Lien du projet',
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le lien du projet ne peut être vide.',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Projets::class,
        ]);
    }
}
