<?php

function get_post_data($url,$params){
   $url = $url;
    $data = $params;

        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result == true) { 
          return json_decode($result);
        }
        else{
          return false;
        }
}

function get_current_url(){
    $directoryURI = $_SERVER['REQUEST_URI'];
    $path = parse_url($directoryURI, PHP_URL_PATH);
    $components = explode('/', $path);
    $last_part = end($components);

    return $last_part;
}

function get_base_url(){
    $base_url = "http://".$_SERVER['SERVER_NAME']."/cfn/";
    return $base_url;
}

?>