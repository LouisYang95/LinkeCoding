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
            ->add('profilSkill', ChoiceType:: class,[
                'choices' => [
                    'HTML' => 'HTML',
                    'CSS' => 'CSS',
                    'JavaScript' => 'JavaScript',
                    'ReactJs' => 'ReactJS',
                    'Flutter' => 'Flutter',
                    'Symfony' => 'Symfony',
                    'Laravel' => 'Laravel',
                    'SwiftUi' => 'SwiftUi',
                    'PHP' => 'PHP',
                ]
            ])

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
