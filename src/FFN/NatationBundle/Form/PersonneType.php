<?php

namespace FFN\NatationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PersonneType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nom')
            ->add('prenom')
            ->add('adresse')
            ->add('dateNaissance', BirthdayType::class, array(
                'years' => range(date("Y") - 60, date("Y"))
            ))
            ->add('codePostal');
            /*->add('idEquipe',EntityType::class, array(
                'class' => 'FFNNatationBundle:Equipe',
                'choice_label' => 'nom'));*/
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'FFN\NatationBundle\Entity\Personne'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ffn_natationbundle_personne';
    }


}
