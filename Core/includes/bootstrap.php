<?php

define ('PHP_FILE_EXTENSION', '.php');

spl_autoload_register(function ($name) {
    foreach (array(
                 'Core/Application',
                 'Core/DatabaseDriver',
                 'Core/DatabaseDriver/Drivers',
                 'Core/GUI',
                 'Core/GUI/includes',
                 'Core/ReadDriver',
                 'Core/WriteDriver',
                 'Core/Interfaces',
                 'Core/includes',
             ) as $include_path) {
        if (file_exists($include_path . '/' . $name . PHP_FILE_EXTENSION)) {
            include $include_path . '/' . $name . PHP_FILE_EXTENSION;
        }
    }
});

// todo: ----------------------------------------------------------------------
// todo: ----------------------------------------------------------------------

// todo: сделать пропускаемым через тему (отдельным приложением)
function dsm($variable, $label = '', $print = TRUE)
{
    $output = '<pre>' . $label . ': ' . print_r($variable, TRUE) . '</pre>';
    if ($print) {
        print $output;
    } else {
        return $output;
    }
}