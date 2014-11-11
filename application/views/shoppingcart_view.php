<html>

<head>
<link rel="stylesheet" type="text/css" href="/CodeIgniter/assets/css/homework3.css">

<script type="text/javascript" src="/CodeIgniter/assets/js/jquery-1.11.1.min.js"></script>

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

<!--<form method="post" action="ShoppingCart.php">-->
<?php
if($this->session->userdata('selectedproductid')=="" && $this->session->userdata('customerusername')=="" && $this->session->userdata('customerpassword')=="")
{
?>
<div style="color:#CC0000;font-weigth:bold;font-size:16pt;margin-left:200px;margin-top:150px">You Currently Have no Items in your cart.Select from our variety of different cakes!</div>

<a href="/CodeIgniter/index.php/cakedesc_view.php/"><input type="button" style="margin-left:200px" id="continue" value="Do Some Shopping!"/></a>
<?php
}
else if($this->session->userdata('selectedproductid')!="" && $this->session->userdata('customerusername')=="" && $this->session->userdata('customerpassword')=="")
{
$arraytotalprice=0;
?>
<?php $this->load->helper('url')?>
<form method="post" action="<?php echo base_url()?>index.php/customerlogin/customer_login">
<input type="submit" value="CHECKOUT NOW!" style="font-size:20px;font-weight:bold;height:60px;width:250px;margin-left:850px;margin-top:100px;background-color:#66CC33" name="Checkout" id="continue">

<!--<input type="hidden" value="sent" name="Checkout"/>-->
<?php $this->load->helper('url') ?>
<a href="<?php echo base_url()?>index.php/cakedesc/"><input type="button" value="SHOP SOME MORE" style="font-size:20px;font-weight:bold;height:60px;width:250px;margin-left:-100px;margin-top:-50px;background-color:#663300" id="continue" name="shopsomemmore"></a>
<?php $this->load->helper('url') ?>
<h3 style="margin-left:350px">To manage your cart,<a href="<?php echo base_url()?>index.php/customerlogin/customer_login" style="color:#663300;text-decoration:underline">Login</a> now!</h3>
<table style="width:1200px;margin-left:-100px;margin-top:40px">
<tr> 
<td></td>
<td></td>
<td></td>
</tr>
<tr style="background-color:#EFA685;height:50px">
<td></td>
<td>PRODUCT NAME</td>
<td>FROSTING</td>
<td>SELECTED SHAPE</td>
<td>SELECTED SIZE</td>
<td>SELECTED FLAVOUR</td>
<td>SELECTED FILLING</td>
<td>CAKE MESSAGE</td>

<td>QUANTITY</td>

<td style="background-color:#E49D67">TOTAL PRICE</td>

</tr>
<?php
/*$tot=0;
$user[]=$this->session->userdata['cart'];

foreach($user as $value)
{
for($i=0;$i<count($value);$i++)
{

$id=$value[$i]['cake_id'];
$img=$value[$i]['cake_image'];
$price=$value[$i]['cake_price'];
$quantity=$value[$i]['cake_quantity'];
$priceofone=$price/$quantity;
$tot=$tot+$price;
//echo $cart[$i]['cake_id'];
//echo $array1[$i];

//$priceforone=$arrayprice/$arrayquantity;
?>
<td><img src="<?php echo "/CodeIgniter/assets/imgs/$img";?>" style="width:150px;height:150px"></td>
<td style="color:#CC0000;font-weight:bold"><?php echo $value[$i]['cake_name'];?></td>
<td><?php echo $value[$i]['cake_frosting'];?></td>
<td><?php echo $value[$i]['cake_shape'];?></td>
<td><?php echo $value[$i]['cake_size'];?></td>
<td><?php echo $value[$i]['cake_flavour'];?></td>
<td><?php echo $value[$i]['cake_filling'];?></td>
<td><?php echo $value[$i]['cake_message'];?></td>
<td>&nbsp;&nbsp;<?php echo $value[$i]['cake_quantity'];?></td>


<td style="background-color:#E49D67;color:#CC0000;font-weight:bold">$<?php echo $priceofone; //$value[$i]['cake_price']; ?></td>

</tr>

<?php
//$arraytotalprice+=$tot;
}
}
?>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>

<td  style="background-color:#CC0000;color:#ffffff;font-weight:bold">$<?php echo $tot;?></td>
</tr>
</table>
</form>
<?php
}*/
$arraytotalprice=0.0;
$selectedproductid=$_SESSION['p_d'];

$array1=$_SESSION['cart'];
$arrayimage=$_SESSION['cartforimage'];
$arrayname=$_SESSION['cartforname'];
$arraysize=$_SESSION['cartforsize'];
$arrayflavour=$_SESSION['cartforflavour'];
$arrayfilling=$_SESSION['cartforfilling'];
$arraymessage=$_SESSION['cartformessage'];

$arrayquantity=$_SESSION['cartforquantity'];
//$arrayquantity=$_SESSION['cartforquantity'];

$arrayprice=$_SESSION['cartforprice'];
$arrayfrosting=$_SESSION['cartforfrosting'];
$arraytotalprice=0.0;


for($i=0;$i<sizeof($selectedproductid);$i++)
{

$priceforone=$arrayprice[$i]/$arrayquantity[$i];
?>
<tr>
<!--<td style="width:120px"><a href="RemoveFromShoppingCart.php?removecakeid=<?php echo $selectedproductid;?>&removecakename=<?php echo $arrayname[$i]?>&removeimage=<?php echo $arrayimage[$i];?>&removeshape=<?php echo $array1[$i];?>&removesize=<?php echo $arraysize[$i];?>&removeflavour=<?php echo $arrayflavour[$i];?>&removefilling=<?php echo $arrayfilling[$i];?>&removemessage=<?php echo $arraymessage[$i];?>&removequantity=<?php echo $arrayquantity[$i];?>&removeprice=<?php echo $arrayprice[$i];?>"><h6 style="color:#663300;font-size:10pt;text-decoration:underline;font-weight:normal;margin-left:-100px">Remove From Cart</h6></a><br/>
<a href="EditShoppingCart.php?productid=<?php echo $selectedproductid;?>"><h6 style="color:#663300;font-size:10pt;text-decoration:underline;font-weight:normal;margin-left:-100px">Edit Product</h6></a>
</td>-->
<td><img src="<?php echo "/CodeIgniter/assets/imgs/$arrayimage[$i]"?>" style="width:150px;height:150px"></td>
<td style="color:#CC0000;font-weight:bold"><?php echo $arrayname[$i]?></td>
<td><?php echo $arrayfrosting[$i];?></td>
<td><?php echo $array1[$i];?></td>
<td><?php echo $arraysize[$i];?></td>
<td><?php echo $arrayflavour[$i];?></td>
<td><?php echo $arrayfilling[$i];?></td>
<td><?php echo $arraymessage[$i];?></td>
<td>&nbsp;&nbsp;<?php echo $arrayquantity[$i];?></td>


<td style="background-color:#E49D67;color:#CC0000;font-weight:bold">$<?php echo $priceforone; ?></td>

</tr>

<?php
$arraytotalprice+=$arrayprice[$i];
//echo $arraytotalprice;
}
?>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>

<td  style="background-color:#CC0000;color:#ffffff;font-weight:bold">$<?php echo $arraytotalprice;?></td>
</tr>
</table>
<?php
}
else if($this->session->userdata('customerusername')!="" && $this->session->userdata('customerpassword')!="" )
{

$username=$this->session->userdata('customerusername');

$tot=0;
/*$result=mysql_query("select * from customers where UserName='$username'");
if($row1=mysql_fetch_array($result))
{
$custid=$row1['CustomerId'];
}*/
$custid=$this->session->userdata('cid');
$sql=mysql_query("select * from shoppingcarts where CustomerId='$custid'");
$numrows=mysql_num_rows($sql);

if($numrows==0)
{
?>
<div style="color:#CC0000;font-weigth:bold;font-size:16pt;margin-left:200px;margin-top:150px">You Currently Have no Items in your cart.Select from our variety of different cakes!</div>
<?php $this->load->helper('url')?>
<a href="<?php echo base_url()?>index.php/cakedesc/"><input type="button" style="margin-left:200px" id="continue" value="Do Some Shopping!"/></a>
<?php
}
else 
{
//include 'topmenu.php';
?>
<?php $this->load->helper('url')?>
<form method="post" action="<?php echo base_url()?>index.php/cakedetails/checkoutnow/<?php echo $custid;?>">
<?php $this->load->helper('url')?>
<h3 style="margin-left:400px"><a href="<?php echo base_url()?>index.php/cakedetails/emptycart" style="color:#663300;text-decoration:underline">EMPTY CART!</h3>
<?php $this->load->helper('url')?>
<input type="submit" value="CHECKOUT NOW!" style="font-size:20px;font-weight:bold;height:60px;width:250px;margin-left:700px;margin-top:100px;background-color:#66CC33" name="Checkout" id="continue">


<a href="<?php echo base_url()?>index.php/cakedesc/"><input type="button" value="SHOP SOME MORE" style="font-size:20px;font-weight:bold;height:60px;width:250px;margin-left:-50px;margin-top:-50px;background-color:#663300" id="continue" name="shopsomemmore"></a>


<table style="width:900px;margin-left:-50px;margin-top:40px">
<tr> 
<td></td>
<td></td>
<td></td>
</tr>
<tr style="background-color:#EFA685;height:50px">
<td></td>
<td></td>
<td>PRODUCT NAME</td>
<td>FROSTING</td>
<td>SELECTED SHAPE</td>
<td>SELECTED SIZE</td>
<td>SELECTED FLAVOUR</td>
<td>SELECTED FILLING</td>
<td>CAKE MESSAGE</td>
<td>QUANTITY</td>
<td style="background-color:#E49D67">TOTAL PRICE</td>
</tr>
<?php
}
while($row=mysql_fetch_assoc($sql))
{

$selectedproductid=$row['p_id'];
$rowtotal=$row['Productprice'];
$rowquan=$row['Productquantity'];
$tot=$tot+$row['Totalprice'];
$cakeimage=$row['Cake_image'];
$shoppingid=$row['shoppingcartId'];
?>
<tr>
<?php $this->load->helper('url');?>
<td style="width:120px"><a href="<?php echo base_url()?>index.php/cakedetails/removecakeid/<?php echo $shoppingid;?>"><h6 style="color:#663300;font-size:10pt;text-decoration:underline;font-weight:normal;margin-left:-100px">Remove From Cart</h6></a><br/>
<?php $this->load->helper('url');?>
<a href="<?php echo base_url()?>index.php/cakedetails/updatecakeid/<?php echo $shoppingid;?>"><h6 style="color:#663300;font-size:10pt;text-decoration:underline;font-weight:normal;margin-left:-100px">Edit Product</h6></a>
</td>
<td><img src="<?php echo "/CodeIgniter/assets/imgs/$row[Cake_image]";?>" style="width:150px;height:150px"></td>
<td style="color:#CC0000;font-weight:bold"><?php echo $row['Cake_name'];?></td>
<td><?php echo $row['Cake_frosting'];?></td>
<td><?php echo $row['Cake_shape']?></td>
<td><?php echo $row['Cake_size'];?></td>
<td><?php echo $row['Cake_flavour'];?></td>
<td><?php echo $row['Cake_filling'];?></td>
<td><?php echo $row['Cake_message'];?></td>
<?php $this->load->helper('url');?>
<td><div style="width:25px;height:25px;background-color:#CC0000;color:#ffffff;font-size:14pt;margin-left:5px;font-weight:bold;border-radius:5px"><a href="<?php echo base_url()?>index.php/cakedetails/incquantity/<?php echo $shoppingid;?>/<?php echo $row['Productquantity']?>/<?php echo $row['Productprice'];?>" style="color:#ffffff;margin-left:-5px">+
</a></div>

<div id="inc" name="quan1"><span style="margin-left:2em"><?php echo $row['Productquantity'];?></span></div>
<?php $this->load->helper('url');?>
<div style="width:25px;height:25px;background-color:#CC0000;color:#ffffff;font-size:14pt;margin-left:5px;font-weight:bold;border-radius:5px"><a href="<?php echo base_url();?>index.php/cakedetails/decquantity/<?php echo $shoppingid;?>/<? echo $row['Productquantity'];?>/<?php echo $row['Productprice'];?>" style="color:#ffffff;margin-left:-5px">-
</a></div>
<!--<a href="ShoppingCart.php?quanpid=<?php echo $selectedproductid;?>&quancustid=<? echo $row['CustomerId'];?>"><input type="button" style="width:25px;height:25px;background-color:#CC0000;color:#ffffff;font-size:14pt;font-weight:bold" name="decquantity" value="-"/>-->
<!--<input type="hidden" name="form_secret" id="form_secret" value="<?php echo $_SESSION['FORM_SECRET'];?>" />-->
</td>

<td style="background-color:#E49D67;color:#CC0000;font-weight:bold">$<?php echo $row['Productprice']; ?></td>

<?php
}
if($numrows!=0)
{
?>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td  style="background-color:#CC0000;color:#ffffff;font-weight:bold">$<?php echo $tot;?></td>
</tr>
<?php
}

}
//}
?>
</table>
</form>
<?php
/*$sql=mysql_query("select * from shoppingcarts where CustomerId='$custid'");
$numrows=mysql_num_rows($sql);

/*if($numrows==0)
{
}
//else
//{
?>
<h3><span style="margin-left:300px">People who bought this product also bought</span><h3>
<div style="width:900px;background-color:#EFA685;height:500px;border-radius:10px;display:inline-block">
<?php
$i=0;
$sql=mysql_query("SELECT distinct p_id FROM orderdetails p WHERE p.OrderId= ANY(SELECT distinct c1.OrderId from orderdetails c1 where c1.p_id = ANY(select p_id from shoppingcarts where CustomerId='$custid')) AND !(p.p_id= ANY(select p_id from shoppingcarts where CustomerId='$custid'))"); 
if(!$sql)
{
die (mysql_error());
}
while ($row=mysql_fetch_array($sql))
{
$suggestpid=$row['p_id'];
$newsql=mysql_query("select * from products where p_id='$suggestpid'");
if(!$newsql)
{
die (mysql_error());
}
if($newrow=mysql_fetch_array($newsql))
{
$suggestimg=$newrow['p_image'];
$p_id=$newrow['p_id'];
$salesql=mysql_query("select * from specialsales where p_id='$p_id'");
$numrows=mysql_num_rows($salesql);

?>
<div style="display:inline-block;margin-top:-100px;margin-left:20px">
<img src="<?php echo "/CodeIgniter/assets/imgs/$suggestimg";?>" style="width:150px;height:150px" />
</div>
<div style="display:inline-block;margin-left:-100px;padding:100px;width:150px;margin-top:-20px">
<?php $this->load->helper('url')?>
<a href="<?php echo base_url()?>index.php/cakedetails/cake_details/<?php echo "$p_id";?>" style="font-size:14pt;font-weight:normal;color:#cc0000;text-decoration:underline"><?php echo $newrow['p_name'];?></a><br/>
<?php
if($numrows==0)
{
?>
$<?php echo $newrow['p_price'];?>
<?php
}
else
{
if($salerow=mysql_fetch_array($salesql))
{
?>
<strike>$<?php echo $newrow['p_price'];?></strike><br/>
$<?php echo $salerow['ss_price'];?>

<?php
}
}
?>
</div>
</div>
<?php
$i++;
if($i==4)
{
exit;
}
}

}
}*/

