<?php

class Able_Form_Bootstrap_Element_Text extends Zend_Form_Element_Text
{

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
