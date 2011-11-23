<?php

class Able_Form_Bootstrap_Form extends Zend_Form
{

    public function __construct($options = null)
    {

        $this->addPrefixPath('Able_Form_Bootstrap_Element', 'Able/Form/Bootstrap/Element/', 'element');

        $this->addElementPrefixPath('Able_Form_Bootstrap_Decorator', 'Able/Form/Bootstrap/Decorator/', 'decorator');
        $this->addElementPrefixPath('Able_Form_Decorator', 'Able/Form/Decorator/', 'decorator');

        $this->addElementPrefixPath('Able_Validate', 'Able/Validate/', 'validate');

        $this->getView()->addHelperPath('Able/View/Helper', 'Able_View_Helper');

        $this->setDefaultDisplayGroupClass('Able_Form_DisplayGroup');

        parent::__construct($options);

    }

    public function loadDefaultDecorators()
    {

        if ($this->loadDefaultDecoratorsIsDisabled()) {
            return;
        }

        $decorators = $this->getDecorators();

        if (empty($decorators)) {

            $this->addDecorator('FormElements')
                 ->addDecorator('Form');

        }

    }

}