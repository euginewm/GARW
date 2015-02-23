<?php

/**
 * Class GUI
 * Graphic User Interface implements IGUI
 * This class will use only for print HTML into client
 */
class GUI implements IGUI
{

    /**
     * @var IApplication
     */
    private $Application;

    /**
     * @var IGUIRender
     */
    private $GUIRender;

    public function __construct(IApplication $Application, IGUIRender $GUIRender)
    {
        $this->Application = $Application;
        $this->Application->RouteRequest();

        $this->GUIRender = $GUIRender;
    }

    public function WriteResponce()
    {
        print $this->GUIRender->ProcessRender($this->Application->getResponce());
    }
}
