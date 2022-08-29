<!-- for create/edit articles -->

<?php
    $title="";
    $description="";
    $markdown="";

    if(isset($_SESSION['inputSnapshot'])){
        //extract the input record
        $dataRec = $_SESSION['inputSnapshot'];
        $title = $dataRec['title'];
        $description = $dataRec['description'];
        $markdown = $dataRec['markdown'];
    }
?>

<div class="row text-center my-2">
    <div class="col-md-2">
        <label class="form-label h3" for="title">Title</label>
    </div>
    <div class="col-md-10 ">
        <input class="form-control w-50" type="text" name="title" id="title" placeholder="Article title" required value="<?=$title;?>">
    </div>
</div>
<div class="row text-center my-2">
    <div class="col-md-2">
    <label class="form-label h3 mx-2" for="description">Description</label>
    </div>
    <div class="col-md-10">
    <textarea class="form-control w-50" name="description" id="description" rows="3" cols="100" placeholder="Description..." required><?=$description;?></textarea>     <!--preload the exist content( textarea prop: cols="30" rows="10")-->
    </div>
</div>
<div class="row text-center my-2">
    <div class="col-md-2">
        <label class="form-label h3" for="markdown">Content</label>
    </div>
    <div class="col-md-10">
    <textarea class="form-control w-50" name="markdown" id="markdown" rows="15" cols="100" placeholder="Input content in Markdown format..." required><?=$markdown;?></textarea>         <!--preload the exist content( textarea prop: cols="30" rows="10")-->
    </div>
</div>

<div class="row text-center my-2">
    <div class="col-md-6 d-flex justify-content-center">
        <button class = "btn btn-primary btn-md mx-2" type="submit" name="submit">Save</button>
        <a class = "btn btn-primary btn-md mx-2" href="./account.view.php" >Cancel</a>     <!--add url:back to the previous page -->
    </div>                     
</div>


