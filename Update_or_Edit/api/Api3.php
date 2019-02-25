<?php

//Api3.php

class API3
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


function fetch_single($id)
 {
  $query = "SELECT * FROM tbl_sample WHERE id='".$id."'";
  $statement = $this->connect->prepare($query);
  if($statement->execute())
  {
   foreach($statement->fetchAll() as $row)
   {
    $data['first_name'] = $row['first_name'];
    $data['last_name'] = $row['last_name'];
   }
   return $data;
  }
 }

 function update()
 {
  if(isset($_POST["first_name"]))
  {
   $form_data = array(
    ':first_name' => $_POST['first_name'],
    ':last_name' => $_POST['last_name'],
    ':id'   => $_POST['id']
   );
   $query = "
   UPDATE tbl_sample 
   SET first_name = :first_name, last_name = :last_name 
   WHERE id = :id
   ";
   $statement = $this->connect->prepare($query);
   if($statement->execute($form_data))
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
  }
  else
  {
   $data[] = array(
    'success' => '0'
   );
  }
  return $data;
 }


}
