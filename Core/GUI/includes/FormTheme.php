<?php

class FormTheme extends HTMLTagTheme implements IFormTheme
{
    public function __construct()
    {
    }

    public function form($RenderArray)
    {
        $output = '';
        $output .= '<form action="' . $RenderArray['#elements']['#source']['#action'] . '" method="POST">';
        foreach ((array)$RenderArray['#elements']['#source'] as $element) {
            if (is_array($element) && !empty($element['#theme'])) {
                $output .= $this->$element['#theme']($element);
            }
        }
        $output .= '</form>';
        return $output;
    }
} 