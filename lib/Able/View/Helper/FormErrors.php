<?php

class Able_View_Helper_FormErrors extends Zend_View_Helper_FormErrors
{

    /**#@+
     * @var string Element block start/end tags and separator
     */
    protected $_htmlElementEnd       = '</span>';
    protected $_htmlElementStart     = '<span%s>';
    protected $_htmlElementSeparator = "\n";
    /**#@-*/

    /**
     * Render form errors
     *
     * @param  string|array $errors Error(s) to render
     * @param  array $options
     * @return string
     */
    public function formErrors($errors, array $options = null)
    {

        if (!is_array($options)) {
            $options = array();
        }
//print_r($errors);
        $error = array_shift($errors);
        $options['class'] = 'help-inline';
        return parent::formErrors(array($error), $options);

    }

}
