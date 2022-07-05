<?php
    //resume the session;
    session_start();
    //blog_index page (home page of the blog)
    //display search bar for searching specific user's blog or blog articles base on title key words
    
    $data = "";

    if(isset($_SESSION['data'])){
        $data = $_SESSION['data']['data'];
        $rowcount = $_SESSION['data']['rowcount'];
    }

    if(!$data){
        header("Location: ../index.php");
    }
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
                    //style head
                    echo "<div class=\"col-md-6 \"><div class=\"card bg-light h-100\"><div class=\"card-body text-start\"><h2 class=\"card-title mb-2\">";
                    //display title
                    echo $article['title']."</h2>";
                    //display subtitle
                    echo "<p class=\"card-text\">".$article['createdAt']."<a class=\"mx-2\"href=\"\">".$article['Firstname']."</a></p>";
                    //display description
                    echo "<p class=\"card-text\">".$article['description']."</p>";
                    //display the button and close tag
                    echo "<a class = \"btn btn-primary mx-1\" href=\"\">Read More</a><a class = \"btn btn-primary mx-1\" href=\"\">Edit</a></div></div></div>";
                }
            }
            else
                echo "<div class=\"col-md-12 p-5\"><h1>Oop! No articles!</h1></div>"
            ?>

        </div>
    </section>

<?php     require_once "foot.view.php"; ?>
