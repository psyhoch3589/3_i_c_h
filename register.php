<?php
session_start();
if(isset($_SESSION["user_id"]))
{
    header("location:main_page.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/reg.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>sign_in</title>
</head>
<body>
    <div class=" container-fluid bg-light sec12">
        <div class="row ">
            <div class="col-5 sec1">
                <img src='logo.png' alt='logo'>
            </div>
        <div class="col-7 sec2">
            <h1>3ich</h1>
        </div>
		</div>
    </div>
    <div class="container-fluid cont">
    <div class="row g-0">
        <div class="col-xl-6 col-lg-6 col-md-6 sec35">
            <div class="sec_left">
                <img src="ressources/photo.png" >
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12 col-xl-6 col-lg-6  sec44">
               <div class="sec_right">
                   <div class="row ">
                       <div class="sec3">
                           <div class="col-lg-7 col-xl-6 col-md-8"><p id="cnx1" style="font-family: sans-serif;">Sign in</p></div>
                           <div class="col-lg-5 col-xl-6 col-md-4">
                               <p><span class="cnx2">ou</span><a href="sign_in_page.php">log in</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="test2" style="margin-left:24%;margin-bottom:20px"><h4>WELCOME ...</h4></div>
        <form action="connx_registre.php" method="POST">
            <div class="sec46">
                <input type="text" placeholder="Prénom" id="inp1" name="Prenom">
            <input type="text" placeholder="Nom" id="inp2" name="Nom">
            <input type="adress" placeholder="E-mail" id="inp1" name="mail">
            <input type="password" placeholder="password" id="inp2" name="passwd">
                </div>
               <?php
        if($_SESSION['usr_connx']==3)
        {
            echo "<div style='color:red'>".$_SESSION['message']."</div>";
        }
        ?>
                <div class=" sec5">
                    <div class="mem1">
                        <input type="checkbox" name="accept_terms">
                        <label for="Mémoriser" style="font-size: 13px;">I agree to <a style="color:blue">3ich Terms</a>. Learn about how we use and protect your data in our <a style="color:blue">Privacy Policy</a>.</label>
                    </div>
                    <div >
                        <button type="submit" id="connx" name="connexion">Creer un compte</button>
                    </div>
                </div>
        </form>
        <button id="google">Se connecter avec Google</button><br>
        </div>
        </div>
        </div>
        </div>
</body>
</html>