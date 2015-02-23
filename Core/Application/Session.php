<?php

class Session implements ISession
{
    public function __construct()
    {
        session_start();
    }

    public function setVariable($VariableName, $value)
    {
        $_SESSION[$VariableName] = $value;
    }

    public function getVariable($VariableName)
    {
        return $_SESSION[$VariableName];
    }

    public function clearVariable($VariableName)
    {
        unset($_SESSION[$VariableName]);
    }
}