<?php

namespace App\Form;

use App\Entity\Actor;
use App\Entity\Program;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ProgramType extends AbstractType
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
            ->add('summary', TextareaType::class, [
                'label' => 'Synopsis',
                'attr' => [
                    'placeholder' => 'Synopsis',
                    'class' => 'form-control',
                ],
            ])
            ->add('category', null, [
                'choice_label' => 'name',
                'label' => 'Catégorie',
                'attr' => [
                    'placeholder' => 'Poster',
                    'class' => 'form-control',
                ],
            ])
            ->add('year', IntegerType::class, [
                'label' => 'Année de production',
                'empty_data' => '2021',
                'attr' => [
                    'placeholder' => '2021',
                    'class' => 'form-control',
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
                'allow_delete'  => true, // not mandatory, default is true
                'delete_label' => 'Supprimer le poster ?',
                'download_uri'  => true, // not mandatory, default is true
                'download_label' => 'Télécharger le fichier',
            ])
            ->add('actors', EntityType::class, [
                'label' => 'Acteurs',
                'class' => Actor::class,
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
