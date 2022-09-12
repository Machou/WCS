<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'attr' => ['placeholder' => 'Courriel'],
                'label' => 'Courriel',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un Courriel.',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Votre Courriel doit faire {{ limit }} caractères minimum.',
                        'max' => 4096,
                        'maxMessage' => 'Votre Courriel doit faire {{ limit }} caractères maximum.',
                    ]),
                ],
            ])
            ->add('pseudo', TextType::class, [
                'attr' => ['placeholder' => 'Pseudo'],
                'label' => 'Pseudo',
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un Pseudo.',
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Votre Pseudo doit faire {{ limit }} caractères minimum.',
                        'max' => 4096,
                        'maxMessage' => 'Votre Pseudo doit faire {{ limit }} caractères maximum.',
                    ]),
                ],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'attr' => ['placeholder' => 'Vérification du Mot de passe'],
                'type' => PasswordType::class,
                'first_options'  => [
                    'label' => 'Mot de passe',
                ],
                'second_options' => [
                    'label' => 'Confirmer le Mot de passe',
                ],
                'invalid_message' => 'Le Mot de passe doit être identique.',
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer votre Mot de passe',
                    ]),
                    new Length([
                        'min' => 4,
                        'minMessage' => 'Votre Mot de passe doit faire {{ limit }} caractères minimum.',
                        'max' => 4096,
                        'maxMessage' => 'Votre Mot de passe doit faire {{ limit }} caractères maximum.',
                    ]),
                ],
            ])
            // ->add('agreeTerms', CheckboxType::class, [
            //     'mapped' => false,
            //     'constraints' => [
            //         new IsTrue([
            //             'message' => 'You should agree to our terms.',
            //         ]),
            //     ],
            // ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
