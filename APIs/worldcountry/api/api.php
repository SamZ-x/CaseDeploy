<?php
    include_once('../core/initialize.php');

    //get the request path
    echo Var_dump($_REQUEST);
    //$request = $_REQUEST['request'];
    $request = "country/getAllCountries";
    //create an API object
    $api = new API($request);
    $method   = $api->getMethod();          //method   :target operation
    $endpoint = $api->getEndpoint();        //endpoint :target the model
    $verb     = $api->getVerb();            //verb     :speify the action

    echo "method: ".$method .";";
    echo "method: ".$endpoint .";";
    echo "method: ".$verb .";";

    //api process
    switch($method)
    {
        case 'GET':
            switch($endpoint){
                case 'country':
                    //header setting
                    header('Access-Control-Allow-Origin: *');
                    header('Content-Type: application/json');
                    //create class object
                    $Country = new Country($dbh);
                    //call target method with parameter
                    if(method_exists($Country, $verb))
                    {   
                        switch($verb){
                            case 'getAllCountries':
                                $result = $Country->getAllCountries();
                                break;

                            case 'getSingleCountyByAlphaCode':
                                $Country->alpha3Code = $_GET['alphaCode'];
                                $result = $Country->getSingleCountyByAlphaCode();
                                break;

                            case 'getSingleCountyByM49Code':
                                $Country->m49Code = $_GET['m49Code'];
                                $result = $Country->getSingleCountyByM49Code();
                                break;

                            case 'getCountyByCountinent':
                                $Country->countinentTitle = $_GET['countinentTitle'];
                                $result = $Country->getCountyByCountinent();
                                break;

                            case 'getCountyByRegion':
                                $Country->regionTitle = $_GET['regionTitle'];
                                $result = $Country->getCountyByRegion();
                                break;
                        }
                        //return result
                        echo $api->_response($result);
                    }
                    else
                        echo $api->_response(null, 405);
                    break;
            }//endpoint switch
            break;
    }//method switch

?>
