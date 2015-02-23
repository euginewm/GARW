<?php

interface ISession
{
    public function setVariable($VariableName, $value);

    public function getVariable($VariableName);

    public function clearVariable($VariableName);
}