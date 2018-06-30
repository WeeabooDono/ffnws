<?php

namespace FFN\NatationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class NoterType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$lieu = $builder->getData()->getIdLieu()->getIdLieu();
        // 'choice_value' => 'idLieu'
        $builder->add('note')
            ->add('personne', EntityType::class, array(
                'class' => 'FFNNatationBundle:Personne'
            ))
            ->add('equipe', EntityType::class, array(
                'class' => 'FFNNatationBundle:Equipe',
                'choice_label' => 'nom'
            ))
            ->add('competition', EntityType::class, array(
                'class' => 'FFNNatationBundle:Competition',
                'choice_label' => 'nom'
            ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FFN\NatationBundle\Entity\Noter'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ffn_natationbundle_noter';
    }


}
