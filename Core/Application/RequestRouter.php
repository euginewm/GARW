<?php

/**
 * Created by PhpStorm.
 * User: Eugen
 * Date: 27-Jan-15
 * Time: 04:57 PM
 */
class RequestRouter implements IRequestRouter
{

    /**
     * Implements IApplication::ReadRequest()
     */
    public function getRouteRequests()
    {

        $RouteData = array();

        // идея, выносить список меню-роутов в xml
        // собирать xml динамически и с кешированием
        // посмотреть yml

        $RouteData['/'] = array(
            'callback' => array(
                'class' => 'ReadRender',
                'method' => 'PrepareRender',
            ),
            'callback arguments' => array(
                '#theme' => 'h1',
                '#elements' => array('#text' => 'Hello GARW'),
            ),
        );

        $RouteData['/example'] = array(
            'callback' => array(
                'class' => 'ReadRender',
                'method' => 'PrepareRender',
            ),
            'callback arguments' => array(
                '#theme' => 'h1',
                '#elements' => array('#text' => 'Hello Example'),
            ),
        );

        // todo: example
        $RouteData['/'] = $RouteData['/example'];

        $RouteData['/table'] = array(
            'callback' => array(
                'class' => 'ReadRender',
                'method' => 'PrepareRender',
            ),
            'callback arguments' => array(
                '#theme' => 'table',
                '#elements' => array(
                    '#source' => 'callback',
                    '#source callback' => array(
                        'class' => 'ReadDriver',
                        'method' => 'ReadTable',
                        'params' => array('example_table'),
                    ),
                    '#caption' => 'Variables Table',
                    '#header' => array(array('ID', 'Name', 'Value'))
                ),
            ),
        );

        $RouteData['/user'] = array(
            'callback' => array(
                'class' => 'ReadRender',
                'method' => 'PrepareRender',
            ),
            'callback arguments' => array(
                '#theme' => 'form',
                '#elements' => array(
                    '#source' => 'callback',
                    '#source callback' => array(
                        'class' => 'User',
                        'method' => 'getFormLogin'
                    ),
                ),
            ),
        );

        $RouteData['/user/login'] = array(
            'callback' => array(
                'class' => 'User',
                'method' => 'initFormLoginProcess',
            ),
        );

        $RouteData['/user/logout'] = array(
            'callback' => array(
                'class' => 'ReadRender',
                'method' => 'PrepareRender',
            ),
            'callback arguments' => array(
                '#theme' => 'form',
                '#elements' => array(
                    '#source' => 'callback',
                    '#source callback' => array(
                        'class' => 'User',
                        'method' => 'getFormLogout'
                    ),
                ),
            ),
        );

        $RouteData['/user/logout/process'] = array(
            'callback' => array(
                'class' => 'User',
                'method' => 'initFormLogoutProcess',
            ),
        );

        $RouteData[404] = array(
            'callback' => array(
                'class' => 'ReadRender',
                'method' => 'PrepareRender',
            ),
            'callback arguments' => array(
                '#theme' => 'h1',
                '#elements' => array('#text' => '404')
            ),
        );

        return $RouteData;
    }
}