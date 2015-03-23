<?php

namespace VirtualniNemocnice\AppBundle\Form;

use Craue\FormFlowBundle\Form\FormFlow;
use Craue\FormFlowBundle\Form\FormFlowInterface;
use Symfony\Component\Form\FormTypeInterface;

class CreateQuestionFlow extends FormFlow
{

    /**
     * @var FormTypeInterface
     */
    protected $formType;

    public function setFormType(FormTypeInterface $formType)
    {
        $this->formType = $formType;
    }

    public function getName()
    {
        return 'createQuestion';
    }

    protected function loadStepsConfig()
    {
        return array(
            array(
                'label' => 'základní údaje',
                'type' => $this->formType,
            ),
            array(
                'label' => 'dotaz',
                'type' => $this->formType,
            ),
            array(
                'label' => 'platba',
                'type' => $this->formType,
            ),
        );
    }
}