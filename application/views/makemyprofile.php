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
<body onload="StartTimers();" onmousemove="ResetTimers();">
<div id="compdiv">
<div id="HomePage" style="display:block">
<div id="header">
<img src="/CodeIgniter/assets/imgs/lutz-cafe.png" />

<div id="rightColumn">
<?php
//var_dump($this);

if($this->session->userdata('customerusername')!="" && $this->session->userdata('customerpassword')!="")
		{
 $this->load->helper('url');
?>

<h6 style="margin-left:-150px">Customer Service |<a href=".php" style="font-size:12pt;color:#663300">My Profile</a>|<a href="<?php echo base_url() ?>index.php/customerlogin/customerlogout" style="font-size:12pt;color:#663300">Logout</a>|<a href="<?php echo base_url()?>index.php/cakedetails/displaycart" style="font-size:12pt;color:#663300"> Shopping Cart<img src="/CodeIgniter/assets/imgs/shopcart.png"></a></h6>
<?php $this->load->helper('url') ?>
<a href="<?php echo base_url()?>index.php/cakedetails/displaycart"><div id="viewCart">VIEW CART</div></a>
<a href="<?php echo base_url() ?>index.php/onloaddashboard/display_dashboard/"><div id="viewCart">MY PROFILE</div></a>
<a href="<?php echo base_url()?>index.php/cakedesc/"><div id="viewCart" style="margin-top:50px">HOME</div></a> 

<?php

}

else
{
$this->load->helper('url');
 ?>
<h6 style="margin-left:-50px">Customer Service | <a href="<?php echo base_url() ?>index.php/customerlogin/customer_login" style="font-size:12pt;color:#663300">Login</a>|<a href="<?php echo base_url()?>index.php/cakedetails/displaycart/>" style="font-size:12pt;color:#663300"> Shopping Cart<img src="/CodeIgniter/assets/imgs/shopcart.png"></a></h6>
<a href="<?php echo base_url()?>index.php/cakedetails/displaycart"><div id="viewCart">VIEW CART</div></a>
<a href="<?php echo base_url() ?>/index.php/customerregister/signup/"><div id="viewCart">SIGN UP!</div></a>
<a href="<?php echo base_url()?>index.php/cakedesc/"><div id="viewCart" style="margin-top:50px">HOME</div></a>

<?php
}

?>
</div>

<div id="TopMenu" 
style="background-color:#FF9966;
height:35px;width:1500px;margin-left:-300px;margin-top:20px">
<ul style="display:inline-block;white-space: nowrap;margin-left:250px">
<?php
$this->load->helper('url');
foreach($query8 as $row)
{ 
?>
<!--<li style="display:inline-block"><a href="birthdaycake_view.php?category=<?php echo $row->pc_name; ?>"><?php echo $row->pc_name; ?></a></li>-->
<li style="display:inline-block"><a href="<?php echo base_url() ?>index.php/birthdaycakes/display_cakes/<?php echo $row->pc_id; ?>"><?php echo $row->pc_name;?></a></li>

<?php
}
?>
<a href="<?php echo base_url() ?>index.php/birthdaycakes/special_sales" style="color:#cc0000"><i>Sale Products</i></a>
</ul>
</div>
</div>


<div style="color:#CC0000;font-weight:bold;font-size:16pt;margin-left:350px;margin-top:50px">MY ACCOUNT</div>
<br/><br/>
<form method="post">
<?php 
if($this->session->userdata('customerusername')!="" && $this->session->userdata('customerpassword')!="")
{ 
$custusername=$this->session->userdata('customerusername');
$this->load->helper('url');

?>
<a href="<?php echo base_url() ?>index.php/onloaddashboard/display_dashboard/<?php echo $custusername;?>" style="margin-left:100px;margin-top:400px;font-size:16pt">DASHBOARD</a> 

<a href="<?php echo base_url() ?>index.php/onloaddashboard/display_profile/<?php echo $custusername;?>" style="margin-left:100px;margin-top:400px;font-size:16pt">VIEW/EDIT PROFILE</a> 

<a href="<?php echo base_url() ?>index.php/onloaddashboard/display_orders/<?php echo $custusername;?>" style="margin-left:100px;margin-top:400px;font-size:16pt">MY ORDERS</a>

<?php
}
?>
</form>
</div>
</div>

</body>
</html>