<?php

/**
 * Created by PhpStorm.
 * User: Asus
 * Date: 8/27/2017
 * Time: 12:58 PM
 */
class Database
{
    private $conn;

    /**
     * @return mysqli
     */
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * Database constructor.
     * @param $conn =
     */
    public function __construct()
    {
        $this->conn = new mysqli(DB_HOST, DB_USER,DB_PASS, DB_NAME);
        if($this->conn->connect_errno)
        {
            die("Database connection failed for error : " .$this->conn->connect_error);
        }
    }


/*    public  function openDBConnection()
    {
        $this->conn = mysqli_connect(DB_HOST, DB_USER,DB_PASS, DB_NAME);
        if(mysqli_connect_error())
        {
            die("Database connection failed for error : " .mysqli_error($this->conn));
        }

    }*/

    public  function  query($sql){
        $result = mysqli_query($this->conn, $sql);

        $this->confirmQuery($result);

        return $result;
    }

    private function confirmQuery($result){
        if(!$result)
        {
            die("Query failed : ".mysqli_error($this->conn));
        }
    }

    public function  escapeString($string){

        $string = mysqli_real_escape_string($this->conn, $string);

        return $string;
    }

    public function theInsertID(){
        return mysqli_insert_id($this->conn);
    }



}

$database = new Database();