<?php

namespace App\Form;

use App\Entity\Actor;
use Symfony\Component\Form\AbstractType;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ActorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de l\'Acteur',
                'attr' => [
                    'placeholder' => 'Nom de l\'Acteur',
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un nom d\'acteur.',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Le nom de l\'acteur doit contenir {{ limit }} caractères minimum.',
                        'max' => 100,
                        'maxMessage' => 'Le nom de l\'acteur doit contenir {{ limit }} caractères maximum.',
                    ]),
				],
            ])
            ->add('posterFile', VichFileType::class, [
                'label' => 'Télécharger une photo',
                'attr' => [
                    'class' => 'form-control',
                ],
                'required'      => false,
                'allow_delete'  => true, // not mandatory, default is true
                'delete_label' => 'Supprimer la photo ?',
                'download_uri'  => true, // not mandatory, default is true
                'download_label' => 'Télécharger le fichier',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Actor::class,
        ]);
    }
}
