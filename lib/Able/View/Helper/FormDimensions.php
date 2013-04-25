<?php

class Able_View_Helper_FormDimensions extends Zend_View_Helper_FormElement
{

    public function formDimensions($name, $value = null, $attribs = null)
    {

        if (!is_array($value)) {
            $value = array();
        }

        if (!array_key_exists('width', $value)) {
            $value['width'] = '';
        }

        if (!array_key_exists('height', $value)) {
            $value['height'] = '';
        }

        if (!array_key_exists('depth', $value)) {
            $value['depth'] = '';
        }

        $w = $this->_createInput('width', $name, $value['width'], $attribs);
        $h = $this->_createInput('height', $name, $value['height'], $attribs);
        $d = $this->_createInput('depth', $name, $value['depth'], $attribs);

        return $this->_displayDimensions($w, $h, $d);

    }

    protected function _createInput($type, $name, $value = null, $attribs = null)
    {

        if (array_key_exists('id', $attribs)) {
            $attribs['id'] = $type . '-' . $attribs['id'];
        }

        return $this->view->formText($name, $value, $attribs);

    }

    protected function _displayDimensions($width, $height, $depth)
    {

        return 'H ' . $height . '" &nbsp;' . "\n"
        	. 'W ' . $width . '" &nbsp;' . "\n"
        	. 'D ' . $depth . '" &nbsp;' . "\n";

    }

}
