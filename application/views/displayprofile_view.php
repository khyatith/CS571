<html>
<head>
<link rel="stylesheet" type="text/css" href="/CodeIgniter/assets/css/homework3.css">
<script type="text/javascript" src="/CodeIgniter/assets/js/jquery-1.11.1.min.js"></script>
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1.min.js/themes/smoothness/jquery-ui.css">-->
<script src="/CodeIgniter/assets/js/Timeout.js"></script>
</head>
<body onload="StartTimers();" onmousemove="ResetTimers();">
<div id="HomePage" style="display:block">

<table style='background-color:#E49D67;width:900px;height:300px;margin-left:50px;margin-top:50px'>
<tr>
<?php foreach($query as $row)
{$this->load->helper('url');
?>
<td style='color:#cc0000'>FIRST NAME</td>
<td><?php echo $row->CustomerFirstName ;?></td>

<td style='border-left:1px solid #cccccc;color:#cc0000'>SHIPPING ADDRESS</td><td style='border-left:1px solid #cccccc;color:#cc0000'>BILLING ADDRESS</td>
<td style='border-left:1px solid #cccccc'><a href="<?php echo base_url()?>index.php/onloaddashboard/display_editprofiledetails/" style='font-size:10pt;font-weight:normal;text-decoration:underline'>Edit Profile Details
<br/><br/>
<?php $this->load->helper('url');?>
<a href="<?php echo base_url()?>index.php/onloaddashboard/editpassworddisplay/" style='font-size:10pt;font-weight:normal;text-decoration:underline'>Edit Password
</td>
</tr><tr><td style='color:#cc0000'>LAST NAME</td>

<td><?php echo $row->CustomerLastName ;?></td>
<?php
if($row->ShippingStreet=="" && $row->ShippingCity=="" && $row->ShippingState=="" && $row->ShippingZip==0)
{
?>
<td style='border-left:1px solid #cccccc'>No Shipping Address Given Yet </td>
<?php
}
else
{
?>
<td style='border-left:1px solid #cccccc'><?php echo $row->ShippingStreet;?><br/><?php echo $row->ShippingCity;?><br/><?php echo $row->ShippingState;?><br/><?php echo $row->ShippingZip;?></td>
<?php
}


if($row->BillingStreet=="" && $row->BillingCity=="" && $row->BillingState=="" && $row->BillingZip==0)
{
?>
<td style='border-left:1px solid #cccccc'>No Billing Address Given Yet </td>
<?php
}
else
{
?>
<td style='border-left:1px solid #cccccc'><?php echo $row->BillingStreet;?><br/><?php echo $row->BillingCity;?><br/><?php echo $row->BillingState;?><br/><?php echo $row->BillingZip;?> </td>
 <?php
 }
 ?>
</tr>
<tr>
<td style='color:#cc0000'>USERNAME</td>
<td><?php echo $row->UserName;?> </td></tr>
<tr>
<td style='color:#cc0000'>EMAIL</td>
<?php
{
if($row->CustomerEmail=="")
{
?>
<td> No Email Given</td>
<?php
}
else
{
?>
<td><?php echo $row->CustomerEmail;?></td>
<?php
}
?>
<td style='border-left:1px solid #cccccc'></td>
</tr>
<tr>
<td style='color:#cc0000'>CONTACT</td>
<?php
if($row->CustomerContact==0)
{
?>
<td> No Contact Given</td>
<?php
}
else
{
?>
<td><?php echo $row->CustomerContact;?></td>
</tr>
</table>
</body></html>
<?php
}
}
}

?>
