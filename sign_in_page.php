<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/conex.css">
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
                <img src='ressources/logo.png' alt='logo'>
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
               <div class="sec_right"><div class="row"><div class="sec3">
                    <div class="col-3"><p id="cnx1" style="font-family: sans-serif;">Sign in</p></div>
                    <div class="col-9">
                        <p><span class="cnx2">ou</span><a href="register.php">create an account</a></p>
                    </div></div>
                </div>
                <div class="sec4">
                    <button id="google">Se connecter avec Google</button><br>
                    <button id="Apple">Se connecter avec Apple</button>
                </div>
                <div class="sec45">
                    <span class="ou">ou</span>
                </div>
        <form action="connx.php" method="POST">
            <div class="sec46">
            <input type="adress" placeholder="E-mail" id="mail" name="mail">
            <?php
            if(isset($_SESSION["usr_connx"])){
                if($_SESSION["usr_connx"]==0)
                {
                    echo $_SESSION["message"];
                }
            }
                ?>
                <input type="password" placeholder="password" id="passwd" name="passwd">
            <?php
            if(isset($_SESSION["usr_connx"])){
                if($_SESSION["usr_connx"]==1)
                {
                    echo $_SESSION["message"];
                }
                else if($_SESSION["usr_connx"]==2)
                {
                    echo "<p class='erreur'>".$_SESSION["message"]."</p>";
                }
            }
            ?>
                </div>
                <div class=" sec5">
                    <div class="mem1">
                        <input type="checkbox" name="Mémoriser">
                        <label for="scales">Mémoriser</label>
                    </div>
                    <div >
                        <button type="submit" id="connx" name="connexion">Se connecter</button>
                    </div>
                </div>
        </form>
        <div><a href="#">Mot de passe oublié?</a></div>
        <div class="regist">
            <span class="cnx0">(ou</span><a href="register.php">create an account</a>)
        </div>
        </div>
        </div>
        </div>
        </div>
</body>
</html>