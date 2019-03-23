<?php

namespace App\Form;

use App\Entity\MonImc;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;


class MonImcType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', TextType::class)
            ->add('name', TextType::class)
            ->add('surname', TextType::class)
            ->add('email', EmailType::class)
            ->add('age', IntegerType::class)
            ->add('weight', IntegerType::class)
            ->add('height',IntegerType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MonImc::class,
        ]);
    }
}
