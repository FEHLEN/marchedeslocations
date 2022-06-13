<?php

namespace App\Form;


use App\Entity\Regions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchCuriositesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('regions', EntityType::class, [
                 'class' => Regions::class,
                 'label' => false,
                 'required' => false,
                 'multiple' => false,
                 
            ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
           // Configure your form options here
        ]);
    }
}
