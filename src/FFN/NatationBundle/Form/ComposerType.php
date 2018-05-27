<?php

namespace FFN\NatationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ComposerType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$lieu = $builder->getData()->getIdLieu()->getIdLieu();
        // 'choice_value' => 'idLieu'
        $builder->add('isActif')
            ->add('idPersonne', EntityType::class, array(
                'class' => 'FFNNatationBundle:Personne',
                'choice_label' => 'nom'
            ))
            ->add('idEquipe', EntityType::class, array(
                'class' => 'FFNNatationBundle:Equipe',
                'choice_label' => 'nom'
            ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FFN\NatationBundle\Entity\Composer'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ffn_natationbundle_composer';
    }


}
