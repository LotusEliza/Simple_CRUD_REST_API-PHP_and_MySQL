<?php

//test_api.php

include('Api2.php');

$api_object = new API2();

if($_GET["action"] == 'fetch_all')
{
    $data = $api_object->fetch_all();
}

if($_GET["action"] == 'insert')
{
    $data = $api_object->insert();
}

echo json_encode($data);
