<?php

class DatabaseDriver extends MySQL
{

    private $DriverName = '';

    public function __construct()
    {
        $this->DriverName = 'MySQL';
    }

    protected function ReadTable($tableName)
    {
        switch ($this->DriverName) {
            case 'MySQL':
                return parent::db_query("SELECT * FROM $tableName")
                    ->execute()
                    ->fetch_all_assoc();
                break;

            default:
                return 'The Table is now found: ' . $tableName;
                break;
        }

    }
} 