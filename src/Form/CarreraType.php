<?php

namespace App\Form;

use App\Entity\Carrera;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CarreraType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('duracion')
            ->add('cant_asignaturas')
            ->add('modo')
            ->add('resolucion')
            ->add('turnos')
            ->add('institutos')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Carrera::class,
        ]);
    }
}
