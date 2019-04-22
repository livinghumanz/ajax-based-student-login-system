<?php
include 'createjsonfile.php';
echo"<script>alert('match found sucess')</script>";
session_start();
$user = 'root';
$pass = '';
$db = 'ranetrw';
$emailid = $_SESSION["email"];

//$password=pid();
if($_SESSION['logged_in']!=true)
{
  header("Location:/sample/login_page_html/sample.php");
}
//$_SESSION['passwd'];
//establishing connection
$db = new mysqli('localhost',$user,$pass,$db) or die("unable to connect");
//executing sql command
$sql = "SELECT * FROM ranetrwusers where email='$emailid' "; //and passwd=$password"
$result = $db->query($sql);//store the value in variable
//fetching the data and storing in variable
if($result->num_rows > 0) 
{
  // output data of each row
  while($row = $result->fetch_assoc()) 
  {
    $cname=$row["name"];
    $regno=$row["regno"];
    $pno=$row["contact"];

  }
} else {
  echo "0 results";
}
$ordertable=$cname . "order";
if($regno==NULL){$regno="NULL";}
////

if (isset($_GET['newno'])) 
{
  
  goto ab;
}
if(FALSE)
{
ab:
  $nno = $_GET["newno"];
  
 $pupdate="UPDATE `ranetrwusers` SET contact =$nno WHERE email='$emailid'";
 if($db->query($pupdate)){return 1;}
 else {return 0;}
}


