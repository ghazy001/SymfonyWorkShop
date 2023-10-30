<?php

namespace App\Form;

use App\Entity\Bus;
use App\Entity\Chauffeur;
use App\Entity\Foie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class BusType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nbrCh', null, [
                'label' => 'Number of Chairs',
                'attr' => ['class' => 'AAA'],
            ])
            ->add('foie', EntityType::class, [
                'class' => Foie::class,
                'choice_label' => 'nom',
                'label' => 'Nom foie',
                'attr' => ['class' => 'inputC'],
            ])
            ->add('chauffeur', EntityType::class, [
                'class' => Chauffeur::class,
                'choice_label' => 'nom',
                'label' => 'Nom chauffeur',
                'attr' => ['class' => 'inputC'],
            ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn'],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bus::class,
        ]);
    }
}
