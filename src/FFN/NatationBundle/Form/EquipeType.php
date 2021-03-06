<?php

namespace FFN\NatationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EquipeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
            ->add('dateCreation', BirthdayType::class, array(
                'years' => range(date("Y") - 60, date("Y"))
            ))
            ->add('isActif')
            ->add('club', EntityType::class, array(
                'class' => 'FFNNatationBundle:Club',
                'choice_label' => 'nom'))
            ->add('personne', EntityType::class, array(
                'class' => 'FFNNatationBundle:Personne'));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FFN\NatationBundle\Entity\Equipe'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ffn_natationbundle_equipe';
    }


}
