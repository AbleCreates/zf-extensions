<?php

class Able_Form_Bootstrap_Element_Checkbox extends Zend_Form_Element_Checkbox
{

    public function loadDefaultDecorators()
    {

        if ($this->loadDefaultDecoratorsIsDisabled()) {
            return $this;
        }

        $decorators = $this->getDecorators();

        if (empty($decorators)) {
            $this->addDecorator('ViewHelper')
                 ->addDecorator('Label', array('tag' => 'span'))
                 ->addDecorator('HtmlTag', array('tag' => 'label'));
        }

        return $this;

    }

}
