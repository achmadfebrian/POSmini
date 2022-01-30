<?php

class Key_model extends CI_Model
{
  public function baseurl_api()
  {
    $baseurl_api = "http://localhost/api_pos_mini/";
    return $baseurl_api;
  }

  public function api_post($url, $params)
  {
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");

    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      "Accept: application/json",
      'Authorization: Bearer kso349JK()#&*ok2781*(bskjfaajvbwue919as90fqj'
    ));

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  // Make it so the data coming back is put into a string
    curl_setopt($curl, CURLOPT_POSTFIELDS, $params);  // Insert the data

    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

    // Send the request
    $result = curl_exec($curl);

    curl_close($curl);
    $data = json_decode($result, true);
    return $data;
  }
}
