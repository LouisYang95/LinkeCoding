<?php

namespace App\Form;

use App\Entity\JobOffer;
use App\Entity\Company;
use App\Repository\CompanyRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        
            ->add('offerName')
            ->add('companyName', EntityType::class, [
                'class' => Company::class,
                'query_builder' => function (CompanyRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.companyName', 'ASC');
                },
                'choice_label' => 'companyName',
            ])
            ->add('descriptionOffer')
            ->add('skillOffer', ChoiceType::class,[
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
            ->add("submit", SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => JobOffer::class,
        ]);
    }
}
