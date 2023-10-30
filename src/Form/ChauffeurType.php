<?php

namespace App\Form;

use App\Entity\Bus;
use App\Entity\Chauffeur;
use App\Entity\Foie;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChauffeurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',null,['label' => 'Nom chauffeur',
                'attr' => ['class' => 'inputC']])
            ->add('prenom',null,['label' => 'prenom chauffeur',
                'attr' => ['class' => 'inputC']])
            ->add('date',null,['label' => 'date naissance',
                'attr' => ['class' => 'inputC']])

            ->add('submit',SubmitType::class,[
                'attr' => ['class' => 'btn']]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Chauffeur::class,
        ]);
    }
}
