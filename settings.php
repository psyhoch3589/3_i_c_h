<?php
session_start();
/*if(!isset($_SESSION["user_id"]))
{
    $userr[1]="";#avant la modification c'etait egale a 1 il peut qu'il y ait des erreur liée a cette modification
    $userr[2]="visitor";
}*/
if(isset($_SESSION["user_id"]))
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="style/settings.css">
    <title>settings</title>
</head>
<body>
    <div id="sec1">
        <h1>Settings</h1>
    </div>
    <div class="container-fluid sec2">
        <div class="row set1">
            <div class="col-9">
                <?php if(isset($_SESSION["user_id"]))
                        {
                            echo "<a href='user_page.php'><p>".$userr[1]." ".$userr[2]."</p></a>";
                        }
                      else
                        {
                            echo "<p>visitor</p>";
                        }
                ?>
            </div>
            <div class="col-3">
                <?php
                if(isset($_SESSION["user_id"])){
                echo"<img src=".$_SESSION["photo"]." class='rounded' alt='user_photo2' style='width:40px;height:40px'>";
                }
                ?>
            </div>
        </div>
        <div class="row set1">
            <div class="col-7">
                <p>terms and conditions</P>
            </div>
            <div class="col-5"></div>
        </div>
    </div>
    <div class="set2">
        <form action=<?php if(isset($_SESSION["user_id"])){ echo "index.php";}else{echo "sign_in_page.php";}?> method='post'>
            <button type='submit'  class="btn_connx" <?php if(isset($_SESSION["user_id"])){ echo "name='lgout'";}?>>
                <?php if(isset($_SESSION["user_id"])){ echo "log out";}else{echo "sign in";}?>
            </button>
        </form>
    </div>
</body>
</html>