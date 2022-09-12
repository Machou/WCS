<?php

namespace App\Form;

use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de la Catégorie',
                'attr' => [
                    'placeholder' => 'Nom de la Catégorie',
                    'class' => 'form-control',
                ],
                'constraints' => [
                    new NotBlank([
						'message' => 'Le nom de la Catégorie ne peut être vide.',
                    ]),
                    new Length([
                        'min' => 1,
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
            'data_class' => Category::class,
        ]);
    }
}
