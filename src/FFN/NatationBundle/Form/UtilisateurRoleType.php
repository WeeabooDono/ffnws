<?php

namespace FFN\NatationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class UtilisateurRoleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('idPersonne', EntityType::class, array(
                'class' => 'FFNNatationBundle:Personne',
                'choice_label' => 'nom'
            ))
            ->add('idRole', EntityType::class, array(
                'class' => 'FFNNatationBundle:Role',
                'choice_label' => 'nom'
            ))
            ->add('idCompetition', EntityType::class, array(
                'class' => 'FFNNatationBundle:Competition',
                'choice_label' => 'nom'
            ))
            ->add('rang');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FFN\NatationBundle\Entity\UtilisateurRole'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ffn_natationbundle_utilisateurrole';
    }


}
