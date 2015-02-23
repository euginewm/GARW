<?php

interface IRequest
{
    public function isEmptyPost();

    public function getPostVariable($VariableName);
}