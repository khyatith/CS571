<html>
<head>
<link rel="stylesheet" type="text/css" href="/CodeIgniter/assets/css/homework3.css"/>
<script type="text/javascript" src="/CodeIgniter/assets/js/jquery-1.11.1.min.js"></script>
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1.min.js/themes/smoothness/jquery-ui.css">-->
<script src="/CodeIgniter/assets/js/Timeout.js"></script>
<script>
$(document).ready(function()
{
var width=$(window).width();
if(width>=1000)
{
$('head').append('<link rel="stylesheet" type="text/css" href="/CodeIgniter/assets/css/homework3.css">');
$("#compdiv").show();
$("#mobdiv").hide();
}
else if(width<1000)
{
$('head').append('<meta name="viewport" content="width=device-width, initial-scale=1>');
$('head').append('<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css">');
$('head').append('<script src="http://code.jquery.com/jquery-1.10.2.min.js">');
$('head').append('<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js">');

$('head').append('<link rel="stylesheet" type="text/css" href="/CodeIgniter/assets/css/mobile.css">');
$('head').append('<link href="http://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet" type="text/css">');
$('head').append('<script src="/CodeIgniter/assets/js/Timeout.js">');
$("#compdiv").hide();
$("#mobdiv").show();



}});

</script>
</head>
<body>
<div id="mobdiv" data-role="page">

<div data-role="header" style="background-color:#FFCC99" data-theme="b"> 
   <img src="/CodeIgniter/assets/imgs/lutz-cafe.png" /> 
   <?php
	$this->load->helper('url');
	?>
	<ul style="float:right">
   <?php $this->load->helper('url') ?>
      <li><a href="<?php echo base_url()?>index.php/cakedesc/" style="z-index:-10;font-size:2em;color:#663300">Home</a></li>
      <li><a href="<?php echo base_url()?>index.php/onloadmobiledashboard/displaymobiledashboard" style="color:#663300">My profile</a></li>
      <li><a href="<?php echo base_url() ?>index.php/cakedetails/displaycart" style="color:#663300">View cart</a></li>
	  <li><a href="<?php echo base_url() ?>index.php/customerlogin/customerlogout" style="color:#663300">LogOut</a></li>
    </ul>
	
	</div>
  
    <?php 
	foreach($query8 as $row) 
	{ $pc_name=$row->pc_name;
	}
	?>
	
	<div style="margin-left:400px">
	<a href="#popupBasic" data-rel="popup" data-theme="b" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-transition="pop">More Categories</a>
<div data-role="popup" id="popupBasic" class="ui-content" data-overlay-theme="b">
<ul data-role="listview" data-theme="b" >
              
<?php 
foreach($query8 as $row)
{  
?>
<?php $this->load->helper('url');?>
  <li><a href="<?php echo base_url() ?>index.php/birthdaycakes/display_cakes/<?php echo $row->pc_id; ?>"><?php echo $row->pc_name;?></a></li>
               

         
<?php
}
?>
<?php $this->load->helper('url');?>
<li><a href="<?php echo base_url() ?>index.php/birthdaycakes/special_sales">Products On Sale</a></li>
</ul>
</div>
</div>
<div class="ui-content">
<?php
if($errormessage!="")
{
?>
<div style="color:#cc0000;font-weight:bold"><?php echo $errormessage;?></div>


<?php 
}


$this->load->helper('url');

?>


<?php
foreach($query as $row)
{
$fname=$row->CustomerFirstName;
$lname=$row->CustomerLastName;
$shippingstreet=$row->ShippingStreet;
$shippingcity=$row->ShippingCity;
$shippingstate=$row->ShippingState;
$shippingzip=$row->ShippingZip;
$Billingstreet=$row->BillingStreet;
$Billingcity=$row->BillingCity;
$Billingstate=$row->BillingState;
$Billingzip=$row->BillingZip;
$username=$row->UserName;
$email=$row->CustomerEmail;
$contact=$row->CustomerContact;
$custid=$row->CustomerId;
$customerid=$this->session->userdata('cid');



}
?>
<form  method="post" name="InfoForm" action="<?php echo base_url()?>index.php/onloadmobiledashboard/mobilevalidations/">
<?php $this->load->helper('url')?>
<a href="<?php echo base_url()?>index.php/onloadmobiledashboard/displaymobileordersummary" value="CHECKOUT NOW!" style="background-color:#66CC33;float:right;margin-right:150px;height:2em" type="button" name="Checkout" id="continue">VIEW ORDERS</a>
<br/><br/><br/>
<div data-role="collapsible" data-collapsed="false" data-theme="b">
<h3 style="color:#ffffff">PERSONAL INFORMATION</h3>
<h3 style="color:#cc0000;font-weight:bold"><i>All fields are Required</i></h3>
<div style="background-color:#FDE8D7;width:100%"><p><input type="text" name="fname" value="<?php if(htmlentities($this->input->post('fname'),ENT_QUOTES)){echo htmlentities($this->input->post('fname'),ENT_QUOTES);} else{ echo $fname;}?>" placeholder="First Name"></p>
<p><input type="text" name="lname" value="<?php if(htmlentities($this->input->post('lname'),ENT_QUOTES)){echo htmlentities($this->input->post('lname'),ENT_QUOTES); } else { echo $lname;}?>"  placeholder="Last Name"></p>
<p><input type="text" name="email" value="<?php if(htmlentities($this->input->post('email'),ENT_QUOTES)){echo htmlentities($this->input->post('email'),ENT_QUOTES);} else {echo $email;}?>"  placeholder="Email"></p>
<p><input type="text" name="contact" value="<?php if(htmlentities($this->input->post('contact'),ENT_QUOTES)){echo htmlentities($this->input->post('contact'),ENT_QUOTES); } else { echo $contact;}?>" placeholder="contact"></p></div>
<p><input type="text" name="username" value="<?php if(htmlentities($this->input->post('username'),ENT_QUOTES)){echo htmlentities($this->input->post('username'),ENT_QUOTES); } else { echo $username;}?>" placeholder="UserName"></p></div>
</div>

