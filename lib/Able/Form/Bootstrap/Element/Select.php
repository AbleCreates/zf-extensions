<?php

class Able_Form_Bootstrap_Element_Select extends Zend_Form_Element_Select
{

    public function loadDefaultDecorators()
    {

        if ($this->loadDefaultDecoratorsIsDisabled()) {
            return;
        }

        $decorators = $this->getDecorators();

        if (empty($decorators)) {

            $this->addDecorator('ViewHelper')
                ->addDecorator('Errors')
                ->addDecorator(
                    array('InputWrapper' => 'HtmlTag'),
                    array('tag' => 'div', 'class' => 'input')
                )
                ->addDecorator(
                	'Description',
                    array('tag' => 'span', 'class' => 'help-block')
                )
                ->addDecorator('Label')
                ->addDecorator(
                    array('Clearfix' => 'HtmlTag'),
                    array('tag' => 'div', 'class' => 'clearfix')
                );

        }

    }

}
