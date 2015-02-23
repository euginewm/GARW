<?php

class Request implements IRequest
{
    public function __construct()
    {
    }

    public function isEmptyPost()
    {
        return empty($_POST);
    }

    public function getPostVariable($VariableName)
    {
        return $_POST[$VariableName];
    }
} 