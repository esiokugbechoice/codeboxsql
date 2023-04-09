<?php
namespace codeboxsql;

class connection
{
    protected $connect;
    protected $db_host;
    protected $db_user;
    protected $db_pass;
    protected $db_database;
    
    public function __construct($host, $user, $pass, $database)
    {
        $this->db_host     = $host;
        $this->db_user     = $user;
        $this->db_pass     = $pass;
        $this->db_database = $database;
        $this->connect     = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_database);
    }
    public function query_execute($sql)
    {
        return mysqli_query($this->connect, $sql);
    }
    public function query_rowCount($sql)
    {
        return mysqli_num_rows($sql);
    }
    public function query_lastID()
    {
        return mysqli_insert_id($this->connect);
    }
    
}
