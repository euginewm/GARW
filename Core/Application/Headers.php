<?php

class Headers implements IHeaders
{
    /**
     * @var ILogger
     */
    private $Logger;

    public function __construct(ILogger $Logger)
    {
        $this->Logger = $Logger;
    }

    public function gotoUrl($url)
    {
        switch ($url) {
            case '<front>':
            default:
                $url = '/';
                break;
        }
        header('Location: ' . $url);
    }
} 