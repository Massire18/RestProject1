<?php

namespace App\Form;

use App\Entity\MonImc;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MonImc1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender')
            ->add('name')
            ->add('surname')
            ->add('email')
            ->add('age')
            ->add('weight')
            ->add('height')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MonImc::class,
        ]);
    }
}
