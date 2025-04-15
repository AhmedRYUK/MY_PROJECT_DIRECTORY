<?php

namespace App\Form;

use App\Entity\Expert;
use App\Entity\Rendezvous;
use App\Entity\Startup;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RendezvousType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateRdv')
            ->add('statut')
            ->add('notes')
            ->add('startup', EntityType::class, [
                'class' => Startup::class,
                'choice_label' => 'id',
            ])
            ->add('expert', EntityType::class, [
                'class' => Expert::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Rendezvous::class,
        ]);
    }
}
