<html>

<head>
<link rel="stylesheet" type="text/css" href="/CodeIgniter/assets/css/homework3.css">

<script type="text/javascript" src="/CodeIgniter/assets/js/jquery-1.11.1.min.js"></script>
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1.min.js/themes/smoothness/jquery-ui.css">-->
<script src="/CodeIgniter/assets/js/Timeout.js"></script>
<script>
$(document).ready(function()
{
$('#Drop1').change(function()
{

var drop1=$(this).val();
<?php foreach($query as $row)
{
?>
var cakeid = <?php echo $row->p_id;?>;
<?php
}
?>
//window.alert(cakeid);
var data1="drop1="+drop1;
data1+="&cakeid="+cakeid;
//window.alert(data1);
$.ajax
({
<?php $this->load->helper('url');?>
type: "POST",
url: "<?php echo base_url()?>index.php/cakedetails/changecakesize",
data: "drop1="+drop1+"&cakeid="+cakeid,
cache: false,
success: function(html)
{

//window.alert(html);
$("#Drop2").html(html);

} 
});

});
$('#quan').change(function()
{

var quantity1=$(this).val();
var price= $("#myDiv").text();
//window.alert(quantity1);
//window.alert(price);
var cakeprice=price*quantity1;

$("#total").val(cakeprice);
});
$('#quan1').change(function()
{
var quantity1=$(this).val();
var price= $("#myDiv1").text();
//window.alert(quantity1);
//window.alert(price);
var cakeprice=price*quantity1;

$("#total").val(cakeprice);
});

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

$('#Drop12').change(function()
{

var drop1=$(this).val();
//window.alert(drop1);
<?php foreach($query as $row)
{
?>
var cakeid = <?php echo $row->p_id;?>;
<?php
}
?>

var data1="drop1="+drop1;
data1+="&cakeid="+cakeid;
//window.alert(data1);
$.ajax
({
<?php $this->load->helper('url');?>
type: "POST",
url: "<?php echo base_url()?>index.php/cakedetails/changecakesize",
data: "drop1="+drop1+"&cakeid="+cakeid,
cache: false,
success: function(html)
{

//window.alert(html);
$("#Drop13").html(html);

} 
});

});

$('#quan1').change(function()
{
var quantity1=$(this).val();
var price= $("#myDiv1").text();
//window.alert(quantity1);
//window.alert(price);
var cakeprice=price*quantity1;

$("#total1").val(cakeprice);
});

}


});
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
foreach($query5 as $row)
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
<div id="content">

<?php
foreach($query as $row1)
{
$cakeid=$row1->p_id;
$this->session->set_userdata('selectedproductid',$cakeid);
$cakeimage=$row1->p_image;
$cakename=$row1->p_name;
$cakefrosting=$row1->p_frosting;
}
?>
<img src="<?php echo "/CodeIgniter/assets/imgs/$row1->p_image"; ?>" style="width:200px;height:200px" />
<br/><br/><br/>
<table style="background-color:#EFA685;margin-left:-20px">
<tr><h3  style="margin-left:5px;color:#cc0000;font-weight:bold;font-size:14pt">You May Also Like</h3></tr>
<?php

foreach($query3 as $row3)
{
$suggestimg=$row3->Cake_image;
$suggestid=$row3->p_id;
?>

<tr>
<td><img src="<?php echo "/CodeIgniter/assets/imgs/$suggestimg";?>" style="width:150px;height:150px;margin-left:20px"/> </td>
</tr>
<tr>
<?php $this->load->helper('url');?>
<td><a href="<?php echo base_url()?>index.php/cakedetails/cake_details/<?php echo "$suggestid";?>" style="font-size:10pt;font-weight:normal;color:#cc0000;text-decoration:underline"><?php echo $row3->Cake_name;?></a></td>
</tr>
<?php
$price=mysql_query("select * from specialsales where p_id='$suggestid'");
if(!$price)
{
die (mysql_error());
}
$numrows=mysql_num_rows($price);
/*$count = 0;
foreach($query4 as $row4)
{
$count++;
}
if($count==0)
{*/
if($numrows==0)
{
?>
<tr>
<td>$<?php echo $row3->productprice;?></td>
</tr>
<?php
}
elseif($numrows>0)
{ 
if($salerow=mysql_fetch_array($price))
{$saleprice=$salerow['ss_price'];
?>
<tr>
<td><strike>$<?php echo $saleprice;?></strike>&nbsp;&nbsp;$<?php echo $row3->productprice;?></td>
</tr>
<?php
}
}
}

?>
</table>
</div>
<div id="contentRight">
<div id="cakeheader" name="p_name"><h3 style="font-family:'Times New Roman','serif';color:#663300;font-size:16pt;margin-top:0px;"><?php echo $row1->p_name; ?></h3></div>
<i><p style="color:#663300;font-size:14pt;font-family:'Times New Roman,'serif'; margin-top:10px;width:42px;height:36px;"><?php echo $row1->p_description;?></i><br/><b style="color:#cc3300">Frosting Used:&nbsp;<?php echo $row1->p_frosting;?></b></p>
<!--<p><i> Customize your cake by detailing your design in the form below</i></p>-->
<br/><br/><br/>
<?php //echo validation_errors(); ?>

<form method="post" name="CustomizeOrder" class="order" action="/CodeIgniter/index.php/cakedetails/cake_details/<?php echo $row1->p_id; ?>/<?php echo $row1->p_image;?>/<?php echo $row1->p_frosting;?>/<?php echo $row1->p_name;?>">
<?php

//}
?>
 
<h1 style="color:#CC0000;font-size:14pt;font-family:'Times New Roman,'serif';margin-top:10px;">Cake Shape &nbsp;<i style="color:#663300;font-size:12pt;">(Required)</i></h1>
<?php if (!set_value('dynamic_cakeshape')) {?>
<div style="background-color:#cc0000;color:#ffffff;font-weight:bold"><?php echo form_error('dynamic_cakeshape'); ?></div>
<?php

}

?>
<select name="dynamic_cakeshape" id="Drop1" style="width:200px">
<option value="">--select a Cake Shape--</option>

<?php

foreach($query2 as $row)
{
?>
<option value="<?  echo $row->cakeshapeid;?>" <?php echo set_select('dynamic_cakeshape', $row->cakeshapeid,FALSE)?>> <?echo $row->cakeshapename;?></option>
<?php

}

?>

</select>

<br/><br/>
<h1 style="color:#CC0000;font-size:14pt;font-family:'Times New Roman,'serif'; margin-top:10px;">Cake Size&nbsp;<i style="color:#663300;font-size:12pt;">(Required)</i></h1>
<?php if (!set_value('dynamic_cakesize')) {?>
<div style="background-color:#cc0000;color:#ffffff;font-weight:bold"><?php echo form_error('dynamic_cakesize'); ?></div>
<?php
}
?>
<select name="dynamic_cakesize" size="1" class="SheetDrop" id="Drop2">
<?php
if (set_value('dynamic_cakeshape'))
{
$selectedcakeshape=$_POST['dynamic_cakeshape'];
$sqlrow=mysql_query("select * from cakesizes where p_id='$cakeid' && cakeshapeid='$selectedcakeshape'");
if(!$sqlrow)
{
die (mysql_error());
}
while($res=mysql_fetch_array($sqlrow))
{$selectedcakesize=$res['cakesizename'];
?>
<option value=""<?php if($selectedcakesize==$_POST['dynamic_cakesize']){echo "selected";}?>><?php echo $selectedcakesize;?></option>
<?php
}
}
?>
</select>
<br/>
<br/>
<hr>
<b><p style="color:#CC0000;font-size:14pt;font-family:'Times New Roman,'serif'; margin-top:10px;width:42px;height:36px;">Select Flavour&nbsp;<i style="color:#663300;font-size:12pt;">(Required)</i></p></b>
<?php
if (!set_value('SelectFlavour')) {?>
<div style="background-color:#cc0000;color:#ffffff;font-weight:bold"><?php echo form_error('SelectFlavour'); ?></div>
<?php
}
foreach($query as $row1)
{
$flavours1=explode(',',$row1->p_flavours);
	
	for($i=0;$i<sizeof($flavours1)-1;$i++)
	{
	
      $query="select * from cakeflavours where cakeflavourname='$flavours1[$i]'";
	  $newresult=mysql_query($query);
	  if(!$newresult)
     {
      die (mysql_error());
     }
	 if($newrow=mysql_fetch_array($newresult))
	 {
?>
<div id="auto-style1" style="width: 42px; height: 36px; float: left;margin-left:10px">
<img src="<?php echo "/CodeIgniter/assets/imgs/$newrow[cakeflavourimage]";?>" style="width: 42px; height: 36px"/>
</div>
<div id="auto-style1" style="width: 42px; height: 36px; float: left;margin-left:5px">
<input name="SelectFlavour" style="margin-top:50px;margin-left:-130px"  id="Flavour" type="radio" value="<?php  echo $flavours1[$i]; ?>"<?php if($flavours1[$i]==set_value('SelectFlavour')){echo set_radio('SelectFlavour', $flavours1[$i], TRUE);} ?>/><span style="margin-left:-70px"><?php echo $flavours1[$i];?></span>
</div>
<?php
}
}

?>


<br/><br/><br/><br/><br/>
<hr>
<b><p style="color:#CC0000;font-size:14pt;font-family:'Times New Roman,'serif'; margin-top:10px;width:42px;height:36px;">Select Filling &nbsp;<i style="color:#663300;font-size:12pt;">(Optional)</i></p></b>

<?php


$cakefilling=$this->input->post("Filling");

$sellcakefill=explode(',',$cakefilling);

$fillings1=explode(',',$row1->p_filling);

	for($i=0;$i<sizeof($fillings1)-1;$i++)
	{
	
      $query="select * from cakefillings where cakefillingname='$fillings1[$i]'";
	  $newresult=mysql_query($query);
	  if(!$newresult)
     {
      die (mysql_error());
     }
	 if($newrow=mysql_fetch_array($newresult))
	 { 
?>
<div id="auto-style1" style="width:50px; height:41px; float: left;margin-top:10px">
<img src="<?php echo "/CodeIgniter/assets/imgs/$newrow[cakefillingimage]";?>" style="width:50px; height: 41px" />
</div>
<div id="auto-style1" style="width:50px; height:41px; float: left;margin-top:10px">
    <input id="SelectFilling" align="middle" style="margin-top:50px;margin-left:-130px" name="Filling[]" type="checkbox" value="<?php echo $fillings1[$i];?>" <?php for($j=0;$j<$i;$j++){ if($sellcakefill[$j]==$fillings1[$i]) {echo "checked=checked";}}//set_checkbox('Filling[]', $fillings1[$i]);}}?> /><span style="margin-left:-70px"><?php echo $fillings1[$i];?></span>

</div>
<?php
}
}

?>
<br/><br/><br/><br/><br/><br/><br/>
<hr>
<b><p style="color:#CC0000;font-size:14pt;font-family:'Times New Roman,'serif'; margin-top:10px;width:42px;height:36px;">Add A Cake Message &nbsp;<i style="color:#663300;font-size:12pt;">(Optional)<br></i></p></b>
<?php
if (form_error('cakemessage')) {?>
<div style="background-color:#cc0000;color:#ffffff;font-weight:bold"><?php echo form_error('cakemessage'); ?></div>
<?php
}
?>
<br>
<textarea rows=4 cols=40 placeholder="Maximum 50 characters" maxlength=50 name="cakemessage"><?php if($this->input->post('cakemessage')){echo $this->input->post('cakemessage');} else {echo "";}?></textarea><br><br>
<hr>
<h1 style="color:#CC0000;font-size:14pt;font-family:'Times New Roman,'serif';margin-top:10px;">Quantity &nbsp;<i style="color:#663300;font-size:12pt;">(Required)</i></h1>
<?php
$salessql="select * from specialsales where p_id=$row1->p_id";
$salesresult=mysql_query($salessql);
if(!$salesresult)
{
die (mysql_error());
}
if(!$salesrow=mysql_fetch_array($salesresult))
{
?>
<div id="myDiv" style="display:none"><?php echo $row1->p_price; ?></div>
<select name="quantity" id="quan" size="1" class="ShapeDrop">
<option value="1"<?php if($this->input->post("quantity")==1){echo "selected=selected"; } ?>>1</option>
<option value="2"<?php if($this->input->post("quantity")==2){echo "selected=selected"; } ?>>2</option>
<option value="3"<?php if($this->input->post("quantity")==3){echo "selected=selected"; }  ?>>3</option>
<option value="4"<?php if($this->input->post("quantity")==4){echo "selected=selected"; } ?>>4</option>
<option value="5"<?php if($this->input->post("quantity")==5){echo "selected=selected"; } ?>>5</option>
</select>

<?php
}
else
{
?>
<div id="myDiv" style="display:none"><?php echo $salesrow['ss_price']; ?></div>
<select name="quantity" id="quan" size="1" class="ShapeDrop">
<option value="1"<?php if($this->input->post("quantity")==1){echo "selected=selected"; } ?>>1</option>
<option value="2"<?php if($this->input->post("quantity")==2){echo "selected=selected"; }  ?>>2</option>
<option value="3"<?php if($this->input->post("quantity")==3){echo "selected=selected"; } ?>>3</option>
<option value="4"<?php if($this->input->post("quantity")==4){echo "selected=selected"; } ?>>4</option>
<option value="5"<?php if($this->input->post("quantity")==5){echo "selected=selected"; } ?>>5</option>
</select>

<?php
}
}

?>


<input type="submit" id="continue"  value="Add To Cart"/>
<input type="hidden" id="continue" name="SubmitDetails" value="sent"/>
<!--</form>-->
</div>
<div id="rightContentColumn" style="margin-left:75px">
<h4 style="text-align:center;"> BAKERY HOURS
<br><br>MONDAY-FRIDAY 9:00AM-10:00PM
<br><br>WEEKENDS      10:00AM-10:00PM</h4>
<p style="font-size:20px;font-weight:bold;color:#CC0000;">
<img src="/CodeIgniter/assets/imgs/phone_icon.jpg" style="margin:0px 30px" align="middle">
(213)509-7049</p>
<div id="priceBox"><b style="font-size:14pt">TOTAL PRICE<br>
</b><i style="font-size:10pt">(in US dollars)</i>
<br><b style="font-size:20pt"></b>
<?php

$salessql="select * from specialsales where p_id=$row1->p_id";
$salesresult=mysql_query($salessql);
if(!$salesresult)
{
die (mysql_error());
}
if(!$salesrow=mysql_fetch_array($salesresult))
{

	  ?>
<input type="Text" id="total" name="price" value="<?php if($this->input->post('price')!=""){echo $this->input->post('price');}else{ echo $row1->p_price;}?>" readonly />

<?php
}
else
{
?>
<input type="Text" id="total" name="price" value="<?php echo $salesrow['ss_price'];?>" readonly />
<?php
}

//}

?>

</form>

</div>
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
	foreach($query as $row) 
	{ $pc_name=$row->pc_name;
	}
	?>
	
	<div style="margin-left:400px">
	<a href="#popupBasic" data-rel="popup" data-theme="b" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-transition="pop">More Categories</a>
<div data-role="popup" id="popupBasic" class="ui-content" data-overlay-theme="b">
<ul data-role="listview" data-theme="b" >
              
<?php 
foreach($query5 as $row)
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
<div class="ui-content" >
	<div style="inline-block;margin-left:300px">
	<?php
foreach($query as $row1)
{
$cakeid=$row1->p_id;
$this->session->set_userdata('selectedproductid',$cakeid);
$cakeimage=$row1->p_image;
$cakename=$row1->p_name;
$cakefrosting=$row1->p_frosting;
$flavours1=explode(',',$row1->p_flavours);
$p_price=$row1->p_price;
}
?>

<img src="<?php echo "/CodeIgniter/assets/imgs/$row1->p_image"; ?>" style="width:300px;height:300px" />
</div>
<div>
<br/><br/>
<div id="cakeheader" name="p_name" style="inline-block;margin-left:30%"><h3 style="font-family:'Pacifico', cursive;color:#ffffff;font-size:25pt;margin-top:0px;"><?php echo $row1->p_name; ?></h3></div>
<div style="background-color:#FDE8D7;width:300%;height:20%"><i><p style="color:#cc0000;font-size:24pt;font-family:'Times New Roman,'serif';width:100%; margin-top:10px;margin-left:0.5em"><?php echo $row1->p_description;?></i><br/><b style="color:#cc0000">Frosting Used:&nbsp;<?php echo $row1->p_frosting;?></b></p>
</div></div>
<div>
<?php
if($this->session->userdata('customerusername')!="" && $this->session->userdata('customerpassword')!="")
{
?>
<?php $this->load->helper('url') ?>
<form method="post" name="CustomizeOrder"  class="order" action="<?php echo base_url()?>index.php/cakedetails/cake_details/<?php echo $row1->p_id; ?>/<?php echo $cakeimage;?>/<?php echo $cakefrosting;?>/<?php echo $row1->p_name;?>">
<?php
}
else if($this->session->userdata('customerusername')=="" && $this->session->userdata('customerpassword')=="")
{
?>
<?php $this->load->helper('url');?>
<form method="post" name="CustomizeOrder" class="order" action="<?php echo base_url() ?>index.php/customerlogin/customer_login">
<?php
}
?>

<?php if (!set_value('dynamic_cakeshape')) {?>
<div style="background-color:#cc0000;color:#ffffff;font-weight:bold"><?php echo form_error('dynamic_cakeshape'); ?></div>
<?php

}
?>
<select name="dynamic_cakeshape" id="Drop12" style="width:200px">
<option value="">--select a Cake Shape--</option>


<?php

foreach($query2 as $row)
{ 
?>

<option value="<?  echo $row->cakeshapeid;?>" <?php echo set_select('dynamic_cakeshape', $row->cakeshapeid,FALSE)?>> <?echo $row->cakeshapename;?></option>
<?php

}

?>

</select>
<?php if (!set_value('dynamic_cakesize')) {?>
<div style="background-color:#cc0000;color:#ffffff;font-weight:bold"><?php echo form_error('dynamic_cakesize'); ?></div>
<?php
}
?>
<select name="dynamic_cakesize" size="1" class="SheetDrop" id="Drop13">

</select>

<br/>
<br/>
<hr>

 <h2><b><p style="color:#ffffff;font-size:30pt;font-family:'Times New Roman,'serif'; margin-top:10px;width:42px;height:36px;">Select Flavour&nbsp;<i style="color:#ffffff;font-size:12pt;">(Required)</i></p></b> </h2> 
<?php
if (!set_value('SelectFlavour')) {?>
<div style="background-color:#cc0000;color:#ffffff;font-weight:bold"><?php echo form_error('SelectFlavour'); ?></div>
<?php
}

for($i=0;$i<sizeof($flavours1)-1;$i++)
	{
	
      $query="select * from cakeflavours where cakeflavourname='$flavours1[$i]'";
	  $newresult=mysql_query($query);
	  if(!$newresult)
     {
      die (mysql_error());
     }
	 if($newrow=mysql_fetch_array($newresult))
	 { $flavimg=$newrow['cakeflavourimage'];
?>

<fieldset data-role="controlgroup" data-type="horizontal" data-mini="true" style="display: inline-flex">

        <input type="radio" name="SelectFlavour" id="Flavour1" value="<?php  echo $flavours1[$i]; ?>"/>
        <label for="Flavour1"><img src="<?php echo "/CodeIgniter/assets/imgs/$flavimg"?>" style="width:50px;height:50px"><br/><h2><?php echo $flavours1[$i];?></h2></label>
	
       
</fieldset>

<?php

}
}
?>
<hr>
<h2><b><p style="color:#ffffff;font-size:30pt;font-family:'Times New Roman,'serif'; margin-top:10px;width:42px;height:36px;">Select Filling&nbsp;<i style="color:#ffffff;font-size:12pt;">(Optional)</i></p></b> </h2> 
<?php


$cakefilling=$this->input->post("Filling");

$sellcakefill=explode(',',$cakefilling);

$fillings1=explode(',',$row1->p_filling);

	for($i=0;$i<sizeof($fillings1)-1;$i++)
	{
	
      $query="select * from cakefillings where cakefillingname='$fillings1[$i]'";
	  $newresult=mysql_query($query);
	  if(!$newresult)
     {
      die (mysql_error());
     }
	 if($newrow=mysql_fetch_array($newresult))
	 { $fillimg=$newrow['cakefillingimage'];
?>

<fieldset data-role="controlgroup" data-type="horizontal" data-mini="true" style="display: inline-flex">
   
    <input type="checkbox" name="Filling[]" id="SelectFilling" value="<?php  echo $fillings1[$i]; ?>"/>
    <label for="SelectFilling"><img src="<?php echo "/CodeIgniter/assets/imgs/$fillimg"?>" style="width:50px;height:50px"><br/><h2><?php echo $fillings1[$i];?></h2></label>
</fieldset>
<?php
}
}
?>

<hr>
<label for="textarea"><h2 style="color:#ffffff;font-size:30pt">Add A Cake Message </h2><i style="color:#ffffff">(Optional)</i></label>
<?php
if (form_error('cakemessage')) {?>
<div style="background-color:#cc0000;color:#ffffff;font-weight:bold"><?php echo form_error('cakemessage'); ?></div>
<?php
}
?>
<br>
<textarea cols="40" rows="15" placeholder="Maximum 50 characters" maxlength=50 name="cakemessage"><?php if($this->input->post('cakemessage')){echo $this->input->post('cakemessage');} else {echo "";}?></textarea><br/>
<hr>

<h2 style="color:#ffffff;font-size:30pt;font-family:'Times New Roman,'serif';margin-top:10px;">Quantity &nbsp;<i style="color:#ffffff;font-size:12pt;">(Required)</i></h1>
<?php
$salessql="select * from specialsales where p_id=$row1->p_id";
$salesresult=mysql_query($salessql);
if(!$salesresult)
{
die (mysql_error());
}
if(!$salesrow=mysql_fetch_array($salesresult))
{
?>
<div id="myDiv1" style="display:none"><?php echo $row1->p_price; ?></div>
<select name="quantity" id="quan1" size="1" class="ShapeDrop">
<option value="1"<?php if($this->input->post("quantity")==1){echo "selected=selected"; } ?>>1</option>
<option value="2"<?php if($this->input->post("quantity")==2){echo "selected=selected"; } ?>>2</option>
<option value="3"<?php if($this->input->post("quantity")==3){echo "selected=selected"; }  ?>>3</option>
<option value="4"<?php if($this->input->post("quantity")==4){echo "selected=selected"; } ?>>4</option>
<option value="5"<?php if($this->input->post("quantity")==5){echo "selected=selected"; } ?>>5</option>
</select>

<?php
}
else
{
?>
<div id="myDiv1" style="display:none"><?php echo $salesrow['ss_price']; ?></div>
<select name="quantity" id="quan1" size="1" class="ShapeDrop">
<option value="1"<?php if($this->input->post("quantity")==1){echo "selected=selected"; } ?>>1</option>
<option value="2"<?php if($this->input->post("quantity")==2){echo "selected=selected"; }  ?>>2</option>
<option value="3"<?php if($this->input->post("quantity")==3){echo "selected=selected"; } ?>>3</option>
<option value="4"<?php if($this->input->post("quantity")==4){echo "selected=selected"; } ?>>4</option>
<option value="5"<?php if($this->input->post("quantity")==5){echo "selected=selected"; } ?>>5</option>
</select>

<?php
}


?>
<div data-role="fieldcontain">
    <label for="priceBox">
   
<?php

$salessql="select * from specialsales where p_id=$row1->p_id";

$salesresult=mysql_query($salessql);
if(!$salesresult)
{
die (mysql_error());
}
if(!$salesrow=mysql_fetch_array($salesresult))
{

	  ?>
	  
<h1 style="color:#ffffff">Total<input type="Text" id="total1" style="margin-right:50%;background-color:#FDE8D7;font-size:30pt" name="price" value="<?php echo $row1->p_price;?>" readonly /></h1></label>

<?php
}
else
{
?>
<h1 style="color:#ffffff">Total<input type="Text" id="total1" style="margin-right:50%;background-color:#FDE8D7;font-size:30pt" name="price" value="<?php echo $salesrow['ss_price'];?>" readonly /></h1></label>
<?php
}

//}

?>
</div>
<div><input type="submit" value="Add To Cart"><div>
</form>
</div>
</div>
</div>
</body>
</html>
