<?php

//Api3.php

class API4
{
    private $connect = '';

    function __construct()
    {
        $this->database_connection();
    }


    //DB Params
    private $host ='localhost';
    private $db_name ='testing';
    private $username ='phpmyadmin';
    private $password ='12122';



    function database_connection()
    {
        $this->connect = new PDO('mysql:host='.$this->host . ';dbname=' . $this->db_name, $this->username, $this->password);

    }



    function delete($id)
    {
        $query = "DELETE FROM tbl_sample WHERE id = '".$id."'";
        $statement = $this->connect->prepare($query);
        if($statement->execute())
        {
            $data[] = array(
                'success' => '1'
            );
        }
        else
        {
            $data[] = array(
                'success' => '0'
            );
        }
        return $data;
    }


function fetch_all()
    {
        $query = "SELECT * FROM tbl_sample ORDER BY id";
        $statement = $this->connect->prepare($query);
        if ($statement->execute()) {
            while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                $data[] = $row;
            }
            return $data;
        }
    }

}