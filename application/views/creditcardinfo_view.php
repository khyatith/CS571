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

<?php
if($errormessage!="")
{
?>
<div style="background-color:#cc0000;color:#ffffff;font-weight:bold;width:300px;height:40px;margin-top:20px;margin-left:400px"><span style="margin-left:30px"><?php echo $errormessage;?></span></div>
<?php
}
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
}
?>
<div style="color:#CC0000;font-weight:bold;font-size:16pt;margin-left:200px;margin-top:50px">SHIPPING INFORMATION
<br/><span style="color:#663300;font-weight:normal;font-size:12pt"><i>(All fields are to be filled)</i></span></div>
<?php $this->load->helper('url')?>
<form  method="post" name="InfoForm" action="<?php echo base_url()?>index.php/cakedetails/creditcardvalidate/<?php echo $custid;?>">
<table style='width:900px;height:300px;margin-left:-150px;margin-top:50px;display:inline-block'>
<tr>
<td style="color:#cc0000">FIRST NAME*</td>
<td><input type="text" name="firstname" value="<?php if(htmlentities($this->input->post('firstname'),ENT_QUOTES)){echo htmlentities($this->input->post('firstname'),ENT_QUOTES); }else {echo $fname;}?>"/></td>
<td style="color:#cc0000">LAST NAME*</td>
<td><input type="text" name="lastname" value="<?php if(htmlentities($this->input->post('lastname'),ENT_QUOTES)){echo htmlentities($this->input->post('lastname'),ENT_QUOTES); } else { echo $lname;}?>" /></td>
</tr>
<tr>
<td style="color:#cc0000">CONTACT*</td>
<td><input type="text" placeholder="e.g. 123-456-7890" name="customercontact" value="<?php if(htmlentities($this->input->post('customercontact'),ENT_QUOTES)){echo htmlentities($this->input->post('customercontact'),ENT_QUOTES); } else { echo $contact;}?>" /></td>
<td style="color:#cc0000">EMAIL*</td>
<td><input type="text" name="customeremail" value="<?php if(htmlentities($this->input->post('customeremail'),ENT_QUOTES)){echo htmlentities($this->input->post('customeremail'),ENT_QUOTES);} else {echo $email;}?>" /></td>
</tr>
<tr>
<td style="color:#cc0000">SHIPPING ADDRESS*</td>
<td><input type="text" name="shippingstreet" value="<?php if(htmlentities($this->input->post('shippingstreet'),ENT_QUOTES)){echo htmlentities($this->input->post('shippingstreet'),ENT_QUOTES);}else{ echo $shippingstreet;}?>" placeholder="Street" />
<input type="text" name="shippingcity" value="<?php if(htmlentities($this->input->post('shippingcity'),ENT_QUOTES)){echo htmlentities($this->input->post('shippingcity'),ENT_QUOTES);}else{ echo $shippingcity;}?>" placeholder="City" />
<input type="text" name="shippingstate" value="<?php if(htmlentities($this->input->post('shippingstate'),ENT_QUOTES)){echo htmlentities($this->input->post('shippingstate'),ENT_QUOTES);}else{ echo $shippingstate;}?>" placeholder="State" />
<input type="text" name="shippingzip" value="<?php if(htmlentities($this->input->post('shippingzip'),ENT_QUOTES)){echo htmlentities($this->input->post('shippingzip'),ENT_QUOTES);}else{ echo $shippingzip;}?>" placeholder="Zip" />
</td>
<td style="color:#cc0000">BILLING ADDRESS*</td>
<td><input type="text" name="billingstreet" value="<?php if(htmlentities($this->input->post('billingstreet'),ENT_QUOTES)){echo htmlentities($this->input->post('billingstreet'),ENT_QUOTES);}else{ echo $Billingstreet;}?>" placeholder="Street" />
<input type="text" name="billingcity" value="<?php if(htmlentities($this->input->post('billingcity'),ENT_QUOTES)){echo htmlentities($this->input->post('billingcity'),ENT_QUOTES);}else{ echo $Billingcity;}?>" placeholder="City" />
<input type="text" name="billingstate" value="<?php if(htmlentities($this->input->post('billingstate'),ENT_QUOTES)){echo htmlentities($this->input->post('billingstate'),ENT_QUOTES);}else{ echo $Billingstate;}?>" placeholder="State" />
<input type="text" name="billingzip" value="<?php if(htmlentities($this->input->post('billingzip'),ENT_QUOTES)){echo htmlentities($this->input->post('billingzip'),ENT_QUOTES);}else{ echo $Billingzip;}?>" placeholder="Zip" />
</td>
</tr>

