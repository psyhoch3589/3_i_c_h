<?php


try
{
    $mydatabase = new PDO('mysql:host=localhost;dbname=store','root','');
    $mydatabase->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $sql = $mydatabase->prepare("insert into customers(first_name,last_name) VALUES (?,?)");

    $firstname="test2.0";
    $lastname="test2.2";
    $sql->execute(array($firstname,$lastname));

}catch(exception $e){
    Die("ERROR".$e->getMessage());
}

$mydatabase= null;



?>