<br/><br/><br/>
<div data-role="collapsible" data-collapsed="true" data-theme="b">
<h3 style="color:#ffffff">SHIPPING INFORMATION</h3>
<h3 style="color:#cc0000;font-weight:bold"><i>To change your shipping Information,access our web based site</i></h3>
<?php echo htmlentities($this->input->post('shippingstreet'),ENT_QUOTES);?>
<div style="background-color:#FDE8D7;width:100%">
<p><input type="text" name="shippingstreet" value="<?php if(htmlentities($this->input->post('shippingstreet'),ENT_QUOTES)){echo htmlentities($this->input->post('shippingstreet'),ENT_QUOTES);}else{ echo $shippingstreet;}?>" placeholder="Shipping Street" readonly></p>
<p><input type="text" name="shippingcity" value="<?php //if(htmlentities($this->input->post('shippingcity'),ENT_QUOTES)){echo htmlentities(this->input->post('shippingcity'),ENT_QUOTES);} else{ echo $shippingcity;}?>" placeholder="Shipping City" readonly></p>
<p><input type="text" name="shippingstate" value="<?php if(htmlentities($this->input->post('shippingstate'),ENT_QUOTES)){echo htmlentities($this->input->post('shippingstate'),ENT_QUOTES);}else{ echo $shippingstate;}?>" placeholder="Shipping State" readonly></p>
<p><input type="text" name="shippingzip" value="<?php if(htmlentities($this->input->post('shippingzip'),ENT_QUOTES)){echo htmlentities($this->input->post('shippingzip'),ENT_QUOTES);}else{ echo $shippingzip;}?>" placeholder="Shipping Zip" readonly></p></div>
</div>
<br/><br/><br/>
<div data-role="collapsible" data-collapsed="true" data-theme="b">
<h3 style="color:#ffffff">BILLING INFORMATION</h3>
<h3 style="color:#cc0000;font-weight:bold"><i>To change your billing Information,access our web based site</i></h3>
<div style="background-color:#FDE8D7;width:100%">
<p><input type="text" name="billingstreet" value="<?php if(htmlentities($this->input->post('billingstreet'),ENT_QUOTES)){echo htmlentities($this->input->post('billingstreet'),ENT_QUOTES);}else{ echo $Billingstreet;}?>" placeholder="Billing Street" readonly></p>
<p><input type="text" name="billingcity" value="<?php if(htmlentities($this->input->post('billingcity'),ENT_QUOTES)){echo htmlentities($this->input->post('billingcity'),ENT_QUOTES);}else{ echo $Billingcity;}?>" placeholder="Billing City" readonly></p>
<p><input type="text" name="billingstate" value="<?php if(htmlentities($this->input->post('billingstate'),ENT_QUOTES)){echo htmlentities($this->input->post('billingstate'),ENT_QUOTES);}else{ echo $Billingstate;}?>" placeholder="Billing State" readonly></p>
<p><input type="text" name="billingzip" value="<?php if(htmlentities($this->input->post('billingzip'),ENT_QUOTES)){echo htmlentities($this->input->post('billingzip'),ENT_QUOTES);}else{ echo $Billingzip;}?>" placeholder="Billing Zip" readonly ></p></div>
</div>
<br/><br/><br/>

<div data-role="footer" data-position="fixed" data-theme="b" style="background-color:#cc0000;height:10%"> 
<button value="UPDATE" style="background:#cc0000;height:100%" name="submit"><h1 style="color:#ffffff">UPDATE</h1></button>

</div>
</form>
</div>

</body>
</html>