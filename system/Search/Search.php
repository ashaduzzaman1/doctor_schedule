<?php
namespace App\Search;
use App\Model\Database;
use App\Message\Message;
use App\Utility\Utility;
use PDO;

class Search extends Database
{
    public $s_id;


    public function index($fetchMode='ASSOC', $s_id){
        $sql = "SELECT * FROM doctor_info WHERE deleted_at IS NULL AND specialist_id = $s_id ";
        $STH = $this->DBH->query($sql);

        $fetchMode = strtoupper($fetchMode);
        if(substr_count($fetchMode,'OBJ') > 0)
            $STH->setFetchMode(PDO::FETCH_OBJ);
        else
            $STH->setFetchMode(PDO::FETCH_ASSOC);

        $arrAllData  = $STH->fetchAll();
        return $arrAllData;

    }// end of index();

    public function indexPaginator($page = 0, $itemsPerPage = 5, $s_id)
    {

        $start = (($page - 1) * $itemsPerPage);
        
        $sql = "SELECT * from doctor_info WHERE deleted_at IS NULL AND specialist_id = $s_id ORDER BY rating_point DESC LIMIT $start,$itemsPerPage";

        $STH = $this->DBH->query($sql);

        $STH->setFetchMode(PDO::FETCH_OBJ);

        $arrSomeData = $STH->fetchAll();
        return $arrSomeData;

    }// end of indexPaginator() Method...
    
    public function makeRate($point){
        $point = $point/20;
        $point = round($point,2);
        return $point;
    }


}//End of Class Brackets.