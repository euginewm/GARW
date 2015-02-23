<?php

interface IGUIRender
{
    public function ProcessRender($RenderArray);

    public function setDebugFlag($DebugFlag = TRUE);

    public function getDebugFlag();
}