</table>
<hr style="margin-left:-200px">
<table style='position:fixed;overflow:scroll;width:400px;height:400px;margin-left:700px;margin-top:-480px;background-color:#E49D67'>
<tr>
<td style="color:#CC0000;font-weight:bold;font-size:16pt;margin-left:200px;margin-top:50px">CART SUMMARY</td>
</tr>
<tr>
<td></td>
<td style="color:#663300;font-weight:bold">Quantity</td>
<td style="color:#663300;font-weight:bold">Price</td>
</tr>
<?php
/*$username=$this->session->userdata('customerusername');
$customer=mysql_query("select * from customers where UserName='$username'");
if($row=mysql_fetch_array($customer))
{$custid1=$row['CustomerId'];
$cartsql=mysql_query("select * from shoppingcarts where CustomerId='$custid1'");
if(!$cartsql)
{
die (mysql_error());
}
while($cartrow=mysql_fetch_array($cartsql))
{*/
foreach($query as $row)
{
/*$productprice=$cartrow['Productprice'];
$productquantity=$cartrow['Productquantity'];
$cakename=$cartrow['Cake_name'];
$cakeimage=$cartrow['Cake_image'];
//$totalprice=$totalprice+$productprice;
$totalprice+=$cartrow['Totalprice'];*/

$cakeimage=$row->Cake_image;
$productquantity=$row->Productquantity;
$productprice=$row->Productprice;
$totalprice+=$row->Totalprice;


?>
<tr>
<td><img src="<?php echo "/CodeIgniter/assets/imgs/$cakeimage";?>" style="width:40px;height:40px"/></td>
<td><?php echo $productquantity;?></td>
<td>$<?php echo $productprice;?></td>
</tr>

<?php
//}
//}
}
?>
<tr style="background-color:#CC0000">
<td></td>
<td></td>
<td style="color:#ffffff;font-weight:bold">$<?php echo $totalprice;?></td>
</tr>
</table>
<div style="color:#CC0000;font-weight:bold;font-size:16pt;margin-left:200px;margin-top:50px">PAYMENT INFORMATION
<br/><span style="color:#663300;font-weight:normal;font-size:12pt"><i>(All fields are to be filled)</i></span></div>

<table style='width:900px;height:300px;margin-left:-150px;margin-top:50px;display:inline-block'>
<tr>
<td style="color:#cc0000">FIRST NAME*</td>
<td><input type="text" name="ccfirstname" placeholder="Card Holder's First Name" value="<?php if($this->input->post('ccfirstname')){echo $this->input->post('ccfirstname');} else{ echo $ccfirstnamenew;}?>"/></td>
<td style="color:#cc0000">LAST NAME*</td>
<td><input type="text" name="cclastname" placeholder="Card Holder's Last Name" value="<?php if($this->input->post('cclastname')){echo $this->input->post('cclastname');} else{ echo $cclastnamenew;}?>"/></td>
</tr>
<tr>
<td style="color:#cc0000">CREDIT CARD NUMBER*</td>
<td><input type="text" name="ccnumber" placeholder="CREDIT CARD NUMBER" value="<?php if($this->input->post('ccnumber')){echo $this->input->post('ccnumber');} else{ echo $ccnumbernew;}?>"/></td>
<td style="color:#cc0000">CVV*</td>
<td><input type="text" value="<?php if($this->input->post('cvv')){echo $this->input->post('cvv');} else{ echo $cvvnew;}?>" name="cvv"/></td>
</tr>
<tr>
<td style="color:#cc0000">EXPIRY DATE*</td>
<td><input style="width:60px" type="text" value="<?php if($this->input->post('validmonth')){echo $this->input->post('validmonth');} else{ echo $expirymonthnew;}?>"  name="validmonth" placeholder="MM"/></td>
<td>
<input type="text" style="width:60px;margin-left:-340px" value="<?php if($this->input->post('validyear')){echo $this->input->post('validyear');} else{ echo $expiryyearnew;}?>"  name="validyear" placeholder="YYYY" /></td>
</tr>
</table>
<div style="margin-top:-100px;margin-left:200px"><input type="submit" value="PLACE ORDER" id="continue" name="submitorder"/></div> 

