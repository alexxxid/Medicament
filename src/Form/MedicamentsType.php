<?php

namespace App\Form;

use App\Entity\Medicaments;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MedicamentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomCommercial')
            ->add('PrixEchantillon')
            ->add('ContreIndication')
            ->add('Effet')
            ->add('famille', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'title'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Medicaments::class,
        ]);
    }
}
