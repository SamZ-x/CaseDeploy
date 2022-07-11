<?php
    //resume the session;
    session_start();
    //blog_index page (home page of the blog)
    //display search bar for searching specific user's blog or blog articles base on title key words
    
    $data = "";
    $Islogin = false;

    if(isset($_SESSION['data'])){
        $data = $_SESSION['data']['data'];
        $rowcount = $_SESSION['data']['rowcount'];
    }

    if(!$data){
        header("Location: ../index.php?status=done&message=dataEmpty");
    }

    if(isset($_SESSION['userid']))
        $Islogin = true;

    require_once "head.view.php";
?>

<!-- search result info -->
<section class="pt-5 bg-info pb-1">
      <div class="container pt-3">
        <div class="text-center text-light h3">
            <p class="mb-1">
                <?php
                    echo "Search Result: ". $rowcount ." records.";
                ?>
            </p>
        </div>
      </div>  
    </section>


<section class="p-3">
        <div class="container">
            <div class="row row-cols-2 g-2 text-center">
            <?php
            //iterate all retrieved article
            //fill into the template
            if(!empty($data)){
                foreach($data as $article)
                {
                    $output = "<div class=\"col-md-6 \"><div class=\"card bg-light h-100\"><div class=\"card-body text-start\"><h2 class=\"card-title mb-2\">"
                            .$article['title']."</h2><p class=\"card-text\">"
                            .$article['createdAt']."<a class=\"mx-2\"href=\"\">"
                            .$article['Firstname']."</a></p><p class=\"card-text\">"
                            .$article['description']."</p><a class = \"btn btn-primary mx-1\" data-bs-toggle=\"modal\" data-bs-target=\"#readmore\" href=\"../api/getArticle_single.php?articleid="
                            .$article['articleId']."\">Read More</a>";
                            
                    
                    // //style head
                    // echo "<div class=\"col-md-6 \"><div class=\"card bg-light h-100\"><div class=\"card-body text-start\"><h2 class=\"card-title mb-2\">";
                    // //display title
                    // echo $article['title']."</h2>";
                    // //display subtitle
                    // echo "<p class=\"card-text\">".$article['createdAt']."<a class=\"mx-2\"href=\"\">".$article['Firstname']."</a></p>";
                    // //display description
                    // echo "<p class=\"card-text\">".$article['description']."</p>";
                    // //display the button and close tag
                    // echo "<a class = \"btn btn-primary mx-1\" href=\"\">Read More</a><a class = \"btn btn-primary mx-1\" href=\"\">Edit</a></div></div></div>";
                    
                    if($Islogin)
                        $output .="<a class = \"btn btn-primary mx-1\" href=\"\">Edit</a>";
                    
                    echo $output."</div></div></div>";
                    
                }
            }
            else
                echo "<div class=\"col-md-12 p-5\"><h1>Oop! No articles!</h1></div>"
            ?>

        </div>
    </section>

    <section>
        <?php


        $url = 'http://localhost/Blog/api/getArticle_single.php';

        $params = array(
            'articleid'=>1
            );
    
        // Create a new Request object
        $result = json_decode(callAPI('GET',$url, $params), true);
        $data = $result['data'][0];

        function callAPI($method, $url, $data){
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
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
               'Content-Type: application/json',
            ));
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            // EXECUTE:
            $result = curl_exec($curl);
            if(!$result){die("Connection Failure");}
            curl_close($curl);
            return $result;
         }
    
        ?>
        <!-- Modal -->
        <div class="modal fade modal-lg" id="readmore" tabindex="-1" >
            <div class="modal-dialog  modal-dialog-scrollable ">
                <div class="modal-content">
                    <div class="modal-header">
                    <?php 
                        $uri = $_SERVER['REQUEST_URI'];
                        echo $uri; 
                        echo $_SERVER["REQUEST_METHOD"];
                        $uri = explode( '/', $uri );
                        echo var_dump($uri); 
                    
                    ?>
                    </div>
                    <div class="modal-body">
                    <?php echo $data['sanitizedHtml']; ?>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php     require_once "foot.view.php"; ?>
