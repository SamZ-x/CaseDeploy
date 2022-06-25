<!-- for create/edit articles -->

<!-- 
    to do list
    1, load the content
    2, css  
    3, cancel button url
-->


<div>
    <label for="title">Title</label>
    <input type="text" name="title" id="title">
</div>
<div>
    <label for="decription">Decription</label>
    <textarea name="decription" id="decription"></textarea>     <!--preload the exist content( textarea prop: cols="30" rows="10")-->
</div>
<div>
    <label for="markdown">Markdown</label>
    <textarea name="markdown" id="markdown"></textarea>         <!--preload the exist content( textarea prop: cols="30" rows="10")-->
</div>

<br>
<a href="blog_userpage.php" >Cancel</a>                                           <!--add url:back to the previous page -->
<button type="submit">Save</button>