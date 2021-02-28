<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('first_name', TextType::class, [
            'label' => false,
            'constraints' => [
                new NotBlank([
                    'message' => 'Veuillez saisir un Prénom',
                ]),
                new Length([
                    'min' => 1,
                    'minMessage' => 'Votre Prénom doit faire {{ limit }} caractères minimum.',
                    // max length allowed by Symfony for security reasons
                    'max' => 255,
                    'maxMessage' => 'Votre Prénom doit faire {{ limit }} caractères maximum',
                ]),
            ],
        ])
        ->add('last_name', TextType::class, [
            'label' => false,
            'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un Nom',
                    ]),
                    new Length([
                        'min' => 1,
                        'minMessage' => 'Votre Nom doit faire {{ limit }} caractères minimum.',
                        // max length allowed by Symfony for security reasons
                        'max' => 255,
                        'maxMessage' => 'Votre Nom doit faire {{ limit }} caractères maximum',
                    ]),
                ],
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un Courriel',
                    ]),
                    new Length([
                        'min' => 5,
                        'minMessage' => 'Votre Courriel doit faire {{ limit }} caractères minimum.',
                        // max length allowed by Symfony for security reasons
                        'max' => 255,
                        'maxMessage' => 'Votre Courriel doit faire {{ limit }} caractères maximum',
                    ]),
                ],
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter les conditions d\'utilisations.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'label' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre Mot de passe doit faire {{ limit }} caractères minimum.',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
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
