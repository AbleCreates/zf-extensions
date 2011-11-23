<?php

class Able_Form_Bootstrap_Element_Reset extends Zend_Form_Element_Reset
{

    public $helper = 'formButton';

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
