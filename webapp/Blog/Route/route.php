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



        case 'select':
            
            switch($endpoint){

                // case "article":
                //     $userid = $_GET['userid'];
                //     $articleId = $_GET['articleid'];
                //     $keyword= $_GET['keyword'];

                //     //request control to select data base on the parameter
                //     require_once "../Models/Dbh.class.php";
                //     require_once "../Controls/ArticleContr.class.php";
                //     $article = ArticleContr::_localSearch($userid, $keyword);
                //     $data = $article->localSearchArticles();
                //     $status = "success";
                // break;

                // case 'globalsearch':
                //     //get the search info
                //     $category = $_GET['searchCategory'];
                //     $keyword = $_GET['searchInfo'];
        
                //     //request control to select data base on the parameter
                //     require_once "../Models/Dbh.class.php";
                //     require_once "../Controls/ArticleContr.class.php";
                //     $article = ArticleContr::_globalSearch($category, $keyword);
                //     $data = $article->globalSearchArticles();
                //     $status = "success";
                //     break;
            
                // case 'userlogin':
                //     //get user input
                //     $uid = $_POST['userid_email'];
                //     $pwd = $_POST['password'];
        
                //     //request user authentication
                //     require_once "../Models/Dbh.class.php";
                //     require_once "../Controls/UserContr.class.php";
                //     $user = UserContr::_userLogin($uid, $pwd);
                //     $response = $user->userLogin();
                //     $_SESSION['loginRes'] = $response;
                //     header("location: ../Views/account.view.php");
                // break;

            }//end of the 'endpoint' switch statement
        break;

        case 'insert':
            
            switch($endpoint){
                
                // case "article":
                //     //get user input
                //     $title = $_POST['title'];
                //     $description = $_POST['description'];
                //     $markdown = $_POST['markdown'];
                //     $userid = $_SESSION['loginRes']['UserId'];
                //     //request control to insert data base on the parameter
                //     require_once "../Models/Dbh.class.php";
                //     require_once "../Controls/ArticleContr.class.php";
                //     $article = ArticleContr::_newAritcle($title, $description, $userid, $markdown);
                //     if($article->addArticle())
                //         $status = "success";

                //     header("location: ../Views/account.view.php");
                // break;  

                case "role":
                    //request control to select data base on the parameter
                    //present data to client
                break;

                
                // case "user":
                   
                //     //request control to insert data base on the parameter
                //     require_once "../Models/Dbh.class.php";
                //     require_once "../Controls/UserContr.class.php";
                //     $user = UserContr:: _register();  //$fname,$lname,$nname,$email,$password,$phone,$region
                //     $user->register();
                //     //$_SESSION['loginRes'] = $response;
                //     //redirect to user page
                //     //header("location: ../Views/account.view.php");

                // break;

                // case "oAuthuser":
                //     //get input data
                //     // $oAuth_uid=$_POST['oAuth_uid'];
                //     // $nname=$_POST['nickname'];
                //     //request control to insert data base on the parameter$oAuth_uid, $nname
                //     require_once "../Models/Dbh.class.php";
                //     require_once "../Controls/UserContr.class.php";
                //     $user = UserContr:: _registerOAuth();
                //     $data = $user->signupOAuthUser();
                // break;
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
                
                // case "article":
                //     //request control to select data base on the parameter
                //     $articleId = $_POST['articleId'];
                //     //request control to insert data base on the parameter
                //     require_once "../Models/Dbh.class.php";
                //     require_once "../Controls/ArticleContr.class.php";
                //     $article = ArticleContr::_getSingle($articleId);
                //     $result = $article->deleteArticle();
                //     if($result['rowcount']==1)
                //         $status = 'success';
                // break;

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

//Done();
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