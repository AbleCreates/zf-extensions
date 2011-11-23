<?php


class Able_Form_Decorator_Thumbnail extends Zend_Form_Decorator_Abstract
{

    public function render($content)
    {

    	$html = '<img src="' . $this->getOption('src') . '"'
    	    . 'alt="' . $this->getOption('alt') . '"'
    	    . 'title="' . $this->getOption('title') . '"'
    	    . '/>';

    	return $html . $content;

    }

}
