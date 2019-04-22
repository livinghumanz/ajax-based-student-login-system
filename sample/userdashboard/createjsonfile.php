<?php
function jsonfiledata(){
$user = 'root';
$pass = '';
$db = 'ranetrw';
$db = new mysqli('localhost',$user,$pass,$db) or die("unable to connect");
$sql = "SELECT * FROM ranetrwusers "; 
$userdata=array();
$result = $db->query($sql);//store the value in variable
//fetching the data and storing in variable
if($result->num_rows > 0) 
{
  // output data of each row
  //echo "<table>";
  while($row = $result->fetch_assoc()) 
  {
    $cname=$row["name"];
    $regno=$row["regno"];
    $pno=$row["contact"];
    $mail=$row["email"];
    $password=$row["passwd"];
    $type=$row["type"];
    $userdata[]=array(
        'name'=>$cname,
        'registration_no'=>$regno,
        'contact'=>$pno,
        'mail'=>$mail,
        'password'=>$password,
        'type'=>$type
    );
    //echo "<tr><td>Name</td><td>$cname</td></tr><tr><td>Regno</td><td>$regno</td></tr><tr><td>contact</td><td>$pno</td></tr><tr><td>mailid</td><td>$mail</td></tr>";
    //echo "<tr><td>Password</td><td>$password</td></tr><tr><td>usertype</td><td>$type</td></tr>";
  }
} else {
  echo "<script>alert('0 results')</script> ";
}
//return json_encode($userdata);
/*echo '<per>';
echo json_encode($userdata);
echo'</pre>';

*/
$filename="userdatabasedetails.json";
if(file_put_contents($filename,json_encode($userdata)))
{
    echo "<script>alert('$filename updated')</script> ";
}
else{ echo "<script>alert('error file not created')</script> ";
}
}
jsonfiledata();
?>