<?php


class TableTheme extends HTMLTagTheme implements ITableTheme
{

    public function __construct()
    {
    }

    public function table($RenderArray)
    {
        $output = '';
        $output .= '<table border="1">';
        $output .= '<caption>' . $RenderArray['#elements']['#caption'] . '</caption>';
        $output .= '<thead>';

        $this->RenderTableRows($RenderArray['#elements']['#header'], $output);
        $output .= '</thead>';
        $output .= '<tfoot>';
        $this->RenderTableRows($RenderArray['#elements']['#footer'], $output);
        $output .= '</tfoot>';
        $output .= '<tbody>';
        $this->RenderTableRows($RenderArray['#elements']['#source'], $output);
        $output .= '</tbody>';
        $output .= '</table>';


        return $output;
    }

    private function RenderTableRows($Rows, &$output)
    {
        foreach ((array)$Rows as $row) {
            $output .= '<tr>';
            foreach ($row as $value) {
                $output .= '<td>';
                $output .= $value;
                $output .= '</td>';
            }
            $output .= '</tr>';
        }
    }
} 