<?php
/*
Plugin Name: Add Json data from url
url: https://drleahlagos.com/api/media_info.php
*/

function get_json_from_url()
{
	$url = 'https://drleahlagos.com/api/media_info.php';

    $data = array (
        'cat' => 'broadcast',
        'page' => 1
        );
        
        $params = '';
    foreach($data as $key=>$value)
                $params .= $key.'='.$value.'&';
         
        $params = trim($params, '&');

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url.'?'.$params ); //Url together with parameters
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Return data instead printing directly in Browser
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT , 7); //Timeout after 7 seconds
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    
    $result = curl_exec($ch);
    curl_close($ch);

  	return $result;
}


register_activation_hook(__FILE__, 'get_json_from_url');






