<?php

class Able_View_Helper_FormDateRange extends Zend_View_Helper_FormElement
{

    public function formDateRange($name, $value = null, $attribs = null)
    {

        if (!array_key_exists('class', $attribs)) {
            $attribs['class'] = '';
        }

        $attribs['class'] .= ' date-input';

        if (!is_array($value)) {
            $value = array();
        }

        if (!array_key_exists('start', $value)) {
            $value['start'] = '';
        }

        if (!array_key_exists('end', $value)) {
            $value['end'] = '';
        }

        $start = $this->_createInput('start', $name, $value['start'], $attribs);
        $end = $this->_createInput('end', $name, $value['end'], $attribs);

        return $start . ' to ' . $end;

    }

    protected function _createInput($type, $name, $value = null, $attribs = null)
    {

        if (array_key_exists('id', $attribs)) {
            $attribs['id'] = $type . '-' . $attribs['id'];
        }

        return $this->view->formText($name, $value, $attribs);

    }

}
