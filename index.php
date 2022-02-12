    <?php

    session_start();
    if(isset($_POST["lgout"]))
    {
        session_unset();
        session_destroy();
        session_start();
        $_SESSION['usr_connx']=-1;
        $_session['photo']="ressources/user_photo_default.png";
    }
    if(!isset($_SESSION["user_id"]))
    {
        $userr[1]=1;
        $userr[2]="visitor";
    }
    else
    {
        try{
            $mydbase=new PDO("mysql:host=localhost;dbname=mylogin",'root','');
        }
        catch(exception $e){
            Die("ERROR".$e->getMessage());
        }
        $u=$_SESSION['user_id'];
        $user=$mydbase->query("select * from info_user_navigation where id=$u");
        $userr=$user->fetch(PDO::FETCH_NUM);
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style/main_page.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
        <title>profil</title>
    </head>
    <body>
        <div class=" container-fluid sec4">
            <div class="row g-0">
                <div class="col-lg-1 col-xl-1 col-md-1 col-sm-1 col-xs-1 col-1 sec1">
                    <?php 
                    if($userr[1]==1)
                    {
                        echo "<a class='navbar-brand' href='index.php'><img src='ressources/logo.png' alt='logo'></a>";
                    }
                    else
                    {
                        echo "<img src='ressources/logo.png' alt='logo'>";
                    }
                    ?>
                </div>
                <div class="col-lg-7 col-xl-7 col-md-7 col-sm-8 col-xs-8 col-8 sec2">
                    <nav class="navbar navbar-expand-sm  sec2 sec21">
                        <form class="form-inline">
                            <div class="input-group mkk">
                                <input type="text" class="form-control" placeholder="Soirée,boîte de nuit,...">
                                <div class="input-group-prepend search2">
                                    <span class="input-group-text"><a href="" class="lk"><i class="fas fa-search"></i></a></span>
                                </div>
                            </div>    
                        </form>
                    </nav>
                </div>
                <div class="test23">
                    <nav class="navbar navbar-expand-lg col-lg-4 col-xl-4 col-md-4 sec3 navbar-light ">
                        <a class="navbar-brand " href="#">
                        <?php
                        if(!isset($_SESSION["user_id"]))
                            {
                                echo"<img src='ressources/user_photo_default.png' class='rounded-circle' alt='user_photo1' style='width:36px;height:36px'>";
                            }
                        else
                            {
                                echo"<img src=".$_SESSION["photo"]." class='rounded-circle' alt='user_photo2' style='width:40px;height:40px'>";
                            }
                        ?>
                        </a>
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item active">
                                <?php echo "<a class='nav-link lk' href='user_page.php'>".$userr[2]."</a>";?>
                            </li>
                            <li class="nav-item not1 ">
                                <a class="nav-link lk " href="#"><i class="far fa-bell"></i></a>
                            </li>
                            <li class="nav-item">
                                <form action=<?php if(isset($_SESSION["user_id"])){ echo "index.php";}else{echo "sign_in_page.php";}?> method='post'>
                                    <input type='submit'  class='nav-link mk4' 
                                        <?php 
                                        if(isset($_SESSION["user_id"]))
                                                { 
                                                    echo "name='lgout'";
                                                }
                                        if(isset($_SESSION["user_id"]))
                                            { 
                                                echo "value='log out'";
                                            }
                                        else
                                            {
                                                echo "value='sign in'";
                                            }
                                        ?>>
                                </form>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="col-sm-3 col-xs-3 col-3  navbar-light ">
                    <div class="test24">
                    <a class="navbar-brand " href="settings.php">
                        <?php
                        if(!isset($_SESSION["user_id"]))
                            {
                                echo"<img src='ressources/user_photo_default.png' class='rounded-circle' alt='user_photo1' style='width:36px;height:36px'>";
                            }
                        else
                            {
                                echo"<img src=".$_SESSION["photo"]." class='rounded-circle' alt='user_photo2' style='width:40px;height:40px'>";
                            }
                        ?>
                    </a>
                        </div>
                </div>
            </div>
        </div>
        <div class="chat">
            <a href="message.php"><img src="ressources/chat.png"></a>
        </div>
    </body>
</html>