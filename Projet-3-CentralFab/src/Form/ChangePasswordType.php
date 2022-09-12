<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class ChangePasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('oldPassword', PasswordType::class, [
                'label' => false,
                'mapped' => false,
                'attr' => ['placeholder' => 'Mot de passe'],
            ])
            ->add('plainPassword', RepeatedType::class, [
                'type' => PasswordType::class,
                'label' => false,
                'first_options'  => [
                    'label' => false,
                    'attr' => ['placeholder' => 'Nouveau mot de passe'],
                ],
                'second_options' => [
                    'label' => false,
                    'attr' => ['placeholder' => 'Confirmation mot de passe'],
                ],
                'invalid_message' => 'Le mot de passe doit être identique',
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer une vérification de votre Mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre vérification de Mot de passe doit faire {{ limit }} caractères minimum.',
                        'max' => 4096,
                        'maxMessage' => 'Votre vérification de Mot de passe doit faire {{ limit }} caractères maximum.',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
