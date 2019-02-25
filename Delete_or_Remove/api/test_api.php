<?php

//test_api.php

include('Api.php');

$api_object = new API4();

if($_GET["action"] == 'fetch_all')
{
    $data = $api_object->fetch_all();
}


if($_GET["action"] == 'delete')
{
    $data = $api_object->delete($_GET["id"]);
}

echo json_encode($data);
