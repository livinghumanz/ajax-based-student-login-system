<?php
session_start();

$mail=$_POST["mailid"];
$passwd = $_POST["pwd1"];
include 'fsignup.php';
$user = 'root';
$pass = '';
$db = 'ranetrw';
//-----------------------Connection check------------------------
//----------------$conn = new mysqli($servername, $username, $password, $dbname);--------------
$db = new mysqli('localhost',$user,$pass,$db) or die("unable to connect");
echo "connected";


//---------------------validating user ----------------------
$sql = "SELECT passwd FROM ranetrwusers WHERE email = '".$mail."'";
$result = $db->query($sql);

        $row1=$result->fetch_assoc();

        $sql2 = "SELECT email FROM ranetrwusers WHERE passwd = '".$passwd."'";

        $result2=$db->query($sql2);
        $row2=$result2->fetch_assoc();


        if($mail == $row2["email"] && $passwd == $row1["passwd"]) 
        { 
             $_SESSION["logged_in"] = true; 
             $_SESSION["email"]=$mail; 
             
             header('Location:/sample/userdashboard/dash.php');

        }
        else
        {
            echo'The username or password are incorrect!';
        }

//----------------Closing the connection -----------------------------------
end:
  $db->close(); 

?>