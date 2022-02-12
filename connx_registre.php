<?php
session_start();
if (isset($_SESSION["user_id"])) {
    //  ^ redirect to login if the variable is NOT set
        header("Location: main_page.php");
    } 
$l=0;
$_SESSION['usr_connx']=-1;


class user
{
    function __construct($first_name,$last_name,$email,$password,$age) {

        $this->first_name=$first_name;
        $this->last_name=$last_name;
        $this->email=$email;
        $this->password=md5($password);
        $this->age=$age;
    }
}
 

//Dans un premier temps je vais creer des table avec le nom de la famille de l'utilisateur apres je dois pouvoir les créer avec l'ID 
function create_userr(user $user){
    $mydatabase=new PDO("mysql:host=localhost;dbname=mylogin",'root','');
    $p=$user->first_name;
    $l=$user->last_name;
    $e=$user->email;
    $psswd=$user->password;
    $age=$user->age;
    $i=$p.".jpg";
    $sql=$mydatabase->prepare("insert into info_user_connx values(?,?,?)");
    $sql->execute(array('sss',$e,$psswd));
    $sql=$mydatabase->prepare("insert into info_user_navigation values(?,?,?,?,?)");
    $sql->execute(array('sss',$p,$l,$i,$age));
    $mydatabase=null;
}





try
{
  $mydatabase=new PDO("mysql:host=localhost;dbname=mylogin",'root','');
}
catch(exception $e){
    Die("ERROR".$e->getMessage());
}

if(isset($_POST['accept_terms']) and isset($_POST['Prenom']) and isset($_POST['Nom']) and isset($_POST['mail']) and isset($_POST['passwd']))
{
$Prenom =$_POST['Prenom'];
$Nom =$_POST['Nom'];
$Mail =$_POST['mail'];
$psswd =($_POST['passwd']);


    $result=$mydatabase->query("select * from info_user_connx");
    $row=$result->fetch(PDO::FETCH_NUM);
    while($row)
    {
        if($row[1]==$Mail)
        {
            $l=1;//we have a use that have with that adress mail
            break;
        }
        $row=$result->fetch(PDO::FETCH_NUM);
    }
    if($l!=1)
    {
        $t=new user($Prenom,$Nom,$Mail,$psswd,20);
        try
        {
            create_userr($t);
        }
        catch(exception $e)
        {
            Die("Error".$e->getMessage());
        }
        
        $id=$mydatabase->query("select max(id) from info_user_connx");
        $res=$id->fetch(PDO::FETCH_NUM);
        $_SESSION['user_id']=$res[0];
        $_SESSION["photo"]="ressources/anas.jpg";
        header("location:index.php");

    }
    else
    {
        $_SESSION['usr_connx']=3;//that mean I found an exception in the registration operation
        if($l==1) $_SESSION['message']="user already exist!";
        header("location:register.php");
    }
    $mydatabase=null;
}
else
{
    echo "error";
}





?>