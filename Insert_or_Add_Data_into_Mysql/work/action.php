<?php

//action.php

if(isset($_POST["action"])) {
    if ($_POST["action"] == 'insert') {
        $form_data = array(
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name']
        );
        $api_url = "http://abstract.com/Insert_or_Add_Data_into_Mysql/api/test_api.php?action=insert";
        $client = curl_init($api_url);
        //CURLOPT_POST - TRUE для использования обычного HTTP POST
        curl_setopt($client, CURLOPT_POST, true);

        //CURLOPT_POSTFIELDS - specify data to POST to server
        curl_setopt($client, CURLOPT_POSTFIELDS, $form_data);


        //CURLOPT_RETURNTRANSFER - TRUE для возврата результата передачи в качестве строки из curl_exec()
        // вместо прямого вывода в браузер.
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($client);
        curl_close($client);
        $result = json_decode($response, true);
        foreach ($result as $keys => $values) {
            if ($result[$keys]['success'] == '1') {
                echo 'insert';
            } else {
                echo 'error';
            }
        }
    }
}
