<?php

namespace VirtualniNemocnice\AppBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CreateQuestionForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        switch ($options['flow_step']) {
            case 1:
                $builder
                    ->add('email', 'email', ['label' => 'Email',])
                    ->add('phone', 'text',
                        ['label' => 'Telefon (nepovinné)', 'required' => false])
                    ->add('sex', 'choice',
                        ['label' => 'Pohlaví', 'expanded' => true, 'choices' => ['female' => 'Žena', 'male' => 'Muž']])
                    ->add('age', 'number',
                        ['label' => 'Věk', 'required' => false]);
                break;
            case 2:
                $builder
                    ->add('query', 'textarea', array(
                        'label' => 'Váš dotaz',
                    ));
                break;
            case 4:
                $builder
                    ->add('answerType', 'choice',
                        array(
                            'label' => 'Jak rychle potřebujete znát odpověd?',
                            'choices' => ['fast' => 'Rychlá', 'slow' => 'Pomalá'],
                            'expanded' => true
                        ))
                    ->add('paymentType', 'choice',
                        array(
                            'label' => 'Zvolte metodu platby',
                            'choices' =>
                                [
                                    'creditCard' => 'Kreditní kartou',
                                    'bank' => 'Bankovním převodem',
                                    'sms' => 'Platba pomocí SMS (M Platba)'
                                ],
                            'expanded' => true,
                        ));
                break;
        }
    }

    public function getDefaultOptions(array $options)
    {

        return array(
            'data_class' => 'VirtualniNemocnice\AppBundle\Entity\Patient',
            'cascade_validation' => true
        );
    }

    public function getName()
    {
        return 'createQuestion';
    }

}