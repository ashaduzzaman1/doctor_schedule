<?php
namespace App\Model;
use PDO;
use PDOException;
class Database{

    protected $DBH;
    private $host     = "localhost";
    private $dbName   = "doctor_schedule_db";
    private $user     = "root";
    private $password = "";

    public function __construct(){
        try {
            $this->DBH = new PDO("mysql:host=$this->host;dbname=$this->dbName",$this->user,$this->password);
            //echo "connection sucessfull!<br />";
        }
        catch (PDOException $e){
            echo "Connection Failed: " . $e->getMessage();
        }
        return $this->DBH;
    }

}// end of database class
