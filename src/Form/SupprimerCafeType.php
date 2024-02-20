<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Cafe;

class SupprimerCafeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('cafes', EntityType::class, [
            'class' => Cafe::class,
            'choices' => $options['cafes'],
            'choice_label' => 'designation',
            'expanded' => true,
            'multiple' => true,
            'label' => false, 'mapped' => false])
            ->add('supprimer', SubmitType::class, ['attr' => ['class'=> 'btn bg-primary text-white m-4' ],
            'row_attr' => ['class' => 'text-center'],]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'cafes' => []
            // Configure your form options here
        ]);
    }
}
