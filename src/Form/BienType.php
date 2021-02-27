<?php

namespace App\Form;

use App\Entity\Bien;
use App\Entity\Chauffage;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('description', TextareaType::class)
            ->add('surface')
            ->add('piece')
            ->add('chambre')
            ->add('etage')
            ->add('prix')
            ->add('ville')
            ->add('adresse')
            ->add('cp')
            ->add('actif')
            //->add('slug')
            ->add('chauffage', EntityType::class, array(
                'class' => Chauffage::class,
                'choice_label' => 'type',
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bien::class,
        ]);
    }
}
