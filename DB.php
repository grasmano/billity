<?php
/**
 * Created by PhpStorm.
 * User: Oleg
 * Date: 23.07.2022
 * Time: 00:13
 */
include 'config.php';

class db
{
    private $host;
    private $user;
    private $password;
    private $db_name;

    protected function connectDb()
    {
        $this->host = DB_HOST;
        $this->user = DB_USER;
        $this->password = DB_PASSWORD;
        $this->db_name = DB_NAME;

        $conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);
        if ($conn->connect_error) {
            die("Failed to connect to MySQL: " . $conn->connect_error);
        }
        return $conn;
    }

}

