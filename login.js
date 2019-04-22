 // Get the modal
 var modal = document.getElementById('id01');
 var modal2= document.getElementById('id02');
 var sin = document.getElementById('sin');
            
// When the user clicks anywhere outside of the modal, close it
 window.onclick = function(event) 
{
    if (event.target == modal) 
    {
        modal.style.display = "none";
    }
}
window.onclick = function(event) 
{
    if (event.target == modal2) 
    {
        modal.style.display = "none";
    }
}
function hide()
{
   if(sin.onclick)
   {
       modal.style.display= "none";
       modal2.style.display= "block";
   }
}

/**************************************Validation of Contact *************************** */
function validate() {
    var pw1 = document.getElementById("pwd1");
    var pw2 = document.getElementById("pwd2");
    
    var pno =document.getElementById("pno");
    /*var para=document.createElement('p');
    var cardright=document.getElementById("cardright");
    var br1=document.getElementById("br1");
    var node;*/
    
  
    if (pw1.value == "") {
      /* node=document.createTextNode("empty password entered ");
       para.appendChild(node);
       cardright.insertBefore(para,br1);*/
      document.getElementById("p1").style.color = "red";
      document.getElementById("p1").innerHTML = " &#9888 password not entered";
    } else if (pw1.value != pw2.value) {
      document.getElementById("p1").style.color = "red";
      document.getElementById("p1").innerHTML = " &#9746 password doesnot match"
    } else if (pw1.value == pw2.value) {
      document.getElementById("p1").style.fontWeight = "bold";
      document.getElementById("p1").style.color = "green";
      document.getElementById("p1").innerHTML = "  password match done &#9745";
    }
  }
  function loadfun(){
    var myVar = setTimeout(function(){
      document.getElementById("loader").style.display = "none";
      document.getElementById("cont").style.display ="block";  
    }, 2000);
  }
  function validate1()
  {
    var pno =document.getElementById("pno");
    var name = document.getElementById("name");
    var n = pno.value.length;
    if (name.value == "")
    alert("enter Company name first");
    if (pno.value=='9876543210'||pno.value=='1234567890') 
    {
      alert("wrong phone number :");
      pno.focus;    
    }
    else if (isNaN(pno.value)) 
    {
      alert("enter a valid phone number");    
    }
    else if (n != 10) 
    {
      alert("check your number length");  
    } 
   
      validate();
  }
  function popup1()
  {
    document.getElementById('id01').style.display='none';
    document.getElementById('id02').style.display='block';
  }
  function popup2()
  {
    document.getElementById('id01').style.display='block';
    document.getElementById('id02').style.display='none';
  }