?>

</div>
</div>
<div id ="mobdiv" data-role="page">
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
	foreach($query8 as $row) 
	{ $pc_name=$row->pc_name;
	
	}
	?>
	
	<div style="margin-left:400px">
	<a href="#popupBasic" data-rel="popup" data-history="false" data-theme="b" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-transition="pop">More Categories</a>
<div data-role="popup" id="popupBasic" data-history="false" class="ui-content" data-overlay-theme="b">
<ul data-role="listview" data-theme="b" data-history="false" >
              
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
<div class="ui-content" data-filter="true">


<?php 
$tot=0;
$custid=$this->session->userdata('cid');
$res=$this->db->query("select * from shoppingcarts where CustomerId='$custid'");
if ($res->num_rows() == 0)
{
?>
<h1 style="color:#ffffff;font-weigth:bold">You Currently Have no Items in your cart.Select from our variety of different cakes!</h1>
<br/><br/>
<?php $this->load->helper('url')?>
<a href="<?php echo base_url()?>index.php/cakedesc"><button style="margin-left:200px;width:75%;height:75%;background-color:#cc0000;color:#ffffff" value="Do Some Shopping!"/>DO SOME SHOPPING!</button></a>
<?php
}
else
{
?>
<?php $this->load->helper('url')?>
<form method="post" action="<?php echo base_url()?>index.php/cakedetails/checkoutnow/<?php echo $custid;?>">
<button value="CHECKOUT NOW!" style="font-size:20pt;font-weight:bold;background:#66cc33;width:25%;color:ffffff" name="Checkout">CHECKOUT</button><br/>
<?php
foreach($res->result() as $row)
//while($result=mysql_fetch_array($res))
{//$img=$result['Cake_image'];
//$tot=$tot+$result['Totalprice'];
//$shoppingid=$result['shoppingcartId'];
$img=$row->Cake_image;
$t=$row->Totalprice;
$tot=$tot+$t;
$shoppingid=$row->shoppingcartId;
?>

<div data-role="collapsible" data-collapsed="false" data-theme="b">
    <?php $this->load->helper('url');?>
<p><div style="width:120px"><a href="<?php echo base_url()?>index.php/cakedetails/removecakeid/<?php echo $shoppingid;?>"><h6 style="color:#663300;font-size:20pt;text-decoration:underline;font-weight:normal">Remove</h6></a><br/><br/>
<?php $this->load->helper('url');?>
<a href="<?php echo base_url()?>index.php/cakedetails/updatecakeid/<?php echo $shoppingid;?>"><h6 style="color:#663300;font-size:20pt;text-decoration:underline;font-weight:normal">Edit<h6></a>
</div></p>
	<h1><?php echo $row->Cake_name;?></h1>
    <a href="<?php echo base_url()?>index.php/cakedetails/cake_details/<?php echo $row3->p_id;?>"><img src="<?php echo "/CodeIgniter/assets/imgs/$img";?>" style="width:150px;height:150px;float:left">
	<p style="color:#cc0000">
	<?php echo $row->Cake_frosting;?>&nbsp;&nbsp;<?php echo $row->Cake_shape;?>&nbsp;&nbsp;<?php echo $row->Cake_size;?>&nbsp;&nbsp;<br/>
	<?php echo $row->Cake_flavour;?>&nbsp;&nbsp;<?php echo $rpw->Cake_filling;?>&nbsp;&nbsp;<?php echo $row->Cake_message;?></p>
	<p style="color:#cc0000">Quantity:&nbsp;&nbsp;<?php echo $row->Productquantity;?></p>
	<p style="color:#cc0000">ProductPrice:&nbsp;&nbsp;$<?php echo $row->Productprice;?></p>
	</a>
	</div>
	<?php
	}
	
	
	?>

</div>

<div data-role="footer" data-position="fixed" data-theme="b"> 
	<h1 style="font-size:30pt;color:#ffffff">Total price:&nbsp;&nbsp;$<?php echo $tot;?></h1>
	<?php $this->load->helper('url')?>
	<h1 style="color:#ffffff"><a href="<?php echo base_url() ?>index.php/cakedetails/emptycart/">Empty cart<a><h1>
	
</div>
</form>
<?php
}
?>
</div>

</body>
</html>