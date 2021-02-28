<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Courriel',
                'attr' => [
                    'placeholder' => 'Votre courriel',
                    'class' => 'form-control',
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'first_options'  => [
                    'label' => 'Mot de passe',
                    'attr' => [
                        'placeholder' => 'Mot de passe',
                        'class' => 'form-control',
                    ],
                ],
                'second_options' => [
                    'label' => 'Confirmer le mot de passe',
                    'attr' => [
                        'placeholder' => 'Confirmer le mot de passe',
                        'class' => 'form-control',
                    ],
                ],
                'invalid_message' => 'Le mot de passe doit être identique',
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer une vérification de votre mot de passe',
                    ]),
                    new Length([
                        'min' => 4,
                        'minMessage' => 'Votre vérification de mot de passe doit faire {{ limit }} caractères minimum.',
                        'max' => 4096,
                        'maxMessage' => 'Votre vérification de mot de passe doit faire {{ limit }} caractères maximum.',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}