<?php
//request via form method.
//determine the method and the route

//start the session for store the result data
session_start();

global $data, $status;


//passing non-sensitive info to retrieve data.
if(isset($_GET['action']) || isset($_POST['action'])){

    //get the 'action' parameter
    $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
    if(!$action)
        $action = filter_input(INPUT_POST, "action", FILTER_SANITIZE_STRING);

    // //get the 'endpoint' parameter
    // $endpoint = filter_input(INPUT_GET, "endpoint", FILTER_SANITIZE_STRING);
    // if(!$endpoint)
    //     $endpoint = filter_input(INPUT_POST, "endpoint", FILTER_SANITIZE_STRING);

    //use 'action' and 'endpoint' parameters to determine the route
    switch($action){

        case 'login':
            //request user authentication
            require_once "../Models/Dbh.class.php";
            require_once "../Controls/UserContr.class.php";
            $user = UserContr::_login();
            $user->login();
        break;

        case "OAuth_login":
            //request control to insert data base on the parameter$oAuth_uid, $nname
            require_once "../Models/Dbh.class.php";
            require_once "../Controls/UserContr.class.php";
            $user = UserContr:: _loginOAuth();
            $data = $user->login_OAuth();
            Done();  //send json response
            exit();
        break;
        
        case "register":
            //request control to insert data base on the parameter
            require_once "../Models/Dbh.class.php";
            require_once "../Controls/UserContr.class.php";
            $user = UserContr:: _register(); 
            $user->register();
        break;

        case "search":
            require_once "../Models/Dbh.class.php";
            require_once "../Controls/ArticleContr.class.php";
            $article = ArticleContr::_Search();
            $article->search();
        break;

        case "getUserArticles":
            require_once "../Models/Dbh.class.php";
            require_once "../Controls/ArticleContr.class.php";
            $article = ArticleContr::_UserArticle();
            $article->getUserArticle();
        break;

        case "getSingleArticle":
            require_once "../Models/Dbh.class.php";
            require_once "../Controls/ArticleContr.class.php";
            $article = ArticleContr::_targetArticle();
            $article->getArticle();
        break;

        case 'createArticle':
            require_once "../Models/Dbh.class.php";
            require_once "../Controls/ArticleContr.class.php";
            $article = ArticleContr::_newAritcle();
            $article->createArticle();
        break;

        case 'deleteArticle':
            require_once "../Models/Dbh.class.php";
            require_once "../Controls/ArticleContr.class.php";
            $article = ArticleContr::_targetArticle();
            $article->deleteAritcle();
        break;

        case 'editArticle':
            require_once "../Models/Dbh.class.php";
            require_once "../Controls/ArticleContr.class.php";
            $article = ArticleContr::_updateArticle();
            $article->updateAritcle();
        break;
    }//end of the 'action' switch statement
}
else{
    header("location: ../index.php");
}


/*****************************
Function Name: Done
Description: Package up our data and operation status for return to the client
Parameters: no parameters
Return: data array in JSON format
*****************************/
function Done()
{
    global $data, $status;

    //package the data and message into the associative array
    $result = [];
    $result['data'] = $data;
    $result['status'] = $status;

    //echo back to the client
    echo json_encode($result);
}