<?php

namespace Core\HTML;

class TinyMCEForm extends Form
{
    public function tinyInput($id, $name, $label = null)
    {
        $label = '<label>' . $label . '</label>';
        $input = '<textarea name="' . $name . '" id="' . $id . '">' . $this->getValue($name) .'</textarea>';

        return $this->surround($label . $input);
    }
}