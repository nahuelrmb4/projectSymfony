<?php

namespace App\Form;

use App\Entity\Sede;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SedeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('direccion')
            ->add('instituto')
            ->add('telefono')
            ->add('mail')
            ->add('url_campus')
            ->add('url_instituto')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Sede::class,
        ]);
    }
}
