<?php

class Able_View_Helper_FormText extends Zend_View_Helper_FormText
{

    protected function _htmlAttribs($attribs)
    {

        if (array_key_exists('placeholder', $attribs)) {

            $attribs['placeholder'] = $this->view->translate($attribs['placeholder']);

        }

        return parent::_htmlAttribs($attribs);

    }


}
