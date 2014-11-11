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
<a href="<?php echo base_url() ?>index.php/customerregister/signup"><div id="viewCart">SIGN UP!</div></a>
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

<div style="color:#cc0000;font-weight:bold;margin-top:20px;margin-left:200px;font-size:14pt"><?php echo $errormessage;?></div>
<div id="contentnew" style="box-shadow:none">
<form method="post" action="/CodeIgniter/index.php/customerregister/signup/">


<table style="margin-left:100px;margin-top:-160px">
<tr>
<td><div style="width:300px;background-color:#cc0000;color:#ffffff;font-weight:bold"><?php echo validation_errors(); ?></div></td>

</tr>
<tr>
<td style="color:#CC0000;font-weight:bold;font-size:18px;padding-bottom:7px;padding-top:20px;font-family:'Times New Roman'" colspan="4">CUSTOMER REGISTERATION</td>
</tr>
<?php $this->load->helper('url')?>
<tr>
<td style="padding-bottom:30px;color:#cc3300">Already  a Member?<a href="<?php echo base_url()?>/index.php/customerlogin/customer_login/" style="font-size:12pt;color:#663300;text-decoration:underline">Login</a></td>
</tr>
<tr>
<td style="padding-bottom:20px"><input type="textfield" value="<?php echo set_value('custfname');?>" name="custfname" placeholder="First Name"/>
</td>
</tr>
<tr>

<td style="padding-bottom:20px"><input type="textfield" value="<?php echo set_value('custlname');?>" name="custlname" placeholder="Last Name"/>
</td>
</tr>
<tr>

<td style="padding-bottom:20px"><input type="textfield" value="<?php echo set_value('custuname');?>" name="custuname" placeholder="UserName"/>
</td>
</tr>
<tr>

<td><input type="password" name="custpass" value="<?php echo set_value('custpass');?>" placeholder="Password"/>
</td>
</tr>
<tr>
<td><input type="submit" value="SIGN UP!" id="viewCart" name="signingup" style="background-color:#CC0000;width:200px" /></td>

</tr>
</table>
</form>

</div>
<div id="rightContentColumn" style="margin-left:350px">
<h4 style="text-align:center;"> BAKERY HOURS
<br><br>MONDAY-FRIDAY 9:00AM-10:00PM
<br><br>WEEKENDS      10:00AM-10:00PM</h4>
<p style="font-size:20px;font-weight:bold;color:#CC0000;">
<img src="/CodeIgniter/assets/imgs/phone_icon.jpg" style="margin:0px 30px" align="middle">
(213)509-7049</p>
</div>

</div>
</div>


<div id="mobdiv" data-role="page">

  <div data-role="header" style="background-color:#FFCC99" data-theme="b"> 
   <img src="/CodeIgniter/assets/imgs/lutz-cafe.png" /> 
   <?php 
   if($this->session->userdata('customerusername')=="" && $this->session->userdata('customerpassword')=="")
		{
 $this->load->helper('url');
 ?>
   <ul style="float:right">
   <?php $this->load->helper('url') ?>
      <li><a href="<?php echo base_url()?>index.php/cakedesc/" style="z-index:-10;font-size:2em;color:#663300">Home</a></li>
      <li><a href="<?php echo base_url()?>index.php/cakedetails/displaycart" style="font-size:2em;color:#663300">View Cart</a></li>
      <li><a href="<?php echo base_url() ?>/index.php/customerregister/signup/" style="font-size:2em;color:#663300">SignUp!</a></li>
	  <li><a href="<?php echo base_url() ?>index.php/customerlogin/customer_login" style="font-size:2em;color:#663300">Login</a></li>
    </ul>
	<?php
	}
	else
	{
	$this->load->helper('url');
	?>
	
	<ul style="float:right">
   <?php $this->load->helper('url') ?>
      <li><a href="<?php echo base_url()?>index.php/cakedesc/" style="z-index:-10;font-size:2em;color:#663300">Home</a></li>
      <li><a href="<?php echo base_url()?>index.php/onloadmobiledashboard/displaymobiledashboard" style="font-size:2em;color:#663300">My profile</a></li>
      <li><a href="<?php echo base_url() ?>index.php/cakedetails/displaycart" style="font-size:2em;color:#663300">View cart</a></li>
	  <li><a href="<?php echo base_url() ?>index.php/customerlogin/customerlogout" style="font-size:2em;color:#663300">LogOut</a></li>
    </ul>
	<?php
	}
	?>
	</div>
	    <?php 
	foreach($query as $row) 
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
	<br/><br/>
	<div style="color:#cc0000;font-weight:bold;margin-top:20px;margin-left:100px;font-size:14pt"><?php echo $errormessage;?></div>
<div data-role="content">
	<?php $this->load->helper('url')?>
<form method="post" action="<?php echo base_url()?>index.php/customerregister/signup/">
<table style="margin-left:300px">

<tr>
<td style="color:#ffffff;font-weight:bold;font-size:18px;padding-bottom:7px;padding-top:20px;font-family:'Times New Roman'" colspan="4">CUSTOMER REGISTERATION</td>
</tr>
<?php
if(validation_errors()!="")
{
?>
<tr>
<td><div style="width:300px;background-color:#cc0000;color:#ffffff;font-weight:bold"><?php echo validation_errors(); ?></div></td>

</tr>
<?php
}
?>
<tr>
<td style="color:#ffffff;font-size:15pt">Already  a Member?<a href="/index.php/customerlogin/customer_login/" style="font-size:20pt;color:#ffffff;text-decoration:underline">Login</a></td>
</tr>
<tr>
<td style="padding-bottom:20px"><input type="textfield" value="<?php echo set_value('custfname');?>" name="custfname" placeholder="First Name"/>
</td>
</tr>
<tr>

<td style="padding-bottom:20px"><input type="textfield" value="<?php echo set_value('custlname');?>" name="custlname" placeholder="Last Name"/>
</td>
</tr>
<tr>

<td style="padding-bottom:20px"><input type="textfield" value="<?php echo set_value('custuname');?>" name="custuname" placeholder="UserName"/>
</td>
</tr>
<tr>

<td><input type="password" name="custpass" value="<?php echo set_value('custpass');?>" placeholder="Password"/>
</td>
</tr>
<tr><td><input type="submit" value="SIGN UP!" style="font-size:20pt" /></td></tr>
</table>

</form>
</div>
</div>

</body>
</html>