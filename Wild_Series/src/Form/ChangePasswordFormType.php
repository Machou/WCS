<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class ChangePasswordFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options' => [
					'attr' => [
						'placeholder' => 'Mot de passe',
						'class' => 'form-control',
						'style' => 'width: 330px;',
					],
                    'constraints' => [
                        new NotBlank([
                            'message' => 'Votre mot de passe ne peut être vide.',
                        ]),
                        new Length([
                            'min' => 3,
                            'minMessage' => 'Votre mot de passe doit contenir {{ limit }} caractères minimum.',
                            'max' => 4096,
                            'maxMessage' => 'Votre mot de passe doit contenir {{ limit }} caractères maximum.',
                        ]),
                    ],
                    'label' => false,
                ],
                'second_options' => [
                    'label' => 'Confirmation du mot de passe',
					'attr' => [
						'placeholder' => 'Confirmation du mot de passe',
						'class' => 'form-control',
						'style' => 'width: 330px;',
					],
                ],
				'invalid_message' => 'Le mot de passe doit être identique',
                // Instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([]);
    }
}