</form>
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
      <li><a href="<?php echo base_url() ?>/index.php/customerregister/signup/" style="color:#663300">SignUp!</a></li>
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
<br/><br/><br/>
<?php
if($errormessage!="")
{
?>
<div style="background-color:#cc0000;color:#ffffff;font-weight:bold;width:300px;height:40px"><span style="margin-left:30px"><?php echo $errormessage;?></span></div>
<?php
}
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
}
?>
<?php $this->load->helper('url')?>
<form  method="post" name="InfoForm" action="<?php echo base_url()?>index.php/cakedetails/creditcardvalidate/<?php echo $custid;?>"><div data-role="collapsible" data-collapsed="true" data-theme="b">
<h3 style="color:#ffffff">PERSONAL INFORMATION</h3>
<h3 style="color:#cc0000;font-weight:bold"><i>All fields are Required</i></h3>
<div style="background-color:#FDE8D7"><p><input type="text" name="firstname" value="<?php if(htmlentities($this->input->post('firstname'),ENT_QUOTES)){echo htmlentities($this->input->post('firstname'),ENT_QUOTES);} else{ echo $fname;}?>" placeholder="First Name"></p>
<p><input type="text" name="lastname" value="<?php if(htmlentities($this->input->post('lastname'),ENT_QUOTES)){echo htmlentities($this->input->post('lastname'),ENT_QUOTES); } else { echo $lname;}?>"  placeholder="Last Name"></p>
<p><input type="text" name="customeremail" value="<?php if(htmlentities($this->input->post('customeremail'),ENT_QUOTES)){echo htmlentities($this->input->post('customeremail'),ENT_QUOTES);} else {echo $email;}?>"  placeholder="Email"></p>
<p><input type="text" name="customercontact" value="<?php if(htmlentities($this->input->post('customercontact'),ENT_QUOTES)){echo htmlentities($this->input->post('customercontact'),ENT_QUOTES); } else { echo $contact;}?>" placeholder="contact"></p></div>
</div>
<br/><br/><br/>
<div data-role="collapsible" data-collapsed="true" data-theme="b">
<h3 style="color:#ffffff">SHIPPING INFORMATION</h3>
<h3 style="color:#cc0000;font-weight:bold"><i>All fields are Required</i></h3>
<div style="background-color:#FDE8D7;width:100%">
<p><input type="text" name="shippingstreet" value="<?php if(htmlentities($this->input->post('shippingstreet'),ENT_QUOTES)){echo htmlentities($this->input->post('shippingstreet'),ENT_QUOTES);}else{ echo $shippingstreet;}?>" placeholder="Shipping Street "></p>
<p><input type="text" name="shippingcity" value="<?php if(htmlentities($this->input->post('shippingcity'),ENT_QUOTES)){echo htmlentities($this->input->post('shippingcity'),ENT_QUOTES);}else{ echo $shippingcity;}?>" placeholder="Shipping City"></p>
<p><input type="text" name="shippingstate" value="<?php if(htmlentities($this->input->post('shippingstate'),ENT_QUOTES)){echo htmlentities($this->input->post('shippingstate'),ENT_QUOTES);}else{ echo $shippingstate;}?>" placeholder="Shipping State"></p>
<p><input type="text" name="shippingzip" value="<?php if(htmlentities($this->input->post('shippingzip'),ENT_QUOTES)){echo htmlentities($this->input->post('shippingzip'),ENT_QUOTES);}else{ echo $shippingzip;}?>" placeholder="Shipping Zip"></p></div>
</div>
<br/><br/><br/>
<div data-role="collapsible" data-collapsed="true" data-theme="b">
<h3 style="color:#ffffff">BILLING INFORMATION</h3>
<h3 style="color:#cc0000;font-weight:bold"><i>All fields are Required</i></h3>
<div style="background-color:#FDE8D7;width:100%">
<p><input type="text" name="billingstreet" value="<?php if(htmlentities($this->input->post('billingstreet'),ENT_QUOTES)){echo htmlentities($this->input->post('billingstreet'),ENT_QUOTES);}else{ echo $Billingstreet;}?>" placeholder="Billing Street "></p>
<p><input type="text" name="billingcity" value="<?php if(htmlentities($this->input->post('billingcity'),ENT_QUOTES)){echo htmlentities($this->input->post('billingcity'),ENT_QUOTES);}else{ echo $Billingcity;}?>" placeholder="Billing City"></p>
<p><input type="text" name="billingstate" value="<?php if(htmlentities($this->input->post('billingstate'),ENT_QUOTES)){echo htmlentities($this->input->post('billingstate'),ENT_QUOTES);}else{ echo $Billingstate;}?>" placeholder="Billing State"></p>
<p><input type="text" name="billingzip" value="<?php if(htmlentities($this->input->post('billingzip'),ENT_QUOTES)){echo htmlentities($this->input->post('billingzip'),ENT_QUOTES);}else{ echo $Billingzip;}?>" placeholder="Billing Zip"></p></div>
</div>
<br/><br/><br/>
<div data-role="collapsible" data-collapsed="true" data-theme="b">
<h3 style="color:#ffffff">PAYMENT INFORMATION</h3>
<h3 style="color:#cc0000;font-weight:bold"><i>All fields are Required</i></h3>
<div style="background-color:#FDE8D7;width:100%">
<p><input type="text" name="ccfirstname" value="<?php if($this->input->post('ccfirstname')){echo $this->input->post('ccfirstname');} else{ echo $ccfirstnamenew;}?>" placeholder="CC Holder's First Name"></p>
<p><input type="text" name="cclastname" value="<?php if($this->input->post('cclastname')){echo $this->input->post('cclastname');} else{ echo $cclastnamenew;}?>" placeholder="CC Holder's Last Name"></p>
<p><input type="text" name="ccnumber" value="<?php if($this->input->post('ccnumber')){echo $this->input->post('ccnumber');} else{ echo $ccnumbernew;}?>" placeholder="Credit Card Number"></p>
<p><input type="text" name="cvv" value="<?php if($this->input->post('cvv')){echo $this->input->post('cvv');} else{ echo $cvvnew;}?>"  placeholder="CVV"></p>
<p><input type="text" name="validmonth" value="<?php if($this->input->post('validmonth')){echo $this->input->post('validmonth');} else{ echo $expirymonthnew;}?>" placeholder="Credit Card Expiry Month">
<p><input type="text" name="validyear" value="<?php if($this->input->post('validyear')){echo $this->input->post('validyear');} else{ echo $expiryyearnew;}?>"  placeholder="Credit Card Expiry year"></p></div>
</div>
<div data-role="footer" data-position="fixed" data-theme="b" style="background-color:#cc0000;height:10%"> 
<button value="SUBMIT" style="background:#cc0000" name="submit"><h1 style="color:#ffffff">SUBMIT</h1></button>

	
</div>
</form>
</div>
</div>
</body>
</html>