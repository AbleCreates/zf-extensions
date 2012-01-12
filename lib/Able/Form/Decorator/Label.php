<?php

class Able_Form_Decorator_Label extends Zend_Form_Decorator_Label
{

    public function render($content)
    {

        $element = $this->getElement();
        $view    = $element->getView();
        if (null === $view) {
            return $content;
        }

        $label     = $this->getLabel();
        $separator = $this->getSeparator();
        $placement = $this->getPlacement();
        $tag       = $this->getTag();
        $tagClass  = $this->getTagClass();
        $id        = $this->getId();
        $class     = $this->getClass();
        $options   = $this->getOptions();

        if (empty($label) && empty($tag)) {
            return $content;
        }

        if (null !== $tag) {

            require_once 'Zend/Form/Decorator/HtmlTag.php';
            $decorator = new Zend_Form_Decorator_HtmlTag();
            if (null !== $this->_tagClass) {
                $decorator->setOptions(array('tag'   => $tag,
                                             'id'    => $id . '-label',
                                             'class' => $tagClass));
            } else {
                $decorator->setOptions(array('tag'   => $tag,
                                             'id'    => $id . '-label'));
            }

            $label = $decorator->render(trim($label));

        } elseif (!empty($label)) {
            $options['class'] = $class;
            $label = $view->formLabel($element->getFullyQualifiedName(), trim($label), $options);
        } else {
            $label = '&#160;';
        }

        switch ($placement) {
            case self::APPEND:
                return $content . $separator . $label;
            case self::PREPEND:
                return $label . $separator . $content;
        }
    }


}
