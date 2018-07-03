<?php

namespace FFN\NatationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class GestionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('personne', EntityType::class, array(
                'class' => 'FFNNatationBundle:Personne'
            ))
            ->add('role', EntityType::class, array(
                'class' => 'FFNNatationBundle:Role',
                'choice_label' => 'nom'
            ))
            ->add('competition', EntityType::class, array(
                'class' => 'FFNNatationBundle:Competition',
                'choice_label' => 'nom'
            ))
            //->add('rang')
            ->add('rang', ChoiceType::class, array(
                    'choices' => [
                        'Juge arbitre' => 0,
                        'Rang 1' => 1,
                        'Rang 2' => 2,
                        'Rang 3' => 3,
                        'Rang 4' => 4,
                        'Rang 5' => 5],
                    'expanded' => true,
                    'multiple' => false,
                )
            );

        $builder->add('utilisateurrole', CollectionType::class, array(
            'entry_type' => UtilisateurRoleType::class,
            'entry_options' => array('label' => false),
        ));

    }

    /**
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
