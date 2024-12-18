<?php

namespace App\Form;

use App\Classe\Search;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('string', TextType::class, [
                'label' => false,
                'required' => false,
                'attr' => [
                    'class' => 'form-control-sm',
                    'placeholder' => 'Votre recherche ...'
                ]
            ])
            ->add('accessibilites', ChoiceType::class, [
                'label' => false,
                'required' => false,
                'choices' => [
                    'Personne sourdes' => 'personne sourdes',
                    'Personnes Malvoyantes ou non voyantes' => 'Personnes Malvoyantes ou non voyantes',
                    'Fauteuil roulant' => 'Fauteuil roulant',
                    'Protese auditive' => 'Protese auditive',
                    'Assistance médicale' => 'Assistance médicale',
                    'Muet' => 'Muet',
                ],
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Filtrer',
                'attr' => [
                    'class' => 'btn-block btn-info'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Search::class,
            'method' => 'GET',
            'csrf_protection' => false,
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}