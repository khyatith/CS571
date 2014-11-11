<html>
<head>
<link rel="stylesheet" type="text/css" href="/CodeIgniter/assets/css/homework3.css">
<script type="text/javascript" src="/CodeIgniter/assets/js/jquery-1.11.1.min.js"></script>
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1.min.js/themes/smoothness/jquery-ui.css">-->
<script src="/CodeIgniter/assets/js/Timeout.js"></script>
</head>
<body onload="StartTimers();" onmousemove="ResetTimers();">
<div id="HomePage" style="display:block">
<?php 
foreach($query1 as $row)
{$count=sizeof($query1);
}
if(sizeof($query1)==0)
{
?>
<div style="margin-left:200px;margin-top:75px;font-size:20pt;color:#663300">You Have not placed any orders yet!</div>
<form method="post" action="Cakedesc.php">
<input type="submit" value="DO SOME SHOPPING" style="font-size:20px;font-weight:bold;height:60px;width:250px;margin-left:350px;margin-top:50px;background-color:#663300" id="continue" name="shopsomemmore">
</form>
<?php
}
else
{
?>
<div style="margin-left:200px;margin-top:75px;font-size:20pt;color:#663300">Your Order Summary</div>
<table style="width:900px;margin-left:-100px;margin-top:40px">
<tr style="background-color:#EFA685;height:50px">
<td style="width:200px"></td>
<td style="color:#CC0000">ORDER NUMBER</td>
<td style="color:#CC0000">DATE</td>
<td style="color:#CC0000">SHIP TO</td>
<td style="color:#CC0000">SHIPPING ADDRESS</td>
</tr>
<?php
foreach($query1 as $row)
{
$ordernumber=$row->OrderId;
 $orderdate=$row->OrderDate;
 $custfname=$row->CustomerFirstName;
 $custlname=$row->CustomerLastName;
 $shippingstreet=$row->ShippingStreet;
 $shippingcity=$row->ShippingCity;
 $shippingstate=$row->ShippingState;
 $shippingzip=$row->ShippingZip;

?>
<tr>
<?php $this->load->helper('url');?>
<td style="width:200px"><a href="<?php echo base_url()?>index.php/onloaddashboard/displaydetails/<?php echo $ordernumber;?>"><h6 style="color:#663300;font-size:10pt;text-decoration:underline;font-weight:normal;margin-left:50px">View Order Details</h6></a></td>
<td>#12345<?php echo $ordernumber;?></td>
<td><?php echo $orderdate;?></td>
<td><?php echo $custfname;?>&nbsp;&nbsp;<?php echo $custlname;?></td>
<td><?php echo $shippingstreet;?><br/>
<?php echo $shippingcity;?><br/>
<?php echo $shippingstate;?><br/>
<?php echo $shippingzip;?>
</td>
</tr>
<?php

}
}

?>
</table>
</div>
</body>
</html>