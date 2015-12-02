<?php

namespace AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TestType extends AbstractType
{
    /**
     * {@inheritdoc}
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text', 'text')
            ->add('choice', 'choice', ['choices' => ['foo' => 'FOO', 'bar' => 'BAR'], 'expanded' => true])
        ;
    }

    /**
     * {@inheritdoc}
     * @return string
     */
    public function getName()
    {
        return 'test';
    }
}
