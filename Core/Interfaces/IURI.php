<?php

interface IURI
{

    public function PrepareRequestURI();

    public function getRequest();

    public function getArguments($argIndex = NULL);

    public function getQuery($nameIndex = NULL);
}