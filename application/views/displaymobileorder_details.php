<html>

<head>
<link rel="stylesheet" type="text/css" href="/CodeIgniter/assets/css/homework3.css">

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
      <li><a href="<?php echo base_url()?>index.php/onloadmobiledashboard/displaymobiledashboard" style="font-size:2em;color:#663300">My profile</a></li>
      <li><a href="<?php echo base_url() ?>index.php/cakedetails/displaycart" style="font-size:2em;color:#663300">View cart</a></li>
	  <li><a href="<?php echo base_url() ?>index.php/customerlogin/customerlogout" style="font-size:2em;color:#663300">LogOut</a></li>
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
foreach($query as $row)
{
$shippingstreet=$row->ShippingStreet;
$shippingcity=$row->ShippingCity;
$shippingstate=$row->ShippingState;
$shippingzip=$row->ShippingZip;
$billingstreet=$row->BillingStreet;
$billingcity=$row->BillingCity;
$billingstate=$row->BillingState;
$billingzip=$row->BillingZip;
$contact=$row->CustomerContact;
}


?>
<fieldset class="ui-grid-a" style="margin-left:200px;margin-top:50px">
	<div class="ui-block-a" style="background-color:#FDE8D7;height:300px;width:300px"><h3 style="color:#cc0000">SHIPPING ADDRESS</h3>
	<h3 style="font-size:20pt"><br/><?php echo $shippingstreet?><br/><?php echo $shippingcity;?><br/><?php echo $shippingstate;?><br/><?php echo $shippingzip;?></h3></div>
	<div class="ui-block-b" style="background-color:#FDE8D7;height:300px;width:300px"><h3 style="color:#cc0000">BILLING ADDRESS</h3>
	  <h3 style="font-size:20pt"><br/><?php echo $billingstreet?><br/><?php echo $billingcity;?><br/><?php echo $billingstate;?><br/><?php echo $billingzip;?></h3></div>	   
</fieldset>
<br/><br/><br/>
<?php
foreach($query as $row)
{
$cakename=$row->Cake_name;
$quantity=$row->productquantity;
$price=$row->productprice;
$cakeshape=$row->Cake_shape;
$cakesize=$row->Cake_size;
$cakefrosting=$row->Cake_frosting;
$cakefilling=$row->Cake_filling;
$cakeflavour=$row->Cake_flavour;
$cakemessage=$row->Cake_message;
$cakeimage=$row->Cake_image;

?>
<div data-role="collapsible" data-collapsed="false" data-theme="b">
    <?php $this->load->helper('url');?>
	<h1><?php echo $cakename;?></h1>
    <img src="<?php echo "/CodeIgniter/assets/imgs/$cakeimage";?>" style="width:150px;height:150px;float:left">
	<p style="color:#cc0000">
	<?php echo $cakefrosting;?>&nbsp;&nbsp;<?php echo $cakeshape;?>&nbsp;&nbsp;<?php echo $cakesize?>&nbsp;&nbsp;<br/>
	<?php echo $cakeflavour;?>&nbsp;&nbsp;<?php echo $cakefilling;?>&nbsp;&nbsp;<?php echo $cakemessage;?></p>
	<p style="color:#cc0000">Quantity:&nbsp;&nbsp;<?php echo $quantity;?></p>
	<p style="color:#cc0000">ProductPrice:&nbsp;&nbsp;$<?php echo $price;?></p>
	
	</div>



<?php
}
?>

</div>
</div>
</body>
</html>