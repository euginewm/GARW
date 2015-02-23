<?php

class HTMLTagTheme implements IHTMLTagTheme
{
    public function __construct()
    {
    }

    public function h1($RenderArray)
    {
        $output = '<h1>';
        $output .= $RenderArray['#text'];
        $output .= '</h1>';
        return $output;
    }

    public function input($RenderArray)
    {
        $output = '';
        if (!empty($RenderArray['#label'])) {
            $output .= '<div>';
            $output .= $this->label($RenderArray);
        }
        $output .= '<input type="'
            . $RenderArray['#type']
            . '" name="'
            . $RenderArray['#name']
            . '" value="'
            . $RenderArray['#value']
            . '" />';
        if (!empty($RenderArray['#label'])) {
            $output .= '</div>';
        }
        return $output;
    }

    public function label($RenderArray)
    {
        $output = '';
        $output .= '<label for="' . $RenderArray['#name'] . '">';
        $output .= $RenderArray['#label'];
        $output .= ': ';
        $output .= '</label>';
        return $output;
    }

    public function RenderTag($name, $content = '', $attributes = '', $type = '||')
    {
        switch ($type) {
            case '||':
            default:
                return "<$name $attributes>$content</$name>";
                break;

            case '|':
                return "<$name />";
                break;
        }
    }
}
