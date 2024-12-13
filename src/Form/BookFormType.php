<?php

namespace App\Form;

use App\Entity\Book;
use App\Entity\GenreTypeEnum;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'Titel',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bitte den Titel eintragen',
                    'style' => 'background-color:lightgrey; color:black;'
                ]
            ])
            ->add('author', TextType::class, [
                'label' => 'Autor',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bitte den Autor eintragen',
                    'style' => 'background-color:lightgrey; color:black;'
                ]
            ])
            ->add('genre', EnumType::class, ['class' => GenreTypeEnum::class,
                'expanded'=>true,
//                'required' => false,
                'multiple'=>false,
                'label' => 'Genre'
            ])

//            ->add('genre', ChoiceType::class, ['choices' => [
//                'Roman' => GenreTypeEnum::Roman,
//                'Krimi' => GenreTypeEnum::Krimi,
//                'Fantasie' => GenreTypeEnum::Fantasie,
//                'Sachbuch' => GenreTypeEnum::Sachbuch
//            ],
//                'expanded'=>true,
////                'required' => false,
//                'multiple'=>true,
//                'label' => 'Genre'
//            ])

            ->add('pages', IntegerType::class,[
                'label' => 'Seitenanzahl',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bitte Seitenanzahl angeben!',
                    'style' => 'background-color:lightgrey; color:black;'
                ]
            ])
            ->add('publisher', TextType::class, [
                'label' => 'Verlag',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bitte den Verlag eintragen!',
                    'style' => 'background-color:lightgrey; color:black;'
                ]
            ])
            ->add('publisherEmail', TextType::class, [
                'label' => 'Email',
                'required' => false,
                'attr' => [
                    'placeholder' => 'Bitte die Email eintragen!',
                    'style' => 'background-color:lightgrey; color:black;'
                ]
            ])
            ->add('publisherAt', DateType::class, [
                'label' => 'Veröffentlichung',
                'required' => false
            ])

            ->add('save', SubmitType::class)
            ->add('reset', ResetType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}
