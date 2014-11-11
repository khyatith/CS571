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
foreach($query4 as $row)
{ 
?>

<li style="display:inline-block"><a href="<?php echo base_url() ?>index.php/birthdaycakes/display_cakes/<?php echo $row->pc_id; ?>"><?php echo $row->pc_name;?></a></li>

<?php
}
?>
<a href="<?php echo base_url() ?>index.php/birthdaycakes/special_sales" style="color:#cc0000"><i>Sale Products</i></a>
</ul>
</div>
</div>

<div style="float:center;margin-left:175px"><h2 style="color:#CC0000"><i>Grab cakes at lowest possible sales price only with Us!</i></h2></div>
<?php
$this->load->helper('url');
foreach($query2 as $row)
{
?>
<div style="height:200px;width:150px;margin-top:20px;font-size:14pt;display:inline-block;margin-left:50px">

<img src="<?php echo "/CodeIgniter/assets/imgs/$row->p_image";?>" style="margin-top:5px;width:150px;height:150px"/>

<a href="<?php echo base_url()?>index.php/cakedetails/cake_details/<?php echo $row->p_id;?>"><h5 style="font-size:12pt;color:#cc3300;margin-top:-10px;margin-left:-10px"><?php echo $row->p_name; ?></h5></a>

<h5 style="font-size:12pt;color:#663300;font-weight:normal;margin-top:-50px;margin-left:20px">(<?php echo $row->pc_name; ?>)</h5>

<h5 style="font-size:14pt;font-weight:bold;display:inline-block;margin-top:-50px;color:#cc3300;margin-left:20px">$<?php echo $row->ss_price;?></h5><h5 style="font-size:14pt;display:inline-block;font-weight:normal;margin-top:-30px;margin-left:10px"><strike>$<?php echo $row->p_price; ?></strike></h5>
</div>
<?php
}
?>
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
	foreach($query4 as $row) 
	{ $pc_name=$row->pc_name;
	}
	?>
	
	<div style="margin-left:400px">
	<a href="#popupBasic" data-rel="popup" data-theme="b" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-transition="pop">More Categories</a>
<div data-role="popup" id="popupBasic" class="ui-content" data-overlay-theme="b">
<ul data-role="listview" data-theme="b" >
              
<?php 
foreach($query4 as $row)
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
	<div class="ui-content">
	<?php
	foreach($query4 as $row2)
	{$pcid=$row2->pc_id;
	?>
	<div data-role="collapsible" data-collapsed="false" data-theme="b">
	<h1><?php echo $row2->pc_name;?></h1>
	
	<?php
	
	foreach($query2 as $row3)
	{
	if($row3->pc_name==$row2->pc_name)
	{
	?>
	<?php $this->load->helper('url');?>
	<?php
	if($this->session->userdata('customerusername')=="" && $this->session->userdata('customerpassword')=="")
		{
		?>
		<a href="<?php echo base_url()?>index.php/customerlogin/customer_login"> 
		<?php
		}
		else
		{
		?>
	<a href="<?php echo base_url()?>index.php/cakedetails/cake_details/<?php echo $row3->p_id;?>">
	<?php
	}
	?>
	<div style="background-color:#FDE8D7"><p><img src="<?php echo "/CodeIgniter/assets/imgs/$row3->p_image";?>" style="width:150px;height:150px"></p>
	<p style="color:#cc0000"><?php echo $row3->p_name;?><br/>
	<strike>$<?php echo $row3->p_price;?></strike><br/>
	<?php echo $row3->ss_price;?></p></div></a>
	<?php
	}
	}
	}
	?>
	
	
	</div>
	</div>
</div>
</body>
</html>

