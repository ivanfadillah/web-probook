<link href="https://fonts.googleapis.com/css?family=Open+Sans|Pathway+Gothic+One|Varela+Round" rel="stylesheet">

<div class = "tabcontent">
    <p class = "detail">
        Pro<span class = "book">-Book</span>
    </p>
    <div class = "hi-username">
        Hi, <?php echo $_COOKIE['username'];?>
    </div>
    <a href="<?php echo Config::APP_URL . '/Controller/LogoutController.php' ?>">
        <div class="logout">
            <img class="logout-button" src="../../public/img/logout-button.png">
        </div>
    </a>
</div>
<div class="navbar">
    <a href="Search.php" <?php if ($_SESSION['page']==='Search') {echo "class='active'";}?> >
        B<span class="navname">ROWSE</span>
    <a id="history" href="History.php" <?php if ($_SESSION['page']==='History') {echo "class='active'";}?> >
        H<span class="navname">ISTORY</span>    
    </a> 
    <a href="Profile.php" <?php if ($_SESSION['page']==='Profile') {echo "class='active'";}?>>
        P<span class="navname">ROFILE</span>    
    </a> 
</div>

    