<?php

//action.php

if(isset($_POST["action"])) {


        if ($_POST["action"] == 'delete') {
            $id = $_POST['id'];
            $api_url = "http://abstract.com/Delete_or_Remove/api/test_api.php?action=delete&id=" . $id . "";
            $client = curl_init($api_url);
            curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($client);
            echo $response;
        }


}



