<?php

//fetch.php

$api_url = "http://abstract.com/Delete_or_Remove/api/test_api.php?action=fetch_all";

//Инициализирует сеанс cURL
$client = curl_init($api_url);


//***Устанавливает параметр для указанного сеанса cURL.
//***CURLOPT_RETURNTRANSFER - TRUE для возврата результата передачи в
// качестве строки из curl_exec() вместо прямого вывода в браузер.
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);


//***Выполняет запрос cURL
$response = curl_exec($client);

$result = json_decode($response);


$output = '';

if(count($result) > 0)
{
    foreach($result as $row)
    {
        $output .= '
  <tr>
       <td>'.$row->first_name.'</td>
       <td>'.$row->last_name.'</td>
       <td><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="'.$row->id.'">Edit</button></td>
       <td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="'.$row->id.'">Delete</button></td>
  </tr>
  ';
    }
}
else
{
    $output .= '
 <tr>
  <td colspan="4" align="center">No Data Found</td>
 </tr>
 ';
}

echo $output;

