<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;

class ChangeEmailType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                // 'label' => 'Votre Courriel',
				'label' => false,
                'attr' => [
                    'placeholder' => 'Mon email',
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
						'message' => 'Votre email ne peut être vide.',
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'La catégorie doit contenir {{ limit }} caractères minimum.',
                        'max' => 100,
                        'maxMessage' => 'La catégorie doit contenir {{ limit }} caractères maximum.',
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
