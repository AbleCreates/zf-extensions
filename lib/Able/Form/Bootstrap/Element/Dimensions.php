<?php

class Able_Form_Bootstrap_Element_Dimensions extends Zend_Form_Element_Xhtml
{
    /**
     * Default form view helper to use for rendering
     * @var string
     */
    public $helper = 'formDimensions';

    public function init()
    {

        $this->setIsArray(true);

    }

    public function loadDefaultDecorators()
    {

        if ($this->loadDefaultDecoratorsIsDisabled()) {
            return;
        }

        $decorators = $this->getDecorators();

        if (empty($decorators)) {

            $this->addDecorator('ViewHelper')
                ->addDecorator(
                	'Description',
                    array('tag' => 'span', 'class' => 'help-block')
                )
                ->addDecorator(
                    array('InlineInputs' => 'HtmlTag'),
                    array('tag' => 'div', 'class' => 'inline-inputs')
                )
                ->addDecorator(
                    array('InputWrapper' => 'HtmlTag'),
                    array('tag' => 'div', 'class' => 'input')
                )
                ->addDecorator('Label')
                ->addDecorator('Errors')
                ->addDecorator(
                    array('Clearfix' => 'HtmlTag'),
                    array('tag' => 'div', 'class' => 'clearfix')
                );

        }

    }

}