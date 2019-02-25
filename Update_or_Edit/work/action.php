<?php

//action.php

if(isset($_POST["action"])) {

    if ($_POST["action"] == 'fetch_single') {
        $id = $_POST["id"];
        $api_url = "http://abstract.com/Update_or_Edit/api/test_api.php?action=fetch_single&id=" . $id . "";
        $client = curl_init($api_url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        echo $response;
    }

    if ($_POST["action"] == 'update') {
        $form_data = array(
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'id' => $_POST['hidden_id']
        );
        $api_url = "http://abstract.com/Update_or_Edit/api/test_api.php?action=update";
        $client = curl_init($api_url);
        curl_setopt($client, CURLOPT_POST, true);
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        curl_close($client);
        $result = json_decode($response, true);
        foreach ($result as $keys => $values) {
            if ($result[$keys]['success'] == '1') {
                echo 'update';
            } else {
                echo 'error';
            }
        }
    }

}

