<?php

namespace App\Form;

use App\Entity\Regions;
use App\Entity\Offreslocations;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;


class OffreslocationsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
       
        $builder
            ->add('titre', TextType::class)
            ->add('structure', choiceType::class, [
                'choices' => [
                    'Chalet' => 'Chalet',
                    'Maison' => 'Maison',
                    'Appartement' => 'Appartement',
                    'Caravane' => 'Caravane',
                    'MobileHome' => 'MobilHome',
                    'Insolite' => 'Insolite'
                ],
                'multiple' => false,
                'expanded' => true,
                'required' => true
            ])
            ->add('nbreChambres', NumberType::class)
            ->add('nbrePersonnes', NumberType::class)
            ->add('description', TextType::class)
            ->add('tarifHorsSaison', NumberType::class)
            ->add('tarifPleineSaison', NumberType::class)
            ->add('laveLinge', ChoiceType::class, [
                'choices' => [
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ],
                'multiple' => false,
                'expanded' => true,
                'required' => true
            ])
            ->add('parking', ChoiceType::class, [
                'choices' => [
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ],
                'multiple' => false,
                'expanded' => true,
                'required' => true
            ])
            ->add('douche', ChoiceType::class, [
                'choices' => [
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ],
                'multiple' => false,
                'expanded' => true,
                'required' => true
            ])
            ->add('congelateur', ChoiceType::class, [
                'choices' => [
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ],
                'multiple' => false,
                'expanded' => true,
                'required' => true
            ])
            ->add('laveVaisselle', ChoiceType::class, [
                'choices' => [
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ],
                'multiple' => false,
                'expanded' => true,
                'required' => true
            ])
            ->add('TV', ChoiceType::class, [
                'choices' => [
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ],
                'label' =>'TV',
                'multiple' => false,
                'expanded' => true,
                'required' => true
            ])
            ->add('ville', TextType::class)
            ->add('codePostal', NumberType::class)
            ->add('tel', NumberType::class)
            ->add('departement', TextType::class)

            ->add('regions', EntityType::class, [
                'class' => Regions::class,
                'choice_label' => 'nom',
                'placeholder' => 'Régions',
                'label' => 'Région',
                'required' => true
            ])
          
            //On ajoute le champ 'images' dans le formulaire
            //Il n'est pas relier à la base de données (mapped false)
            ->add('image1', FileType::class, [
                'mapped' => false,
                'required' => false
            ])

            ->add('image2', FileType::class, [
                'mapped' => false,
                'required' => false
            ])
          
            
       ; 
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Offreslocations::class,
           
        ]);
    }
}
