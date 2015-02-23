<?php

/**
 * Class Application implements IApplication interface
 */
class Application implements IApplication
{

    /**
     * @var IRequestRouter
     */
    private $RequestRouter;

    /**
     * @var IURI
     */
    private $URI;

    /**
     * @var IReadRender
     */
    private $ReadRender;

    /**
     * @var IReadDriver
     */
    private $ReadDriver;

    /**
     * @var IUSer
     */
    private $User;

    /**
     * @var string
     */
    private $Responce = '';

    public function __construct(IRequestRouter $RequestRouter, IReadRender $ReadRender, IURI $URI, IReadDriver $ReadDriver, IUser $User)
    {
        $this->RequestRouter = $RequestRouter;
        $this->ReadRender = $ReadRender;
        $this->URI = $URI;
        $this->ReadDriver = $ReadDriver;
        $this->User = $User;
    }

    public function RouteRequest()
    {
        // Use Route Class here
        $RouteData = $this->RequestRouter->getRouteRequests();

        if (!empty($RouteData[$this->URI->getRequest()])) {
            $this->CallRouteDataCallback($RouteData);
        } else {
            $this->CallRouteDataCallback($RouteData, 404);
        }
    }

    private function CallRouteDataCallback($RouteData, $index = NULL)
    {
        $index = ($index == NULL) ? $this->URI->getRequest() : 404;
        $RouteDataInfo = $RouteData[$index];

        $this->Responce = call_user_func(array(
            IocContainer::init($RouteDataInfo['callback']['class']),
            $RouteDataInfo['callback']['method']
        ), $RouteDataInfo['callback arguments']);
    }

    public function getResponce()
    {
        return $this->Responce;
    }
}
