<div class = "navbar">
    <ul>
        <li><a href="../home.php">home</a></li>
        <li><a href="index.php">search</a></li>
        <?php
            if(isset($_SESSION['userid']))
                echo "<li><a href=\"Views/user_show.php\">ID: ".$_SESSION['nickname']."</a></li>";
            else
                echo "<li><a href=\"Views/user_login.php\">Login</a></li>";
        ?>

    </ul>
</div>
<div class="main">
    <div class="content">
        <div class="search-title">
            <label>Search</label>
            <img src="images/search.png" alt="searchicon">
        </div>
        <div class="search-bar">
            <form action="Route/route.php" method="get">
                <!-- determine the route -->
                <input type="hidden" name="action" value="select">
                <input type="hidden" name="endpoint" value="globalsearch">

                <select name="searchCategory" id="searchCategory">
                    <option value="username">User Name</option>
                    <option value="articletitle">Article Title</option>
                </select>
                <input  type="text" name="searchInfo" id="searchInfo" placeholder="Input a keyword...">
                <button  type="submit" name="submit" value="search">Go</button>
            </form>
        </div>
    </div>
</div>