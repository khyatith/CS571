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
<body onload="StartTimers();" onmousemove="ResetTimers();" >
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

<?php //include 'topmenu.php'?>
<div id="contentnew" style="box-shadow:none">
<?php //$this->load->helper('url');?>

<form method="post" action="<?php echo base_url() ?>index.php/customerlogin/validations">
<table style="margin-left:50px;margin-top:-200px">
<tr>
<td style="color:#CC0000;font-weight:bold;font-size:18px;padding-bottom:7px;padding-top:20px;font-family:'Times New Roman'" colspan="4">LOGIN</td>
</tr>
<tr>
<?php $this->load->helper('url') ?>
<td style="padding-bottom:30px;color:#cc3300">Not Registered?<a href="<?php echo base_url() ?>index.php/customerregister/signup" style="font-size:14pt;color:#663300;text-decoration:underline">SignUp!</a></td>
</tr>
<?php 
if($errormessage!="")
{

?>
<td><h2 style="font-size:12pt;color:#CC0000"> <?php echo $errormessage;?> </h2></td>
<?php
}
?>
<tr>
<td style="padding-bottom:20px"><input type="textfield" value="" name="custusername" placeholder="UserName"/>
</td>
</tr>
<tr>
<td style="padding-bottom:20px"><input type="password" value=""  name="custpassword" placeholder="Password"/>
</td>
</tr>
<tr>
<td><input type="submit" value="LOGIN" id="viewCart" name="SubmitLogin1" style="background-color:#CC0000;width:200px" /></td>

</tr>
</table>
</form>

</div>
<div id="rightContentColumn" style="margin-left:350px">
<table style="background-color:#E49D67;margin-left:75px">
<tr>
<th><i><span style="font-size:1em">View Our Products on Sale</span></i></th>
</tr>
<?php

foreach($query as $row1)
{$productid=$row1->p_id;
?>
<tr>
<td><img src="<?php echo "/CodeIgniter/assets/imgs/$row1->p_image";?>" style="width:200px;height:200px"/></td>
</tr>
<tr>
<?php $this->load->helper('url');?>
<td><a href="<?php echo base_url()?>index.php/cakedetails/cake_details/<?php echo $row1->p_id;?>"  style="color:#CC0000;font-weight:bold;font-size:12pt"><?php echo $row1->p_name;?></a></td>
</tr>
<tr>
<td><strike>$<?php echo $row1->p_price;?></strike>&nbsp;&nbsp;
<?php
/*$sql1=mysql_query("select * from specialsales where p_id='$productid'");
if(!$sql1)
{
die (mysql_error());
}
if($row2=mysql_fetch_array($sql1))
{*/
?>
$<?php echo $row1->ss_price;?></td>
<?php
/*$i++;
if($i==3)
{
exit;
}*/
}

?>

</tr>
</table>

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
      <li><a href="<?php echo base_url() ?>index.php/customerregister/signup/" style="font-size:2em;color:#663300">SignUp!</a></li>
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
<?php $this->load->helper('url')?>
<li><a href="<?php echo base_url() ?>index.php/birthdaycakes/special_sales">Products On Sale</a></li>
</ul>
</div>
	</div>
	<br/><br/>


<article data-role="content">
<?php $this->load->helper('url') ?>
<form method="post" id="myForm" action="<?php echo base_url()?>index.php/customerlogin/validations">
<table style="width:600px;height:600px">

<?php 
if($errormessage!="")
{

?>
<tr><td><h2 style="font-size:30pt;color:#cc0000;background-color:#FDE8D7"> <?php echo $errormessage;?> </h2></td></tr>
<?php
}
?>

<tr>
<td><h2 style="font-size:30pt;color:#ffffff">LOGIN</h2></td></tr>
<tr>
<td>
<?php $this->load->helper('url') ?>
<h1 style="font-size:20pt;color:#ffffff">Not Registered?<a href="<?php echo base_url() ?>index.php/customerregister/signup" style="font-size:12pt;color:#ffffff;text-decoration:underline">SignUp!</h1></a></td>
</tr>

<tr><td><input type="textfield" style="height:3.5em" value="" name="custusername" placeholder="UserName"/></td></tr>



<tr><td><input type="password" style="height:3.5em" value=""  name="custpassword" placeholder="Password"/></td></tr>


<tr><td><input type="submit" value="Login"></td></tr>
<!--<input type="submit" form="myForm" value="LOGIN" name="SubmitLogin1"/>-->
</form>
</article>
<!--<div data-role="listview">

<h2 style="font-size:30pt;color:#ffffff">View Our Products on Sale</h2>
<ul>
<?php

foreach($query as $row1)
{$productid=$row1->p_id;
?>
<li>
<?php
	if($this->session->userdata('customerusername')=="" && $this->session->userdata('customerpassword')=="")
		{
		?>
		<?php $this->load->helper('url')?>
		<a href="<?php echo base_url()?>index.php/customerlogin/customer_login"> </a>
<?php
}
else
{
?>
<?php $this->load->helper('url')?>
<a href="<?php echo base_url()?>index.php/cakedetails/cake_details/<?php echo $row1->p_id;?>">
<?php
}
?>
<img src="<?php echo "/CodeIgniter/assets/imgs/$row1->p_image";?>" style="width:200px;height:200px"/>
<?php $this->load->helper('url');?>
<br/>
<h2  style="color:#CC0000;font-weight:bold;font-size:15pt;color:#ffffff"><?php echo $row1->p_name;?></h2></a>

<h2 style="color:#ffffff">$<?php echo $row1->ss_price;?></h2></li>

<?php
}
?>
</ul>
</div>-->


</div>
</div>
</body>
</html>