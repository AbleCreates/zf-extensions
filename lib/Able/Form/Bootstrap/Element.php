<?php

class Able_Form_Bootstrap_Element extends Zend_Form_Element
{

    public function loadDefaultDecorators()
    {

        if ($this->loadDefaultDecoratorsIsDisabled()) {
            return $this;
        }

        $decorators = $this->getDecorators();

        if (empty($decorators)) {

            $this->addDecorator('ViewHelper')
                 ->addDecorator('Errors')
                 ->addDecorator('Description', array('tag' => 'p', 'class' => 'description'))
                 ->addDecorator('HtmlTag', array(
                     'tag' => 'dd',
                     'id'  => array('callback' => array(get_class($this), 'resolveElementId'))
                 ))
                 ->addDecorator('Label', array('tag' => 'dt'));

        }

        return $this;

    }

}