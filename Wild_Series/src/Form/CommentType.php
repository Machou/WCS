<?php

namespace App\Form;

use App\Entity\Comment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CommentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('comment', TextType::class, [
                'label' => 'Commentaire',
                'attr' => [
                    'placeholder' => 'Commentaire',
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Le commentaire ne peut être vide.',
                    ]),
                ],
            ])
            ->add('rate', ChoiceType::class, [
                'label' => 'Note',
                'attr' => [
                    'placeholder' => 'Note',
                    'class' => 'form-control',
                ],
                'expanded' => true,
                'multiple' => false,
                'choices' => [
                    '1/5' => 1,
                    '2/5' => 2,
                    '3/5' => 3,
                    '4/5' => 4,
                    '5/5' => 5,
                ],
                'choice_attr' => [
                    '1/5' => ['class' => 'ms-3 me-1'],
                    '2/5' => ['class' => 'ms-3 me-1'],
                    '3/5' => ['class' => 'ms-3 me-1'],
                    '4/5' => ['class' => 'ms-3 me-1'],
                    '5/5' => ['class' => 'ms-3 me-1'],
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'La note ne peut être vide.',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comment::class,
        ]);
    }
}
