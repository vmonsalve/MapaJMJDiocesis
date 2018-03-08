<?php

namespace Tiempo\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class pinesMapaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titulo', TextType::class, array(
                    'label' => 'Título',
                    'attr'  => array('class' => 'form-control')
                ))
                ->add('descripcion', TextareaType::class, array(
                    'label' => 'Descripción',
                    'attr'  => array('class' => 'form-control')
                ))
                ->add('latitud', TextType::class, array(
                    'label' => 'Latitud',
                    'attr'  => array('class' => 'form-control')
                ))
                ->add('longitud', TextType::class, array(
                    'label' => 'Longitud',
                    'attr'  => array('class' => 'form-control')
                ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tiempo\AdminBundle\Entity\pinesMapa'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tiempo_adminbundle_pinesmapa';
    }


}