?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>USER DASHBOARD</title>
  <!--------------jquerry cdn-------------->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

      <!-- Sidebar -->
      <div class="bg-medium border-right" id="sidebar-wrapper" >
        <div class="sidebar-heading">DASHBOARD </div>
          <div class="list-group list-group-flush">
              <a href="#home" class="list-group-item list-group-item-action bg-medium">HOME</a>
              <!--a href="#" class="list-group-item list-group-item-action bg-medium">TRACK ORDER</a--->
              <a href="#powered" class="list-group-item list-group-item-action bg-medium">CONTACT US</a>
             </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-dark border-bottom">
          <button class="btn btn-primary" id="menu-toggle"><span class="navbar-toggler-icon"></span></button>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              
              <li class="nav-item">
                <a class="nav-link" style="color:white;" onclick="collr();" id="order" href="#placeorder">PLACE ORDER</a>
                <a class="nav-link" style="color:white;" id="sout" href='/sample/fsignup.php?hello=true'>SignOut</a>
              </li>
              
            </ul>
          </div>
        </nav>

        <div class="container-fluid">
         <h1 id="profile" class="mt-4">CUSTOMER PROFILE:</h1>
         
            
            <div class="container1" style="text-align: center;">
              <center><table cellspacing="10" cellpadding="0"  style="text-justify: auto; font-size: 20px;">
  <!-----------------------customer profile table------------------------------>           
              <tr><td><label for="cname" style="padding-right: 10px;"><b>user name:</b></label></td><td><p placeholder="Enter Company name" name="  " id="name"  style="text-align: center; font-size: 20px;"><?php echo($cname);?></p></td></tr>
              <tr><td><label for="regno"><b>Regno:</b></label></td><td><p style=" font-size: 20px; text-align: center;"  name="regno" ><?php echo($regno);?></p></td></tr>
              <tr><td><label for= "mail"><b>Mail id:</b></label></td><td><p name="mail" style="font-size: 20px;" ><?php echo($emailid);?></p></td></tr>
              <tr><td><label for= "pno"><b>Mobile number : &nbsp;</b></label><a onclick="edit();" href="#">&#9997;</a></td><td><p id="pno"  style="font-size: 20px;" name="pno" id="pno" ><?php echo($pno);?></p></td><td style="display:none;" id="hiden"><input type="text" name="nno" id="nno"/><a href="#" onclick="change();">&#9745;</a></td></tr>                    
            </table><br></center>
            </div>
            <!------edit contact no script----->
            <script>
              var count=0;
              function edit(){
                ++count;
                count=count%2;
                if(count==1)
              document.getElementById("hiden").style.display="block";
              if(count==0)
              document.getElementById("hiden").style.display="none";
              }
              </script>
              
              <script>
                function change(){
                  var valu=parseInt(document.getElementById("nno").value);
                $.ajax({
        url: 'dash.php',
        type: 'get',
        data: { "newno": valu },
        success: function(response) { if(response){alert("contact updated");};
        document.getElementById("hiden").style.display="none"; }
    });
    document.getElementById("pno").innerHTML=valu;
                }
              </script>
              
  <!-----------------------track order button------------------------------>           
            <a href="#"><h1 id="track" class="mt-4">TRACK ORDER</h1></a>
            
          
		      <!-- Footer::Start -->
		      <div class="container-fluid" >
						
            <div class="container">	
              <div class="section">
      
        
                <div class="col span_1_of_4">
                  <h2>Businesses</h2>			<div class="textwidget"><a href="/rane-holdings-limited/">Rane Holdings Limited</a><br>
                  <a href="/rane-engine-valve-limited/">Rane Engine Valve Limited</a><br>
                  <a href="/rane-madras-limited/">Rane (Madras) Limited</a><br>
                  <a href="/rane-brake-lining-limited/">Rane Brake Lining Limited</a><br>
                  <a href="/rane-trw-steering-systems-private-limited/">Rane TRW Steering Systems Private Limited</a><br>
                  <a href="/rane-nsk-steering-systems-private-limited/">Rane NSK Steering Systems Private Limited</a><br><br></div>
                </div>

        
                <div class="col span_1_of_4">
                  <h2>Businesses</h2>			<div class="textwidget"><a href="/rane-auto-parts/">Rane Auto Parts</a><br>
                  <a href="/rane-precision-die-casting-inc/">Rane Precision Die Casting Inc.</a><br>
                  <a href="http://www.ranet4u.com">Rane t4u Pvt. Ltd.</a><br>
                </div>    
              </div>   

              <div class="section">
                <div class="col span_1_of_4">
                  <h2>Products</h2>			<div class="textwidget"><a href="/products/#steering">Steering & Suspension Systems</a><br>
                  <a href="/products/#valveTrain">Valve Train Components</a><br>
                  <a href="/products/#frictionMaterial">Friction Material Products</a><br>
                  <a href="/products/#occupantSafety">Occupant Safety Systems</a><br>
                  <a href="/products/#dieCasting">Die Casting Products</a><br>
                  <a href="/rap-products/">Aftermarket Products</a><br>
                  <a href="http://www.ranet4u.com">Connected Mobility Solutions</a><br></div>
                </div>

        
                <div class="col span_1_of_4">
                  <h2 id="conract">Investors</h2>			
                  <div class="textwidget"><a href="/rane-holdings-limited/#investors">Rane Holdings Limited</a><br>
                  <a href="/rane-madras-limited/#investors">Rane (Madras) Limited</a><br>
                  <a href="/rane-engine-valve-limited/#investors">Rane Engine Valve Limited</a><br>
                  <a href="/rane-brake-lining-limited/#investors">Rane Brake Lining Limited</a><br></div>
          
                </div>
              </div>
            </div>
              
         
      
          
                <div id="footer" class="footer_btm" >
                    <div class="container" >
                      <div class="footer_btm_inner"></div>
                      
                    <center><div id="powered" >© 2018 Rane Holdings Limited  | <a href="/sitemap"  target="_blank">Sitemap</a> | <a href="/wp-content/uploads/2018/05/ranetermsofuse.pdf"  target="_blank">Terms of Use</a> | <a href="/wp-content/uploads/2018/05/raneprivacypolicy.pdf"  target="_blank">Privacy Policy</a></div></center>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Footer::END -->
              
              
              
              </div>
              <!-- Page wrapper::END -->

  
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      <!-- Menu Toggle Script -->
      <script>
        $("#menu-toggle").on('click',function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
        });
      </script>
  <script type='text/javascript'>
    var colomatduration = 'fast';
    var colomatslideEffect = 'slideFade';
    </script><link rel='stylesheet' id='background-style-css'  href='http://ranegroup.com/wp-content/plugins/parallax_video_backgrounds_vc/assets/css/background-style.css?ver=4.8.8' type='text/css' media='all' />
    <link rel='stylesheet' id='ultimate-animate-css'  href='http://ranegroup.com/wp-content/plugins/parallax_video_backgrounds_vc/assets/css/animate.css?ver=4.8.8' type='text/css' media='all' />
    <link rel='stylesheet' id='ultimate-style-css'  href='http://ranegroup.com/wp-content/plugins/parallax_video_backgrounds_vc/assets/css/style.css?ver=4.8.8' type='text/css' media='all' />
    <link rel='stylesheet' id='animate-css-css'  href='http://ranegroup.com/wp-content/plugins/js_composer/assets/lib/bower/animate-css/animate.min.css?ver=5.0.1' type='text/css' media='' />
    <script type='text/javascript'>
    
    </script>
    <script type='text/javascript' src='http://ranegroup.com/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=5.0.3'></script>
    <script type='text/javascript' src='http://ranegroup.com/wp-content/plugins/jquery-collapse-o-matic/js/collapse.js?ver=1.6.6'></script>
    <script type='text/javascript' src='http://ranegroup.com/wp-content/plugins/parallax_video_backgrounds_vc/assets/js/SmoothScroll-compatible.min.js?ver=1.5.6'></script>
    <script type='text/javascript' src='http://ranegroup.com/wp-content/plugins/stock-ticker/assets/js/jquery.webticker.min.js?ver=2.2.0.1'></script>
    <script type='text/javascript'>
    
    </script>
    <script type='text/javascript' src='http://ranegroup.com/wp-content/plugins/stock-ticker/assets/js/jquery.stockticker.min.js?ver=3.0.5.4'></script>
    <script type='text/javascript' src='http://ranegroup.com/wp-content/plugins/ultimate-product-catalogue/js/product-page-display.js?ver=1.0'></script>
    <script type='text/javascript' src='http://ranegroup.com/wp-content/plugins/ultimate-product-catalogue/js/jquery.gridster.js?ver=1.0'></script>
    <script type='text/javascript' src='http://ranegroup.com/wp-includes/js/wp-embed.min.js?ver=4.8.8'></script>
    <script type='text/javascript' src='http://ranegroup.com/wp-content/plugins/js_composer/assets/js/dist/js_composer_front.min.js?ver=5.0.1'></script>
    <script type='text/javascript' src='http://ranegroup.com/wp-content/plugins/parallax_video_backgrounds_vc/assets/js/ultimate_bg.js?ver=1.5.6'></script>
    <script type='text/javascript' src='http://ranegroup.com/wp-content/plugins/parallax_video_backgrounds_vc/assets/js/jparallax.js?ver=1.5.6'></script>
    <script type='text/javascript' src='http://ranegroup.com/wp-content/plugins/parallax_video_backgrounds_vc/assets/js/jquery.vhparallax.js?ver=1.5.6'></script>
    <script type='text/javascript' src='http://ranegroup.com/wp-content/plugins/parallax_video_backgrounds_vc/assets/js/jquery.appear.js?ver=1.5.6'></script>
    <script type='text/javascript' src='http://ranegroup.com/wp-content/plugins/parallax_video_backgrounds_vc/assets/js/custom.js?ver=1.5.6'></script>
    <script type='text/javascript' src='//maps.google.com/maps/api/js?sensor=false&#038;key=AIzaSyB4QRKmh98RnRnfG5I2Dzk0aBFNDEEioCI&#038;ver=4.8.8'></script>

    <script>
      document.getElementById("order").addEventListener("mouseover", mouseOver);
      document.getElementById("order").addEventListener("mouseout", mouseOut);
      document.getElementById("sout").addEventListener("mouseover", mouseOver);
      document.getElementById("sout").addEventListener("mouseout", mouseOut);
      
      function mouseOver() {
        document.getElementById("order").style.color = "black";
        document.getElementById("sout").style.color = "black";
      }
      
      function mouseOut() {
        document.getElementById("order").style.color = "white";
        document.getElementById("sout").style.color = "white";
      }
      function collr()
      {
        document.getElementById("order").style.backgroundColor = "rgb(180, 216, 216)";
        document.getElementById("order").style.color = "black";
      }
      </script>
  </body>

</html>
