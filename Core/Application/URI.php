<?php

class URI implements IURI
{
    /**
     * @var string
     */
    private $Request = '/';

    /**
     * @var array
     */
    private $RequestArguments = array();

    /**
     * @var array
     */
    private $Query = array();

    public function __construct()
    {
        $this->PrepareRequestURI();
    }

    public function PrepareRequestURI()
    {
        // prepare request array
        $RequestURI = substr($_SERVER['REQUEST_URI'], 0, 255);
        $RequestURI = explode('?', $RequestURI);
        $this->Request = $RequestURI[0];
        // prepare request arguments in array
        $this->RequestArguments = array_slice(explode('/', $this->Request), 1);

        // prepare get query array
        if (!empty($RequestURI[1])) {
            $GetQuery = explode('&', $RequestURI[1]);
            foreach ($GetQuery as $GetQueryItem) {
                $GetQueryItemExploded = explode('=', $GetQueryItem, 2);
                $this->Query[$GetQueryItemExploded[0]] = urldecode($GetQueryItemExploded[1]);
            }
        }
    }

    public function getRequest()
    {
        return $this->Request;
    }

    public function getArguments($argIndex = NULL)
    {
        if ($argIndex != NULL && !empty($this->RequestArguments[$argIndex])) {
            return $this->RequestArguments[$argIndex];
        } else {
            return $this->RequestArguments;
        }
    }

    public function getQuery($nameIndex = NULL)
    {
        if ($nameIndex != NULL && !empty($this->Query[$nameIndex])) {
            return $this->Query[$nameIndex];
        } else {
            return $this->Query;
        }
    }
} 