<?php

class Able_Form_Bootstrap_Element_MultipleChoice extends Zend_Form_Element_Multi
{

    /**
     * Default form view helper to use for rendering
     * @var string
     */
    public $helper = 'formMultipleChoice';

    public function loadDefaultDecorators()
    {

        if ($this->loadDefaultDecoratorsIsDisabled()) {
            return;
        }

        $decorators = $this->getDecorators();

        if (empty($decorators)) {

            $this->addDecorator('ViewHelper')
                ->addDecorator(
                	array('Input' => 'HtmlTag'),
                	array('tag' => 'div', 'class' => 'input')
                )
                ->addDecorator('Label')
                ->addDecorator(
                    array('Clearfix' => 'HtmlTag'),
                    array('tag' => 'div', 'class' => 'clearfix')
                );

        }

    }

    public function setQuestion($questionText)
    {

        $this->setLabel($questionText);

    }

    public function addAnswer()
    {

    }

}