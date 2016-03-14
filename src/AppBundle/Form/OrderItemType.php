<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrderItemType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('product',  \Symfony\Bridge\Doctrine\Form\Type\EntityType::class, array(
                    'class' => 'AppBundle:Product',
                    'label'=>false
                ))
                ->add('quantity',  \Symfony\Component\Form\Extension\Core\Type\TextType::class, array(
                    'label'=>false
                ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\OrderItem'
        ));
    }

}
