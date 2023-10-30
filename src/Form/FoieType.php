<?php

namespace App\Form;

use App\Entity\Foie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FoieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom',null,['label' => 'Nom Foie',
                'attr' => ['class' => 'inputC']])
            ->add('adresse',null,['label' => 'Adresse',
                'attr' => ['class' => 'inputC']])
            ->add('submit',SubmitType::class,[
                'attr' => ['class' => 'btn']]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Foie::class,
        ]);
    }
}
