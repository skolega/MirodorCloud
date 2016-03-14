<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use AppBundle\Entity\Driver;

class OrdersType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add('manufacture', EntityType::class, array(
                    'class' => 'AppBundle:ProductManufacture',
                    'choice_label' => 'name',
                    'placeholder' => 'Wybierz',
                    'label' => false
                ))
                ->add('client', EntityType::class, array(
                    'class' => 'AppBundle:Contractors',
                    'choice_label' => 'name',
                    'placeholder' => 'Wybierz',
                    'label' => false
                ))
                ->add('realisationDate', \Symfony\Component\Form\Extension\Core\Type\DateTimeType::class, array(
                    'label' => false,
                    'widget' => 'single_text',
                    'format' => 'dd-MM-yyyy',
                    'attr' => [
                        'class' => 'form-control input-inline datepicker',
                        'data-provide' => 'datepicker',
                        'data-date-format' => 'dd-mm-yyyy'
                    ]
                ))
                ->add('status', ChoiceType::class, array(
                    'choices' => array(
                        'Nowe' => 1,
                        'Przygotowane' => 2,
                        'W realizacji' => 3,
                        'Wysłane' => 4,
                        'Zrealizowane' => 5,
                    ),
                    'label' => false
                ))
                ->add('destination', TextType::class, array(
                    'label' => false
                ))
                ->add('transhipment_square', ChoiceType::class, array(
                    'choices' => array(
                        'Tak' => true,
                        'Nie' => false,
                    ),
                    'placeholder' => 'Wybierz',
                    'label' => false
                ))
                ->add('driver', EntityType::class, array(
                    'class' => 'AppBundle:Driver',
                    'choice_label' => 'name',
                    'placeholder' => 'Wybierz',
                    'label' => false
                ))
                ->add('isSended', ChoiceType::class, array(
                    'choices' => array(
                        'Nie' => false,
                        'Tak' => true,
                    ),
                    'label' => false
                ))

        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Orders'
        ));
    }

}
