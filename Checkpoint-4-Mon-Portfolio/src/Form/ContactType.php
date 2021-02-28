<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Votre nom',
                'attr' => [
                    'placeholder' => 'Votre nom',
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Votre nom ne peut être vide.',
                    ]),
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => 'Votre courriel',
                'attr' => [
                    'placeholder' => 'Votre courriel',
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Votre courriel ne peut être vide.',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Votre courriel doit contenir {{ limit }} caractères minimum.',
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('message', TextareaType::class, [
                'attr' => [
					'placeholder' => 'Votre message',
                    'class' => 'form-control',
					'rows' => 5,
				],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Votre message ne peut être vide.',
                    ]),
                    new Length([
                        'min' => 5,
                        'minMessage' => 'Votre message doit contenir {{ limit }} caractères minimum.',
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}