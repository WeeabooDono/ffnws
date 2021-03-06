<?php

namespace FFN\NatationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ClubType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
            ->add('lieu', EntityType::class, array(
                'class' => 'FFNNatationBundle:Lieu',
                'choice_label' => 'nom'))
            ->add('personne', EntityType::class, array(
                'class' => 'FFNNatationBundle:Personne'));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FFN\NatationBundle\Entity\Club'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ffn_natationbundle_club';
    }


}
