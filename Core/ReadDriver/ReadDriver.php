<?php

/**
 * Created by PhpStorm.
 * User: Eugen
 * Date: 20-Jan-15
 * Time: 12:11 AM
 */
class ReadDriver extends DatabaseDriver implements IReadDriver
{

    public function __construct()
    {
        parent::__construct();
    }

    public function ReadTable($tableName)
    {
        return parent::ReadTable($tableName);
    }
} 