<html>
<head>
<link rel="stylesheet" type="text/css" href="/CodeIgniter/assets/css/homework3.css">
<script type="text/javascript" src="/CodeIgniter/assets/js/jquery-1.11.1.min.js"></script>
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1.min.js/themes/smoothness/jquery-ui.css">-->
<script src="/CodeIgniter/assets/js/Timeout.js"></script>
</head>
<body onload="StartTimers();" onmousemove="ResetTimers();">
<div id="HomePage" style="display:block">

<div style="margin-left:330px;margin-top:75px;font-size:20pt;color:#663300">Your Order Summary</div>
<table style="background-color:#EFA685;width:150px;margin-left:175px;margin-top:40px" cellspacing="10">
<tr style="height:50px">
<td></td>
<td></td>
<td></td>
<td></td>
<td style="width:200px;font-size:16pt;color:#cc0000">SHIPPING INFORMATION</td>
<td style="border-left:1px bold #ffffff;width:200px;font-size:16pt;color:#cc0000">BILLING INFORMATION</td>
</tr>
<?php
/*foreach($query as $row)
{
$orderid=$row->OrderId;
}
$query1=mysql_query("select * from orders where OrderId='$orderid'");
if(!$query1)
{
die (mysql_error());
}
if($row1=mysql_fetch_array($query1))
{
$shippingstreet=$row1['ShippingStreet'];
$shippingcity=$row1['ShippingCity'];
$shippingstate=$row1['ShippingState'];
$shippingzip=$row1['ShippingZip'];
$billingstreet=$row1['BillingStreet'];
$billingcity=$row1['BillingCity'];
$billingstate=$row1['BillingState'];
$billingzip=$row1['BillingZip'];
$contact=$row1['CustomerContact'];*/

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
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td style="font-size:16pt"><?php echo $shippingstreet;?><br/><?php echo $shippingcity;?><br/><?php echo $shippingstate;?><br/><?php echo $shippingzip;?><br/><span style="color:#CC0000">Contact:</span><?php echo $contact;?>
</td>
<td style="border-left:1px bold #ffffff;font-size:16pt"><?php echo $billingstreet;?><br/><?php echo $billingcity;?><br/><?php echo $billingstate;?><br/><?php echo $billingzip;?><br/><span style="color:#CC0000">Contact:</span><?php echo $contact;?>
</td>
</tr>

</table>
<?php
//}
?>
<table style="margin-top:50px;margin-left:-200px;border:1px solid #ffffff;background-color:#E49D67" cellspacing="30">
<tr style="padding-top:50px">
<td></td>
<td style="color:#CC0000">CAKE NAME</td>
<td style="color:#CC0000">QUANTITY</td>
<td style="color:#CC0000">PRICE</td>
<td style="color:#CC0000">SHAPE</td>
<td style="color:#CC0000">CAKE SIZE</td>
<td style="color:#CC0000">FROSTING</td>
<td style="color:#CC0000">FLAVOUR</td>
<td style="color:#CC0000">FILLING</td>
<td style="color:#CC0000">MESSAGE ON CAKE</td>
</tr>
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
<tr>
<td><img src="<?php echo "/CodeIgniter/assets/imgs/$cakeimage";?>" style="height:100px;width:100px"></td>
<td style="font-size:16pt"><?php echo $cakename;?></td>
<td style="font-size:16pt"><?php echo $quantity;?></td>
<td style="font-size:16pt">$<?php echo $price;?></td>
<td style="font-size:16pt"><?php echo $cakeshape;?></td>
<td style="font-size:16pt"><?php echo $cakesize;?></td>
<td style="font-size:16pt"><?php echo $cakefrosting;?></td>
<td style="font-size:16pt"><?php echo $cakeflavour;?></td>
<td style="font-size:16pt"><?php echo $cakefilling;?></td>
<td style="font-size:16pt"><?php echo $cakemessage;?></td>
</tr>

<?php
}

?>
</table>
</div>
</body>
</html>