<?php


//get the select article
function GetSelectedArticle($articleId, $userId){
    //prepare data
    $data = array(
        "action"=>"update",
        "endpoint"=>"article",
        "articleId"=>$articleId,
        "userId"=>$userId
    );

    //no additional header option
    $header=""; 
    
    return callAPI("GET", "../Route/route.php", $data, $header);
}

//curl functions to send request to API
function callAPI($method, $url, $data, $headerOption){
    //curl init
    $curl = curl_init();
    
    //set data format base on method
    switch ($method){
       case "POST":
          curl_setopt($curl, CURLOPT_POST, 1);
          if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
          break;
       default:
          if ($data)
             $url = sprintf("%s?%s", $url, http_build_query($data));
    }

    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER,
        
        array(
            'Content-Type: multipart/form-data',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0',
            $headerOption
        ));
    //return string value
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    
    // EXECUTE:
    $result = curl_exec($curl);
    if(!$result){die("Connection Failure");}
    curl_close($curl);
    return $result;
}
