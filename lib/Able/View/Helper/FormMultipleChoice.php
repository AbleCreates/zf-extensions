<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_View
 * @subpackage Helper
 * @copyright  Copyright (c) 2005-2011 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 * @version    $Id: FormMultiCheckbox.php 23775 2011-03-01 17:25:24Z ralph $
 */


/** Zend_View_Helper_FormRadio */
require_once 'Zend/View/Helper/FormRadio.php';


/**
 * Helper to generate a set of checkbox button elements
 *
 * @category   Zend
 * @package    Zend_View
 * @subpackage Helper
 * @copyright  Copyright (c) 2005-2011 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Zend_View_Helper_FormMultipleChoice extends Zend_View_Helper_FormRadio
{

    /**
     * Generates a set of checkbox button elements.
     *
     * @access public
     *
     * @param string|array $name If a string, the element name.  If an
     * array, all other parameters are ignored, and the array elements
     * are extracted in place of added parameters.
     *
     * @param mixed $value The checkbox value to mark as 'checked'.
     *
     * @param array $options An array of key-value pairs where the array
     * key is the checkbox value, and the array value is the radio text.
     *
     * @param array|string $attribs Attributes added to each radio.
     *
     * @return string The radio buttons XHTML.
     */
    public function formMultipleChoice($name, $value = null, $attribs = null,
        $options = null, $listsep = "\n")
    {

        return '<ul class="inputs-list">'
            . $this->formRadio($name, $value, $attribs, $options, "\n")
            . '</ul>';

    }

    public function formRadio($name, $value = null, $attribs = null,
        $options = null, $listsep = "\n")
    {

        return '<li>'
            . parent::formRadio($name, $value, $attribs, $options, "</li>\n<li>")
            . '</li>';

    }

    protected function _getInfo($name, $value = null, $attribs = null,
        $options = null, $listsep = null
    ) {

        $info = parent::_getInfo($name, $value, $attribs, $options, $listsep);
        $info['listsep'] = "</li>\n<li>";
        $info['escape'] = false;
        return $info;

    }

}
