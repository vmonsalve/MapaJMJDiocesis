<?php

namespace Tiempo\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;


class UsuariosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('password', RepeatedType::class, array(
                      'type' => PasswordType::class,
                      'invalid_message' => 'Las contrasenas no son iguales',
                      'options' => array('attr' => array('class' => 'form-control')),
                      'required' => true,
                      'first_options'  => array('label' => 'Password'),
                      'second_options' => array('label' => 'Vuelve a ingreasr Password'),
                ));
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tiempo\AdminBundle\Entity\Usuarios'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tiempo_adminbundle_usuarios';
    }


}
