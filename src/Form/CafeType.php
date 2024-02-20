<?php

namespace App\Form;

use App\Entity\Cafe;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CafeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('designation', TextType::class, ['attr' => ['class'=> 'form-control'], 'label_attr' => ['class'=>
        'fw-bold']])
        ->add('origine', TextType::class, ['attr' => ['class'=> 'form-control'], 'label_attr' => ['class'=>
        'fw-bold']])
        ->add('envoyer', SubmitType::class, ['attr' => ['class'=> 'btn bg-primary text-white m-4' ],
        'row_attr' => ['class' => 'text-center'],])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cafe::class,
        ]);
    }
}
