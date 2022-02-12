<?php
session_start();
if(isset($_SESSION["user_id"]))
{
    header("location:index.php");
}

/*if (!isset($_SESSION["connexion"])) {
        header("Location: acceuil.php");
    }*/
    
    $_SESSION["usr_connx"]=-1;

/*
on va mettre $_SESSION["usr_connx"] comme code d'erreur : si 0:alors l'adress n'est pas saisie
                                                        si 1:le mot de passe est incorrect
                                                        si 2:user not found
                                                        si 3:user already exist(register.php)
                                                        si 4:logout made from index.php
*/

function verify(){
    try
    {
        $mydatabase=new PDO("mysql:host=localhost;dbname=mylogin",'root','');
    }catch(exception $e)
    {
        Die("ERROR".$e->getMessage());
    }
    $result=$mydatabase->query("select * from info_user_connx");
    while($row=$result->fetch(PDO::FETCH_NUM))
    {
        if(strcmp($_POST["mail"],$row[1])==0)
        {
            if(strcmp(md5($_POST["passwd"]),$row[2])==0)
            {
                $_SESSION["user_id"]=$row[0];
                return 1;
            }
        }
    }
    return 0;
}

if(empty($_POST["mail"]))
{
    $_SESSION["message"]="obligatoire";
    $_SESSION["usr_connx"]=0;
    header("Location: sign_in_page.php");
}
else if(empty($_POST["passwd"]))
{
    $_SESSION["message"]="obligatoire!";
    $_SESSION["usr_connx"]=1;
    header("Location: sign_in_page.php");
}
else 
{
    if(verify())
    {
        $_SESSION["photo"]="ressources/anas.jpg";
        header("Location: index.php");
    } 
    else 
    {
        $_SESSION["message"]=" Votre mot de passe est incorrect.Veuillez le vérifier!";
        $_SESSION["usr_connx"]=2;
        header("Location: sign_in_page.php");
    }
}

?>