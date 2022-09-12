<?php

namespace App\Form;

use App\Entity\Actor;
use App\Entity\Program;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProgramType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateAdded', DateType::class, [
                'label' => 'Date d\'ajout',
                'placeholder' => [
                    'year' => 'Année', 'month' => 'Mois', 'day' => 'Jour',
                    'hour' => 'Heure', 'minute' => 'Minute', 'second' => 'Seconde',
                ],
                'model_timezone' => 'Europe/Paris',
                'years' => range(2000, date('Y')),
                'format' => 'dd MM yyyy',
                'empty_data' => 'John Doe',
                'constraints' => [
                    new NotBlank([
                        'message' => 'La date ne peut être vide.',
                    ]),
                ],
            ])
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
            ->add('summary', TextareaType::class, [
                'label' => 'Synopsis',
                'attr' => [
                    'placeholder' => 'Synopsis',
                    'class' => 'form-control',
					'rows' => 5,
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le synopsis ne peut être vide.',
                    ]),
                ],
            ])
            ->add('category', null, [
                'choice_label' => 'name',
                'label' => 'Catégorie',
                'attr' => [
                    'placeholder' => 'Catégorie',
                    'class' => 'form-control',
                ],
            ])
            ->add('year', IntegerType::class, [
                'label' => 'Année de production',
                'empty_data' => '2021',
                'attr' => [
                    'placeholder' => 'Année de production',
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'L\'année de production ne peut être vide.',
                    ]),
                    new Length([
                        'min' => 4,
                        'minMessage' => 'L\'année de production doit contenir {{ limit }} caractères minimum.',
                        'max' => 4,
                        'maxMessage' => 'L\'année de production doit contenir {{ limit }} caractères maximum.',
                    ]),
                ],
            ])
            ->add('tmdb', TextType::class, [
                'label' => 'Lien The Movie Database',
                'attr' => [
                    'placeholder' => 'Lien TMDb',
                    'class' => 'form-control',
                ],
            ])
            ->add('posterFile', VichFileType::class, [
                'label' => 'Télécharger un poster',
                'attr' => [
                    'class' => 'form-control',
                ],
                'required'      => false,
                'allow_delete'  => true,
                'delete_label' => 'Supprimer le poster ?',
                'download_uri'  => true,
                'download_label' => 'Télécharger le fichier',
            ])
            ->add('actors', EntityType::class, [
                'class' => Actor::class,
                'label' => 'Acteurs',
                'choice_attr' => function($choice, $key, $value) {
                     return ['class' => 'form-check-input'];
                },

				'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'by_reference' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Program::class,
        ]);
    }
}
