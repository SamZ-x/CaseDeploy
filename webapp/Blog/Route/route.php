<?php
//request via form method.
//determine the method and the route

//start the session for store the result data
session_start();

global $data, $status, $NumRows;


//passing non-sensitive info to retrieve data.
if(isset($_GET['action']) || isset($_POST['action'])){

    //get the 'action' parameter
    $action = filter_input(INPUT_GET, "action", FILTER_SANITIZE_STRING);
    if(!$action)
        $action = filter_input(INPUT_POST, "action", FILTER_SANITIZE_STRING);

    //get the 'endpoint' parameter
    $endpoint = filter_input(INPUT_GET, "endpoint", FILTER_SANITIZE_STRING);
    if(!$endpoint)
        $endpoint = filter_input(INPUT_POST, "endpoint", FILTER_SANITIZE_STRING);

    error_log($action);
    error_log($endpoint);

    
    //use 'action' and 'endpoint' parameters to determine the route
    switch($action){

        case 'select':
            
            switch($endpoint){

                case "article":
                    $userid = $_GET['userid'];
                    $keyword= $_GET['keyword'];

                    //request control to select data base on the parameter
                    require_once "../Models/Dbh.class.php";
                    require_once "../Controls/ArticleContr.class.php";
                    $article = ArticleContr::_localSearch($userid, $keyword);
                    $data = $article->localSearchArticles();
                    $status = "success";
                    error_log(json_encode($data));
                    //store the data and redirect to present the data
                    //$_SESSION['userdata'] = $data;
                    // if($_SESSION['loginRes']['loginstatus'])
                    //     header("location: ../Views/account.view.php?status=done&error=none");
                break;

                // case "single_article":
                //     $articleid = $_GET['articleid'];

                //     //request control to select data base on the parameter
                //     require_once "../Models/Dbh.class.php";
                //     require_once "../Controls/ArticleContr.class.php";
                //     $article = ArticleContr::getArticle_single($articleid);
                //     $data = $article->Retrieve_signle();
                    
                //     //store the data and redirect to present the data
                //     $_SESSION['single_article'] = $data;
                //     // if($_SESSION['loginstatus'])
                //     //     header("location: ../Views/user_show.php?status=done&error=none");
                // break;

                case 'globalsearch':
                    //get the search info
                    $category = $_GET['searchCategory'];
                    $keyword = $_GET['searchInfo'];
        
                    //request control to select data base on the parameter
                    require_once "../Models/Dbh.class.php";
                    require_once "../Controls/ArticleContr.class.php";
                    $article = ArticleContr::_globalSearch($category, $keyword);
                    $data = $article->globalSearchArticles();
                    $status = "success";
                    //header("location: ../Views/article_show.php?status=done&error=none");
                    //store the data and redirect to present the data
                    //$_SESSION['data'] = $data;
                    break;
            
                case 'userlogin':
           
                    //get user input
                    $uid = $_POST['userid_email'];
                    $pwd = $_POST['password'];
        
                    //request user authentication
                    require_once "../Models/Dbh.class.php";
                    require_once "../Controls/UserContr.class.php";
                    $user = UserContr::_userLogin($uid, $pwd);
                    $response = $user->userLogin();


                    $_SESSION['loginRes'] = $response;
                    
                    //request article data retrieve if logined successfully
                    //header("location: route.php?action=select&endpoint=article&userid={$uid}&keyword=");
                    header("location: ../Views/account.view.php");
                break;

            }//end of the 'endpoint' switch statement
        break;

        case 'insert':
            
            switch($endpoint){
                
                case "article":
                    //get user input
                    $title = $_POST['title'];
                    $description = $_POST['description'];
                    $markdown = $_POST['markdown'];
                    $userid = $_SESSION['loginRes']['userid'];
                    //request control to insert data base on the parameter
                    require_once "../Models/Dbh.class.php";
                    require_once "../Controls/ArticleContr.class.php";
                    $article = ArticleContr::_newAritcle($title, $description, $userid, $markdown);
                    $article->addArticle();
                    
                    //request article data retrieve if logined successfully
                    //header("location: route.php?action=select&endpoint=article&userid={$_SESSION['userid']}&keyword=");
                    header("location: ../Views/account.view.php");
                break;  

                case "role":
                    //request control to select data base on the parameter
                    //present data to client
                break;

                
                case "user":
                    //get input data
                    $fname=$_POST['firstname'];
                    $lname=$_POST['lastname'];
                    $nname=$_POST['nickname'];
                    $password = $_POST['password'];
                    $email=$_POST['email'];
                    $phone=$_POST['phone'];
                    $region=$_POST['Region'];
                    //request control to insert data base on the parameter
                    require_once "../Models/Dbh.class.php";
                    require_once "../Controls/UserContr.class.php";
                    $user = UserContr:: _userSignup($fname,$lname,$nname,$email,$password,$phone,$region);
                    $response = $user->signupUser();
                    $_SESSION['loginRes'] = $response;
                    //redirect to user page
                    header("location: ../Views/account.view.php");

                break;
            }
        break;

        case 'update':
            
            switch($endpoint){
                
                case "article":
                    //request control to select data base on the parameter
                    //present data to client
                break;

                case "role":
                    //request control to select data base on the parameter
                    //present data to client
                break;

                
                case "user":
                    //request control to select data base on the parameter
                    //present data to client
                break;
            }
        break;

        case 'delete':
            
            switch($endpoint){
                
                case "article":
                    //request control to select data base on the parameter
                    //present data to client
                break;

                case "role":
                    //request control to select data base on the parameter
                    //present data to client
                break;

                
                case "user":
                    //request control to select data base on the parameter
                    //present data to client
                break;
            }
        break;
    }//end of the 'action' switch statement
}
else{
    header("location: ../index");
}

Done();
die();

/*****************************
Function Name: Done
Description: Package up our data and operation status for return to the client
Parameters: no parameters
Return: data array in JSON format
*****************************/
function Done()
{
    global $data, $status, $NumRows;

    //package the data and message into the associative array
    $result = [];
    $result['data'] = $data;
    $result['status'] = $status;
    $result['rowcount'] = $NumRows;

    //echo back to the client
    echo json_encode($result);
}