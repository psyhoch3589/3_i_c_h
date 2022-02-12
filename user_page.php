<?php
session_start();
if(isset($_SESSION["user_id"]))
{
    try
    {
        $mydatabase=new PDO("mysql:host=localhost;dbname=mylogin",'root','');
    }
    catch(exception $e)
    {
        Die("error".$e->getMessage());
    }
    $u=$_SESSION["user_id"];
    $result=$mydatabase->query("select * from info_user_navigation where id=$u");
    $res=$result->fetch(PDO::FETCH_NUM);
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php # echo"<title>".$res[1]." ".$res[2]."</title>";?>
</head>
<body>
    <div>

    </div>
</body>
</html>