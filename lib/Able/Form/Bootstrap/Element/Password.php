<?php

class Able_Form_Bootstrap_Element_Password extends Zend_Form_Element_Password
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

    public function isValid($value, $context = null)
    {

        $result = parent::isValid($value, $context);

        if (!$result) {
            $this->markAsError();
        }

        return $result;

    }

    public function render(Zend_View_Interface $view = null)
    {

        if ($this->_isError || $this->_isErrorForced) {

            $class = $this->getAttrib('class')
                ? $this->getAttrib('class') . ' error' : 'error';
            $this->setAttrib('class', $class);

            $clearFix = $this->getDecorator('ClearFix');
            $class = $clearFix->getOption('class')
                ? $clearFix->getOption('class') . ' error' : 'error';
            $clearFix->setOption('class', $class);

        }

        return parent::render($view);

    }

}
