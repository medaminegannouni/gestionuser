<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom_user')
            ->add('prenom_user')
            ->add('roles', ChoiceType::class, [
                'multiple'  =>  true,
                'expanded'  =>  true,
                'choices'  => [
                    'Responsable' =>  'Responsable',
                    'Employee' => 'Employee',
                    'Candidat' => 'Candidat',
                ],
            ])
            ->add('password')
            ->add('email')
            ->add('poste')
            ->add('num_carte_bancaire')
            ->add('tel')
            ->add('lieu_ns')
            ->add('civilite')
            ->add('date_ne')
            ->add('situation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
