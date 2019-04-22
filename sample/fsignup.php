<?php
function mail_veri($data) 
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  //-----------signout-----------
  if (isset($_GET['hello'])) 
{
  sout();
}
function sout()
{
  session_start();
  session_destroy();
  $_SESSION = array();
  header('Location:/sample/login_page_html/sample.php');
}



  ?>