<?php

//Oauth 2.0
//Login Authorization via Github 

//Get token from authorization server
function GetToken($code){
    //get the database connection credential for external json file
    $OauthCredential = json_decode(file_get_contents('../Dbh.json', true), true);
    $client_id = $OauthCredential['client_id'];
    $client_secret = $OauthCredential['client_secret'];

    $data = array(
        "client_id"=>$OauthCredential['client_id'],
        "client_secret"=>$OauthCredential['client_secret'],
        "code"=>$code
    );

   $header=""; 
    
    return callAPI("POST", "https://github.com/login/oauth/access_token", $data, $header);
}

//Get resource with access token from resource server
function GetOauthUser($token){
    $Authorization = 'Authorization: token '.$token;
    $data="";
    return $result = callAPI("GET", "https://api.github.com/user", $data, $Authorization);
}

//create blog user
function loginUser($oAuth_uid, $nickname){
    $data = array(
        // "action"=>"insert",
        // "endpoint"=>"oAuthuser",
        "action"=>"OAuth_login",
        "oAuth_uid" => $oAuth_uid,
        "nickname" => $nickname,
    );
    $header="";
    return callAPI("POST", "https://www.casedeploy.com/webapp/Blog/Route/route.php", $data, $header);
}

//curl functions to send request to API
function callAPI($method, $url, $data, $headerOption){
    $curl = curl_init();
    switch ($method){
       case "POST":
          curl_setopt($curl, CURLOPT_POST, 1);
          if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
          break;
       case "PUT":
          curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
          if ($data)
             curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 					
          break;
       default:
          if ($data)
             $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER,array(
        'Content-Type: multipart/form-data',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0',
         $headerOption));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    // EXECUTE:
    $result = curl_exec($curl);
    if(!$result){die("Connection Failure");}
    curl_close($curl);
    return $result;
}
