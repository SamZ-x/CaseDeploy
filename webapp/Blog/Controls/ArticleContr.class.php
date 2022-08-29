<?php
  
    require_once "../Lib/Parsedown.php";            //use Parsedown lib
    require_once "../Models/Article.class.php";     //use article model

    class ArticleContr extends Article{

        //************************* fields *************************//
        private $articleid;
        private $title;
        private $userid;
        private $username;
        private $description;
        private $markdown;
        private $sanitizedhtml;
        private $slug;
        private $category;
        private $keyword;
        

        //************************* constructor and static methods *************************//

        //defaule constructor
        public function __construct(){
            //default
        }

        //function : _newAritcle
        //create an instance for creating new article
        public static function _newAritcle(){
            $instance = new self();
            
            //get value from globals
            $title = $_POST['title'];
            $description = $_POST['description'];
            $markdown_text = $_POST['markdown'];
            $userid = $_SESSION['loginRes']['userid'];

            //directly assign values to relative fields
            $instance->title = $title;
            $instance->description = $description;
            $instance->markdown = $markdown_text;
            $instance->userid =$userid;            
        
            //use function to assign
            $parsedwon = new Parsedown();
            $instance->sanitizedhtml = $parsedwon->text($markdown_text);
            $instance->slug = $instance->slugify($title);

            //create a snapshot for lastest input
            $inputSnapshot = array(
                "title" => $title,
                "description" => $description,
                "markdown" => $markdown_text
            );
            $_SESSION['inputSnapshot'] = $inputSnapshot;

            return $instance;
        }

        //function : _Search
        //create an instance for global search
        public static function _Search(){
            $instance = new self();
            //assign values to relative fields
            $instance->category = $_GET['searchCategory'];
            $instance->keyword = $_GET['searchInfo'];
            return $instance;
        }

        //function : _UserArticle
        //create an instance for retrieve articles data for logged user
        public static function _UserArticle(){
            $instance = new self();
            //assign values to relative fields
            $instance->userid = $_POST['userid'];
            return $instance;
        }

        //function : _targetArticle
        //create an instance for selected article
        public static function _targetArticle(){
            $instance = new self();
            //assign values to relative fields
            $instance->articleid = $_POST['articleid'];
            $instance->userid = $_SESSION['loginRes']['userid'];
            return $instance;
        }

        //function : _updateArticle
        //create an instance for updating article
        public static function _updateArticle(){
            $instance = new self();

            //get value from globals
            $articleid = $_POST['articleid'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $markdown_text = $_POST['markdown'];
            $userid = $_SESSION['loginRes']['userid'];

            //directly assign values to relative fields
            $instance->articleid = $articleid;
            $instance->title = $title;
            $instance->description = $description;
            $instance->markdown = $markdown_text;
            $instance->userid =$userid;            
        
            //use function to assign
            $parsedwon = new Parsedown();
            $instance->sanitizedhtml = $parsedwon->text($markdown_text);
            $instance->slug = $instance->slugify($title);

            //create a snapshot for lastest input
            $inputSnapshot = array(
                "title" => $title,
                "description" => $description,
                "markdown" => $markdown_text
            );
            $_SESSION['inputSnapshot'] = $inputSnapshot;

            return $instance;
        }


        //************************* public Methods *************************//

        //function : search
        //search articles
        //base on category and keyword
        //output: article object and message
        public function search(){
            //input check
            if($this->IsEmpty_Search()){
                //send response
                $response["message"] = "Please select search category and keyword.";
                $response["data"] = [];
                echo json_encode($response);
                exit();
            }

            //get article
            if($this->category == "username"){
                $articles = $this->findByAuthor($this->keyword);
            }

            if($this->category == "articletitle"){
                $articles = $this->findByTitle($this->keyword);
            }

            //result check
            if(!empty($articles)){
                $response["message"] = "succeed";
            }
            else{
                $response["message"] = "No matched articles";
            }
            
            //send response
            $response["data"] = $articles;
            echo json_encode($response);
            exit();
        }

        //function : getUserArticle
        //get the current user's articles
        //base on logged userid
        //output: article object and message
        public function getUserArticle(){
            //userid check
            if($this->IsEmpty_UserId()){
                //send response
                $response["message"] = "Invalid User";
                $response["data"] = [];
                echo json_encode($response);
                exit();
            }

            //get articles and check result
            $articles = $this->findByUserId($this->userid);
            if(!empty($articles)){
                $response["message"] = "succeed";
                $response["data"] = $articles;
            }
            else{
                $response["message"] = "No matched articles";
                $response["data"] = [];
            }
            //send response
            echo json_encode($response);
            exit();
        }

        //function : createArticle
        //create new article
        //output: redirection
        public function createArticle(){
            //input data check
            if($this->IsEmpty_ArticleInput()){
                header("location: ../Views/article_new.php?status=failed&message=InputEmpty");
                exit();   
            }
            //insert database
            $article = $this->create($this->title,$this->userid,$this->description,$this->markdown, $this->sanitizedhtml, $this->slug);
            if(!empty($article)){
                header("location: ../Views/account.view.php");
                exit();
            }
            else{
                header("location: ../Views/article_new.php?status=failed&message=InteralError");
                exit();
            }
        }

        //function : deleteAritcle
        //delete selected article
        //base on logged userid and articleid
        //output: article object and message
        public function deleteAritcle(){
            //check article existence and verify the articleid
            $article = $this->findByArticleId($this->articleid);  
            //no matched article for the articleid
            if(empty($article)){
                // header("location: ../Views/account.view.php");
                // exit();
                $response["message"] = "Invalid articleId. No matched article.";
                $response["data"] = [];
                echo json_encode($response);
                exit();
            }
            //userid un-match
            if($this->userid != $article[0]['UserId']){
                $response["message"] = "Action Unauthorized.";
                $response["data"] = [];
                echo json_encode($response);
                exit();
            }

            //delete the target article and get the return
            $article = $this->findOneAndDelete($this->articleid);
            if(!empty($article)){
                $response["message"] = "succeed.";
                $response["data"] = $article;
            }else{
                // header("location: ../Views/account.view.php?status=failed&message=InteralError");
                // exit();
                $response["message"] = "Internal Error.";
                $response["data"] = [];
            }
            //send response
            echo json_encode($response);
            exit();
        }

        //function : getArticle
        //get single article
        //base on logged userid and articleid
        //output: redirection
        public function getArticle(){
            //userid check
            if($this->IsEmpty_UserId()){
                //send response
                $response["message"] = "Invalid User";
                $response["data"] = [];
                echo json_encode($response);
                exit();
            }

            //get articles and check result
            $article = ($this->findByArticleId($this->articleid))[0];
            //no matched article for the articleid
            if(empty($article)){
                // header("location: ../Views/account.view.php");
                // exit();
                $response["message"] = "Invalid articleId. No matched article.";
                $response["data"] = [];
                echo json_encode($response);
                exit();
            }
            //userid un-match
            if($this->userid != $article['UserId']){
                $response["message"] = "Action Unauthorized.";
                $response["data"] = [];
                echo json_encode($response);
                exit();
            }

            //send response
            $response["message"] = "succeed";
            $response["data"] = $article;
            echo json_encode($response);
            exit();
        }

        //function : updateAritcle
        //update selected article
        //base on logged userid and articleid
        //output: redirection
        public function updateAritcle(){
            //check article existence and verify the articleid
            $article = $this->findByArticleId($this->articleid); 
            //no matched article for the articleid
            if(empty($article)){
                header("location: ../Views/account.view.php");
                exit();
            }
            //userid un-match
            if($this->userid != $article[0]['UserId']){
                header("location: ../Views/account.view.php");
                exit();
            }

            //input data check
            if($this->IsEmpty_ArticleInput()){
                header("location: ../Views/article_edit.php?articleId=".$this->articleid."&status=failed&message=InputEmpty");
                exit();   
            }

            //insert database
            $article = $this->findOneAndUpdate($this->title, $this->description, $this->markdown, $this->sanitizedhtml, $this->slug, $this->articleid);
            if(!empty($article)){
                header("location: ../Views/account.view.php");
                exit();
            }
            else{
                header("location: ../Views/edit.php?articleId=".$this->articleid."&status=failed&message=InteralError");
                exit();
            }
        }


        //************** Helper Methods *****************//
        
        //replace all special char with '-'
        private function slugify($string){
            return strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $string), '-'));
        }

        //check empty input for adding article(include space)
        private function IsEmpty_ArticleInput(){
            //check the input
            return empty(trim($this->title)) || empty( trim($this->description)) || empty(trim($this->markdown));
        }

        //check empty input for global search(include space)
        private function IsEmpty_Search(){
            //check the input
            return empty(trim($this->category)) || empty(trim($this->keyword));
        }

        //check empty userid for local search(include space)
        private function IsEmpty_UserId(){
            //check the input
            return empty(trim($this->userid));
        }
    }








?>