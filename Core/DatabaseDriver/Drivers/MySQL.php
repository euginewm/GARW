<?php

/**
 * Created by PhpStorm.
 * User: Eugen
 * Date: 20-Jan-15
 * Time: 12:32 AM
 */
class MySQL
{

    private $query = '';
    private $queryResult = NULL;

    protected function db_query($query)
    {
        $this->query = $query;
        return $this;
    }

    protected function execute()
    {
        $mysqlConnectLink = mysql_pconnect('localhost', 'root', 'pass');
        mysql_select_db('garw_development', $mysqlConnectLink);
        $this->queryResult = mysql_query($this->query, $mysqlConnectLink);
        return $this;
    }

    protected function fetch_all_assoc()
    {
        $result = array();
        while ($res = mysql_fetch_assoc($this->queryResult)) {
            $result[] = $res;
        }

        return $result;
    }
}