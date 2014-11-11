<html>

<head>
<link rel="stylesheet" type="text/css" href="/CodeIgniter/assets/css/homework3.css">

<script type="text/javascript" src="/CodeIgniter/assets/js/jquery-1.11.1.min.js"></script>
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1.min.js/themes/smoothness/jquery-ui.css">-->
<script src="/CodeIgniter/assets/js/Timeout.js"></script>
</head>
<body onload="StartTimers();" onmousemove="ResetTimers();">
<div id="HomePage" style="display:block">
<!--<div id="header">

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
<!--<li style="display:inline-block"><a href="<?php echo base_url() ?>index.php/birthdaycakes/display_cakes/<?php echo $row->pc_id; ?>"><?php echo $row->pc_name;?></a></li>

<?php
}
?>
<a href="<?php echo base_url() ?>index.php/birthdaycakes/special_sales" style="color:#cc0000"><i>Sale Products</i></a>
</ul>
</div>
</div>-->


<div style="color:#cc0000;font-weight:bold;font-size:14pt;margin-left:200px"><?php echo $errormessage;?></div>
<?php 
$this->load->helper('url');
?>
<form method="post" action="<?php echo base_url()?>index.php/onloaddashboard/edit_password/">
<table style="background-color:#E49D67;height:300px;width:300px;margin-left:200px;margin-top:50px">
<tr>
<td><input type="password" name="oldpassword" placeholder="Current Password"></td>
</tr>
<tr>
<td><input type="password" name="newpassword" placeholder="New Password"></td>
</tr>
<tr>
<td><input type="submit" id="continue" value="Update Password" /></td>

</table>
</form>
</div>
</body>
</html>