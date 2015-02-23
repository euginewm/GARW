<?php

class GUIRender implements IGUIRender
{

    /**
     * @var bool
     */
    private $DebugFlag = FALSE;

    /**
     * @var IHTMLTagTheme
     */
    private $HTMLTagTheme;

    /**
     * @var ITableTheme
     */
    private $TableTheme;

    /**
     * @var IFormTheme
     */
    private $FormTheme;

    public function __construct(IHTMLTagTheme $HTMLTagTheme, ITableTheme $TableTheme, IFormTheme $FormTheme)
    {
        $this->HTMLTagTheme = $HTMLTagTheme;
        $this->TableTheme = $TableTheme;
        $this->FormTheme = $FormTheme;
    }

    public function ProcessRender($RenderArray)
    {
        $this->ProcessPreRender($RenderArray);
        if ($this->getDebugFlag()) {
            dsm($RenderArray, 'process render');
        }

        switch ($RenderArray['#theme']) {
            case 'table':
            case 'table_select':
                return $this->TableTheme->$RenderArray['#theme']($RenderArray);
                break;
            case 'form':
                return $this->FormTheme->$RenderArray['#theme']($RenderArray);
                break;
            default:
                return $this->HTMLTagTheme->RenderTag($RenderArray['#theme'], $RenderArray['#elements']['#text']);
                break;
        }
    }

    private function ProcessPreRender(&$RenderArray)
    {
        if ($RenderArray['#elements']['#source'] == 'callback') {
            $class = IocContainer::init($RenderArray['#elements']['#source callback']['class']);
            $RenderArray['#elements']['#source'] = $class->$RenderArray['#elements']['#source callback']['method']();
        }
    }

    public function setDebugFlag($DebugFlag = TRUE)
    {
        $this->DebugFlag = $DebugFlag;
    }

    public function getDebugFlag()
    {
        return $this->DebugFlag;
    }
}