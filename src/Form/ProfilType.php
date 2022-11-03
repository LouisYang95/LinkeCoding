<?php

namespace App\Form;

use App\Entity\Profil;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProfilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameProfil')
            ->add('first_name')
            ->add('career')
            ->add('skillsProfil', ChoiceType::class, [
                'choices' => [
                    'Html' =>1,
                    'Css' =>2,
                    'Javascript' =>3,
                    'ReactJs' =>4,
                    'Flutter' =>6,
                    'Symfony' =>7,
                    'Laravel' =>8,
                    'SwiftUi' =>10,
                    'Php' =>11,
                ]
            ]
            )
            ->add("submit", SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Profil::class,
        ]);
    }
}
