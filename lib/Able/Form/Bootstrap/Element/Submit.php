<?php

class Able_Form_Bootstrap_Element_Submit extends Zend_Form_Element_Submit
{

    public $helper = 'formButton';

    public function init()
    {

        $this->setAttrib('type', 'submit');

    }

    public function loadDefaultDecorators()
    {

        if ($this->loadDefaultDecoratorsIsDisabled()) {
            return $this;
        }

        $decorators = $this->getDecorators();

        if (empty($decorators)) {
            $this->addDecorator('Tooltip')
                 ->addDecorator('ViewHelper');
        }

        return $this;

    }

}
