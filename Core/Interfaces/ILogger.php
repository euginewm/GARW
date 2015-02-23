<?php

interface ILogger
{
    public function Log($string, $type = 'status');
}