<?php
/*-----------no need to send any data from this form 
--------------just redirect the user 
-----------------to the home page
*/
session_start();
include 'fsignup.php';
$user = 'root';
$pass = '';
$db = 'ranetrw';
$name = $_POST['cname'];
$regno=$_POST['regno'];
$mail=$_POST['mail'];
$pno=$_POST['pno'];
$passwd=$_POST['pwd1'];
$type='user';
//------------------registring the session values-----------------------
//$_SESSION["mail"]=$mail;

//-----------------------Connection check------------------------
//----------------$conn = new mysqli($servername, $username, $password, $dbname);--------------
$db = new mysqli('localhost',$user,$pass,$db) or die("unable to connect");
echo "connected";
//------------------- check if e-mail address is well-formed------------------
if (empty($mail)) {
    echo"<script> alert('Invalid email format')</script>";
     goto end;
  } else {
    $email = mail_veri($mail);
    
    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        echo"<script> alert('Invalid email format')</script>";
        goto end;
    }
  }
//---------------------checking for no repetation ----------------------

  $sql = "SELECT regno, email FROM ranetrwusers";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
    {
      if ($regno==$row["regno"]) {
       // header('Location:/home/humanz/Public/projects/login_page_html/new_login/sample.html');
        echo"<script>alert('reg no already registered')</script>";
       // header('Location:fsignup.php');
        goto end;
      }
      if ($mail==$row["email"]) {
       // header('Location:/home/humanz/Public/projects/login_page_html/new_login/sample.html');
        echo"<script>alert('mail id already registered')</script>";
        goto end;
      }
    }
} else {
    echo "0 results";
}
$ordertable=$name . "order";
$_SESSION["order"] = $ordertable;
//--------------create ordertable
/*
@ ----
@//$sql1="CREATE TABLE $ordertable(ename text(20),pname varchar(30),pdescription varchar(100),ptype varchar(20),pqty int,pdelevery int,caddress varchar(255))";
@------
@*/
//--------------update the database and create new user---------------
  $sql = "INSERT INTO ranetrwusers VALUES ('$name',$regno,'$mail',$pno,'$passwd','$type')";

if ($db->query($sql) == TRUE) {
  //$_SESSION['passwd']=$passwd;
  echo "<script>alert('New record created successfully');</script>";  
    /*
    @@@@@@@    ORDER TABLE      @@@@@@@@
    
    if($db->query($sql1)==TRUE)
    {
      echo "<script>alert('New record table $ordertable created successfully');</script>";
      */header('Location:/sample/login_page_html/sample.php');/*
    }
    else{ echo "Error: " . $sql1 . "<br>" . $db->error;
          goto end; }
    
    
    @@@@@@@@@                   @@@@@@@@      
    */
   
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}
//----------------Closing the connection -----------------------------------
end:
  $db->close();
  
 

 ?>
