<?php

class Logger implements ILogger
{

    public function Log($string, $type = 'status')
    {
        dsm($string, $type);
    }
}