<?php

namespace codeboxsql;

use codeboxsql\connection;

class mysql
{
    
    protected $dbObjectect;
    
    public function __construct($host, $user, $pass, $database)
    {
        $this->dbObjectect = new connection($host, $user, $pass, $database);
    }
    
    
    function insertInto($tableName, $data)
    {
        $columns = array_keys($data);
        $values  = array_values($data);
        
        $Istr = "INSERT INTO $tableName (" . implode(',', $columns) . ") VALUES ('" . implode("', '", $values) . "' )";
        if ($this->dbObjectect->query_execute($Istr)) {
            return 'done';
        } else {
            return 'failed';
        }
    }
    
    function lastId()
    {
        return $this->dbObjectect->query_lastID();
    }
    
    function singleSelect($tableName, $data, $method, $data2)
    {
        $sqlStmt  = '';
        $sqlStmt2 = '';
        $arr      = array();
        if ($data == '') {
            $sqlStmt = '';
        } else {
            $columns = array_keys($data);
            $values  = array_values($data);
            $clength = count($columns);
            for ($x = 0; $x < $clength; $x++) {
                $sqlStmt .= $columns[$x] . " = '" . $values[$x] . "' and ";
            }
            $sqlStmt = 'WHERE ' . substr($sqlStmt, 0, -5);
        }
        $sqlStmt2 = '';
        if ($data2 == '') {
        } else {
            $columns = array_keys($data2);
            $values  = array_values($data2);
            $clength = count($columns);
            for ($x = 0; $x < $clength; $x++) {
                $sqlStmt2 .= $columns[$x] . " " . $values[$x] . " ";
            }
            $sqlStmt2 = $sqlStmt2;
        }
        $Istr     = "SELECT * FROM $tableName $sqlStmt $sqlStmt2";
        $stmtData = $this->dbObjectect->query_execute($Istr);
        if ($method == 'fetch') {
            while ($row = $stmtData->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        } elseif ($method == 'count') {
            return $this->dbObjectect->query_rowCount($stmtData);
        }
    }
    function custom($data, $method)
    {
        $arr      = array();
        $stmtData = $this->dbObjectect->query_execute("$data");
        if ($method == 'fetch') {
            while ($row = $stmtData->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        } elseif ($method == 'count') {
            return $this->dbObjectect->query_rowCount($stmtData);
        } elseif ($method == 'update') {
            return 'ok';
        } elseif ($method == 'delete') {
            return 'ok';
        }
    }
    
    function multiSelect($tableNames, $data, $method, $data2)
    {
        $sqlStmt   = '';
        $sqlStmt2  = '';
        $arr       = array();
        $TBStmt    = '';
        //for tablesNames
        $TBcolumns = array_keys($tableNames);
        $TBvalues  = array_values($tableNames);
        $TBclength = count($TBcolumns);
        for ($k = 0; $k < $TBclength; $k++) {
            $TBStmt .= $TBcolumns[$k] . " " . $TBvalues[$k] . ", ";
        }
        
        $TBnames = substr($TBStmt, 0, -2);
        
        //for data
        if ($data == '') {
            $sqlStmt = '';
        } else {
            $columns = array_keys($data);
            $values  = array_values($data);
            $clength = count($columns);
            for ($x = 0; $x < $clength; $x++) {
                $sqlStmt .= $columns[$x] . " = '" . $values[$x] . "' and ";
            }
            $sqlStmt = 'WHERE ' . substr($sqlStmt, 0, -5);
        }
        if ($data2 == '') {
            $sqlStmt2 = '';
        } else {
            $columns = array_keys($data2);
            $values  = array_values($data2);
            $clength = count($columns);
            for ($x = 0; $x < $clength; $x++) {
                $sqlStmt2 .= $columns[$x] . " " . $values[$x] . " ";
            }
            $sqlStmt2 = $sqlStmt2;
        }
        $Istr     = "SELECT * FROM $TBnames $sqlStmt $sqlStmt2";
        $stmtData = $this->dbObjectect->query_execute($Istr);
        if ($method == 'fetch') {
            while ($row = $stmtData->fetch_assoc()) {
                $arr[] = $row;
            }
            return $arr;
        } elseif ($method == 'count') {
            return $this->dbObjectect->query_rowCount($stmtData);
        }
    }
    
    
}
