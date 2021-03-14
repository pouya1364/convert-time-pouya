<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Form\DataTransformer\DateTimeTransformer;

class BookingFormType extends AbstractType
{
    private $class;

    /**
     * @param string $class The Booking class name
     */
    public function __construct($class)
    {
        $this->class = $class;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date', 'text', array(
                'required' => true,
                'label' => 'form.label.datetime',
                'translation_domain' => 'App',
                'attr' => array(
                    'class' => 'form-control input-inline datetimepicker',
                    'data-provide' => 'datepicker',
                    'data-format' => 'yyyy-mm-dd HH:ii:ss',
                ),
            ))
            ->add('submit', 'submit')
        ;

        $builder->get('date')
            ->addModelTransformer(new DateTimeTransformer());
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => $this->class,
                'intention'  => 'edit',
            )
        );
    }

    public function getName()
    {
        return 'mars_converter';
    }
}