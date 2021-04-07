<?php
    //Factorio mod portal API proxy since it has Access-Control-Allow-Origin not set.
    $allowed = ['Advanced-Electric-Revamped-v16', 'LogisticStatus'];
    $mod_name = $_GET['name'];
    if(in_array($mod_name, $allowed)) {
        //Use curl since file_get_contents would not terminate in php-fpm
        //$page = file_get_contents("https://mods.factorio.com/api/mods/${mod_name}");
        $page = curlGet("https://mods.factorio.com/api/mods/${mod_name}");
        $page = json_decode($page, true);
        http_response_code(200);
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: https://lshallo.eu');
        echo json_encode($page['downloads_count']);
    } else {
        http_response_code(403);
        echo "Unauthorized";
    }

    function curlGet($url) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }