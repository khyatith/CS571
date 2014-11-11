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
$this->load->helper('url');

?>

<div style="margin-left:300px;color:#cc0000;font-weight:bold;font-size:14pt"><?php echo $errormessage;?></div>

<?php 
foreach($query as $row)
{
$this->session->set_userdata('customerid', $row->CustomerId);
$firstname=$row->CustomerFirstName;
}
?>
<form method="post" action="<?php echo base_url()?>index.php/onloaddashboard/validations/">
<table style="background-color:#E49D67;height:300px;margin-left:-150px;margin-top:50px">
<tr>
<td>FIRST NAME*</td>

<td><input type="text" name="fname" value="<?php if(htmlentities($this->input->post('fname'),ENT_QUOTES)){echo htmlentities($this->input->post('fname'),ENT_QUOTES);} else {echo $firstname;} //$row->CustomerFirstName;?>"/></td>

<td style="border-left:1px solid #cccccc">SHIPPING ADDRESS</td>

<td style="border-left:1px solid #cccccc">BILLING ADDRESS</td>

</tr>
<tr>
<td>LAST NAME*</td>
<td><input type="text" name="lname" value="<?php if(htmlentities($this->input->post('lname'),ENT_QUOTES)){echo htmlentities($this->input->post('lname'),ENT_QUOTES);} else{ echo $row->CustomerLastName;}?>"></td>
<td><input type="text" placeholder="Street" name="shippingstreet" value="<?php if(htmlentities($this->input->post('shippingstreet'),ENT_QUOTES)){ echo htmlentities($this->input->post('shippingstreet'),ENT_QUOTES);} else{  echo $row->ShippingStreet;}?>" />
<input type="text" placeholder="City" name="shippingcity" value="<?php if(htmlentities($this->input->post('shippingcity'),ENT_QUOTES)){ echo htmlentities($this->input->post('shippingcity'),ENT_QUOTES);} else{  echo $row->ShippingCity;}?>" />
<input type="text" placeholder="State" name="shippingstate" value="<?php if(htmlentities($this->input->post('shippingstate'),ENT_QUOTES)){ echo htmlentities($this->input->post('shippingstate'),ENT_QUOTES);} else{  echo $row->ShippingState;}?>" />
<input type="text" placeholder="ZipCode" name="shippingzip" value="<?php if(htmlentities($this->input->post('shippingzip'),ENT_QUOTES)){ echo htmlentities($this->input->post('shippingzip'),ENT_QUOTES);} else{ echo $row->ShippingZip;}?>" />
</td>

<td><input type="text" placeholder="Street" name="billingstreet" value="<?php if(htmlentities($this->input->post('billingstreet'),ENT_QUOTES)){ echo htmlentities($this->input->post('billingstreet'),ENT_QUOTES);} else{ echo $row->BillingStreet;}?>" />
<input type="text" placeholder="City"  name="billingcity" value="<?php if(htmlentities($this->input->post('billingcity'),ENT_QUOTES)){ echo htmlentities($this->input->post('billingcity'),ENT_QUOTES);} else{  echo $row->BillingCity;}?>" />
<input type="text" placeholder="State" name="billingstate" value="<?php if(htmlentities($this->input->post('billingstate'),ENT_QUOTES)){ echo htmlentities($this->input->post('billingstate'),ENT_QUOTES);} else{ echo $row->BillingState;}?>" />
<input type="text" placeholder="ZipCode" name="billingzip" value="<?php if(htmlentities($this->input->post('billingzip'),ENT_QUOTES)){ echo htmlentities($this->input->post('billingzip'),ENT_QUOTES);} else{ echo $row->BillingZip;}?>" />
</td>
</tr>
<tr>
<td>USERNAME*</td>
<td><input type="text" id="username" name="username" value="<?php if(htmlentities($this->input->post('username'),ENT_QUOTES)){ echo htmlentities($this->input->post('username'),ENT_QUOTES);} else{ echo $row->UserName;}?>"/> </td>
</tr>

<tr>
<td>EMAIL</td>
<td><input type="text" name="email" value="<?php if(htmlentities($this->input->post('email'),ENT_QUOTES)){ echo htmlentities($this->input->post('email'),ENT_QUOTES);} else{  echo $row->CustomerEmail;}?>"/></td>
</tr>
<tr>
<td>CONTACT</td>
<td><input type="text" name="contact" value="<?php if(htmlentities($this->input->post('contact'),ENT_QUOTES)){ echo htmlentities($this->input->post('contact'),ENT_QUOTES);} else{  echo $row->CustomerContact;}?>"/></td>
</tr>
<tr>
<td></td>
<td></td>

<td>
<?php $this->load->helper('url');?>
<a href="<?php echo base_url()?>index.php/onloaddashboard/editpassworddisplay/" style='font-size:10pt;font-weight:bold;margin-left:50px;text-decoration:underline;color:#cc0000'>Edit Password</a>

<input type="submit" value="UPDATE DETAILS" id="continue" style="width:200px;margin-left:10px" /></td>
<input type="hidden" name="SubmitUpdateProfile" value="sent" />
</table>

</form>
</div>
</body>
</html>