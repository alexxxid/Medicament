<?php

namespace App\Form;

use App\Form\ComposerType;
use App\Form\ComposantType;
use App\Entity\Medicaments;
use Proxies\__CG__\App\Entity\Famille;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bundle\FrameworkBundle\Tests\Fixtures\Validation\Category;
use App\Entity\Composer;

class MedicamentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomCommercial')
            ->add('famille', EntityType::class, array(
                'class' => Famille::class,
                'choice_label' => 'NomFamille',
                'choice_attr' => [
                    'class' => 'dropdown-content blue darken-3',
                    'id' => 'MedicamentFormFamilleDd',
                ],
            ))
            ->add('PrixEchantillon')
            ->add('ContreIndication')
            ->add('Effet')
            ->add(
                'composers',
                CollectionType::class,
                [
                    'entry_type' => ComposerType::class,
                    'allow_add' => true
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Medicaments::class,
        ]);
    }
}
