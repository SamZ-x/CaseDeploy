<?php
    //User Article
    //Represent an Article object in database.

    //Model Methods include:
    //findOne({argkey:argvalue})

    //Methods Output include:
    //succeed: object
    //failed: null

    //manipulate articles
    class Article extends Dbh{

        //function:findByTitle
        //find an article by title
        protected function findByTitle($title){
            //query
            $sqlquery = "SELECT a.`articleId`, a.`UserId`, a.`title`, a.`createdAt`,  CONCAT(u.`Firstname`, ' ', u.`Lastname`) as 'author', a.`description`, a.`markdown`, a.`sanitizedHtml` ";
            $sqlquery .= "FROM `articles` a JOIN `users` u ON a.UserId = u.UserId ";
            $sqlquery .= "WHERE a.`title` LIKE '%' ? '%'";
            $stmt = $this->connect()->prepare($sqlquery);
            
            //internal server faild return null
            if(!$stmt->execute([$title])){
                $stmt = null;
                return null;
            }
            else{
                //Get all matched user object(array)
                //result is any array of user object
                $result = $stmt->FETCHALL();

                //no matched user
                if(empty($result)){
                    $stmt = null;
                    return null;
                }
                //find matched user
                else{
                    $stmt = null;
                    return $result;      
                }
            }
        }
        
        //function:findByAuthor
        //find an article by author name
        protected function findByAuthor($author){
            //query
            $sqlquery = "SELECT a.`articleId`, a.`UserId`, a.`title`, a.`createdAt`,  CONCAT(u.`Firstname`, ' ', u.`Lastname`) as 'author', a.`description`, a.`markdown`, a.`sanitizedHtml` ";
            $sqlquery .= "FROM `articles` a JOIN `users` u ON a.`UserId` = u.`UserId`  ";
            $sqlquery .= "WHERE u.`Firstname` LIKE '%' ? '%' OR u.`Lastname` LIKE '%' ? '%' OR u.`Middlename` LIKE '%' ? '%' OR u.`NickName` LIKE '%' ? '%'";
            $stmt = $this->connect()->prepare($sqlquery);
            
            //internal server faild return null
            if(!$stmt->execute([$author, $author, $author,  $author])){
                $stmt = null;
                return null;
            }
            else{
                //Get all matched user object(array)
                //result is any array of user object
                $result = $stmt->FETCHALL();

                //no matched user
                if(empty($result)){
                    $stmt = null;
                    return null;
                }
                //find matched user
                else{
                    $stmt = null;
                    return $result;      
                }
            }
        }
        
        //function:findByUserId
        //find an article by userid
        protected function findByUserId($userid){
            //query
            $sqlquery = "SELECT a.`articleId`, a.`UserId`, a.`title`, a.`createdAt`,  CONCAT(u.`Firstname`, ' ', u.`Lastname`) as 'author', a.`description`, a.`markdown`, a.`sanitizedHtml` ";
            $sqlquery .= "FROM `articles` a JOIN `users` u ON a.`UserId` = u.`UserId` ";
            $sqlquery .= "WHERE a.`UserId` = ? ";
            $stmt = $this->connect()->prepare($sqlquery);
            
            //internal server faild return null
            if(!$stmt->execute([$userid])){
                $stmt = null;
                return null;
            }
            else{
                //Get all matched user object(array)
                //result is any array of user object
                $result = $stmt->FETCHALL();

                //no matched user
                if(empty($result)){
                    $stmt = null;
                    return null;
                }
                //find matched user
                else{
                    $stmt = null;
                    return $result;      
                }
            }
        }
        
        //function:findByArticleId
        //find an article by articleid
        protected function findByArticleId($articleid){
            //query
            $sqlquery = "SELECT a.`articleId`, a.`UserId`, a.`title`, a.`createdAt`,  CONCAT(u.`Firstname`, ' ', u.`Lastname`) as 'author', a.`description`, a.`markdown`, a.`sanitizedHtml` ";
            $sqlquery .= "FROM `articles` a JOIN `users` u ON a.`UserId` = u.`UserId` ";
            $sqlquery .= "WHERE a.`articleId` = ? ";
            $stmt = $this->connect()->prepare($sqlquery);
            //internal server faild return null
            if(!$stmt->execute([$articleid])){
                $stmt = null;
                return null;
            }
            else{
                //Get all matched user object(array)
                //result is any array of user object
                $result = $stmt->FETCHALL();

                //no matched user
                if(empty($result)){
                    $stmt = null;
                    return null;
                }
                //find matched user
                else{
                    $stmt = null;
                    return $result;      
                }
            }
        }

        //function:create
        //find an article by title
        protected function create($title,$UserId,$description,$markdown,$sanitizedHtml,$slug){
             
            //generate articleId
            $articleid = $this->generateArticleId();
            //query
            $sqlquery = "INSERT INTO `articles`(`articleId`, `title`, `UserId`, `description`, `markdown`, `sanitizedHtml`, `slug`) VALUES (?, ?, ?, ?, ?, ?, ?);";
            $stmt = $this->connect()->prepare($sqlquery);
            
            //excute query, handle error
            if(!$stmt->execute([$articleid,$title,$UserId,$description,$markdown,$sanitizedHtml,$slug])){
                $stmt = null;    
                return null;
            }

            //if insert successfully, get the userid and nickname for login
            if($stmt->rowCount() > 0)
            { 
                $stmt = null;
                return $this->findByArticleId($articleid);   
            }else{
                $stmt = null;    
                return null;
            }
        }

        //function:findOneAndDelete
        //find a target article and delete 
        protected function findOneAndDelete($articleid){
            //get the target article
            $article = $this->findByArticleId($articleid);
            //query
            $sqlquery = "DELETE FROM `articles` WHERE `articleId` = ? ";
            //fill the query with parameters
            $stmt = $this->connect()->prepare($sqlquery);
            //internal server faild return null
            if(!$stmt->execute([$articleid])){
                $stmt = null;
                return null;
            }
            else{
                $stmt = null;
                return $article;    //optional
            }
        }

        //function:findOneAndUpdate
        //find a target article and delete 
        protected function findOneAndUpdate($title, $description, $markdown, $sanitizedHtml, $slug, $articleid){
            $sqlquery = "UPDATE `articles` ";
            $sqlquery .= "SET `title`= ?, `createdAt`= DEFAULT, `description`= ? ,`markdown`= ? , `sanitizedHtml`= ? ,`slug`= ? ";
            $sqlquery .= "WHERE `articleId` = ? ";
            //fill the query with parameters
            $stmt = $this->connect()->prepare($sqlquery);
            //excute query, handle error
            if(!$stmt->execute([$title, $description, $markdown, $sanitizedHtml, $slug, $articleid])){
                $stmt = null;    
                return null;
            }

            //if insert successfully, get the userid and nickname for login
            if($stmt->rowCount() > 0)
            { 
                $stmt = null;
                return $this->findByArticleId($articleid);   
            }else{
                $stmt = null;    
                return null;
            }
        }

        //************** Helper Methods *****************//

        //function:generateArticleId
        //return unique 13 charactors userid 
        private function generateArticleId(){
            //create unique id and check existence in database
            do{
                $articleid = uniqid("a_",false);
            }while(!empty($this->findByArticleId($articleid)));
            return $articleid;
        }

    }

?>

