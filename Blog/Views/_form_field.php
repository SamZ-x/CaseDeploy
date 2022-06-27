<!-- for create/edit articles -->

<?php
    $title="";
    $description="";
    $markdown="";

    if(isset($_SESSION['input'])){
        $dataRec = $_SESSION['input'];
        error_log(var_dump($dataRec));
        $title = $dataRec['title'];
        $description = $dataRec['description'];
        $markdown = $dataRec['markdown'];
    }
?>
<div class="article-new-title">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" placeholder="Article title" required value="<?php echo $title;?>">
</div>
<div class="article-new-description">
    <label for="decription">Decription</label>
    <textarea name="decription" id="decription" rows="3" cols="100" placeholder="Description..." required><?php echo $description;?></textarea>     <!--preload the exist content( textarea prop: cols="30" rows="10")-->
</div>
<div class="article-new-description">
    <label for="markdown">Content</label>
    <textarea name="markdown" id="markdown" rows="20" cols="100" placeholder="Input content in Markdown format..." required><?php echo $markdown;?></textarea>         <!--preload the exist content( textarea prop: cols="30" rows="10")-->
</div>
<div class="article-new-description">
    <button class = "article-link-button" type="submit" name="submit">Save</button>
    <a class = "article-link-button" href="blog_userpage.php" >Cancel</a>                                           <!--add url:back to the previous page -->
</div>
