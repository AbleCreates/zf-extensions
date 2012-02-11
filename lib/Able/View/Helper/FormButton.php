<?php

class Able_View_Helper_FormButton extends Zend_View_Helper_FormButton
{

    public function formButton($name, $value = null, $attribs = null)
    {

        if (is_array($attribs) && array_key_exists('content', $attribs)) {

            $attribs['content'] = $this->view->translate($attribs['content']);

        }

        return parent::formButton($name, $value, $attribs);

    }

}
