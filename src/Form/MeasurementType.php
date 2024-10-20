<?php

namespace App\Form;

use App\Entity\Measurement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Location;

class MeasurementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('location', EntityType::class, [
                'class' => Location::class,
                'choice_label' => 'city',
                'attr' => ['class' => 'form-select']
            ])

            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'attr' => ['class' => 'form-control'],
                'html5' => true,
            ])


            ->add('celsius', NumberType::class, [
                'scale' => 1,
                'attr' => ['class' => 'form-control', 'step' => '0.1']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Measurement::class,
        ]);
    }
}
