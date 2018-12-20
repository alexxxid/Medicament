<?php

namespace App\Form;

use App\Entity\Composer;
use App\Entity\Composant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class ComposerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('composant', EntityType::class, array(
                'class' => Composant::class,
                'choice_label' => 'NomComposant',
                'choice_attr' => [
                    'class' => 'dropdown-content blue darken-3',
                    'id' => 'ComposerFormComposantDd',

                ],
            ))
            ->add('Quantite', NumberType::class, [
                'attr' => [
                    'placeholder' => "Quantité du Composant"
                ]
            ]);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Composer::class,
        ]);
    }
}
