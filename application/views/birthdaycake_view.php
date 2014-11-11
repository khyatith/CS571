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
foreach($query2 as $row)
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
<?php
$this->load->helper('url');
foreach($query as $row)
{ 

?>
<div id="contentnew" style="margin-left:20px;display:inline-block;margin-top:100px">

<img src="<?php echo "/CodeIgniter/assets/imgs/$row->p_image" ?>" alt="<?php echo $row->p_name; ?>" style="width:150px;height:150px;margin-top:50px"/>
<!--<a href="CakeDetails.php?cakeid=<?php echo "$cakeid";?>" style="font-size:12pt;color:#cc3300;margin-left:-10px">-->
<a href="<?php echo base_url()?>index.php/cakedetails/cake_details/<?php echo $row->p_id;?>"><h5 style="font-size:12pt;color:#cc3300;margin-left:-10px;margin-top:-10px"><?php echo $row->p_name; ?></h5></a>

<div style="margin-left:18px;font-weight:bold;font-size:14pt;margin-top:-40px">$<?php echo $row->p_price; ?></div>

<br/><br/><br/><br/><br/>
</div>
<?php
}
?>
<div id="rightContentColumn" style="margin-left:5px">
<table style="background-color:#E49D67;margin-left:30px">
<tr>
<th><i><span style="font-size:1em">View Our Products on Sale</span></i></th>
</tr>
<?php
$this->load->helper('url');
foreach($query1 as $row1)
{ 
$p_id=$row1->p_id;
?>
<tr>
<td><img src="<?php echo "/CodeIgniter/assets/imgs/$row1->p_image" ;?>" style="width:200px;height:200px"/></td>
</tr>
<tr>
<td><a href="<?php echo base_url()?>index.php/cakedetails/cake_details/<?php echo $row1->p_id;?>"  style="color:#CC0000;font-weight:bold;font-size:12pt"><?php echo $row1->p_name;?></a></td>
</tr>
<tr>
<td><strike>$<?php echo $row1->p_price;?></strike>&nbsp;&nbsp;
<?php
//$sql=mysql_query("select ss_price from specialsales where p_id='$p_id'");

//foreach($query->result() as $row)
//{
?>
$<?php echo $row1->ss_price;//$res['ss_price'];?></td></tr>
<?php

}

?>
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
      <li><a href="<?php echo base_url()?>index.php/cakedesc/" style="z-index:-10;color:#663300">Home</a></li>
      <li><a href="<?php echo base_url()?>index.php/cakedetails/displaycart" style="color:#663300">View Cart</a></li>
      <li><a href="<?php echo base_url() ?>index.php/customerregister/signup/" style="color:#663300">SignUp!</a></li>
	  <li><a href="<?php echo base_url() ?>index.php/customerlogin/customer_login" style="color:#663300">Login</a></li>
    </ul>
	<?php
	}
	else
	{
	$this->load->helper('url');
	?>
	<ul style="float:right">
   <?php $this->load->helper('url') ?>
      <li><a href="<?php echo base_url()?>index.php/cakedesc/" style="z-index:-10;color:#663300">Home</a></li>
      <li><a href="<?php echo base_url()?>index.php/onloadmobiledashboard/displaymobiledashboard" style="color:#663300">My profile</a></li>
      <li><a href="<?php echo base_url() ?>index.php/cakedetails/displaycart" style="color:#663300">View cart</a></li>
	  <li><a href="<?php echo base_url() ?>index.php/customerlogin/customerlogout" style="color:#663300">LogOut</a></li>
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
foreach($query2 as $row)
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
	<div style="margin-left:400px"><h2 style="color:#ffffff;font-family:'Pacifico'"><?php echo $pc_name;?></h2></div>
    <br/>

		<div class="ui-content" style="margin-left:300px" data-filter="true">
		
		<?php
		foreach($query as $row)
		{ $p_image=$row->p_image;
		$p_name=$row->p_name;
		$p_id=$row->p_id;
		$p_price=$row->p_price;
		
		
		?>
		
		<div class="ui-grid-b" style="display:inline">
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
	<a href="<?php echo base_url()?>index.php/cakedetails/cake_details/<?php echo $row->p_id;?>"> 
	<?php
	}
	?>
	<div class="ui-block-a"><img src="/CodeIgniter/assets/imgs/<?php echo $p_image;?>" style="width:310px;height:310px"class="ui-li-thumb">
	<br/><h2 style="color:#ffffff;font-family: 'Pacifico', cursive;font-weight:normal;font-size:2em"><?php echo $p_name;?></h2></a><br/><h2 style="text-shadow:none;margin-top:-10px">$<?php echo $p_price;?></h2></div>
	
</div>
			<?php
			}
			?>
			
		
		
	</div>
	
	
</div>

</body>
</html>