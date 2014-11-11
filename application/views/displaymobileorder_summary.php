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
<div id="mobdiv" data-role="page">

<div data-role="header" style="background-color:#FFCC99" data-theme="b"> 
   <img src="/CodeIgniter/assets/imgs/lutz-cafe.png" /> 
   <?php
	$this->load->helper('url');
	?>
	<ul style="float:right">
   <?php $this->load->helper('url') ?>
      <li><a href="<?php echo base_url()?>index.php/cakedesc/" style="z-index:-10;font-size:2em;color:#663300">Home</a></li>
      <li><a href="<?php echo base_url()?>index.php/onloadmobiledashboard/displaymobiledashboard" style="font-size:2em;color:#663300">My profile</a></li>
      <li><a href="<?php echo base_url() ?>index.php/cakedetails/displaycart" style="font-size:2em;color:#663300">View cart</a></li>
	  <li><a href="<?php echo base_url() ?>index.php/customerlogin/customerlogout" style="font-size:2em;color:#663300">LogOut</a></li>
    </ul>
	
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
<article data-role="content">
    <ul data-role="listview" class="primary-menu" data-filter="true" data-split-icon="arrow-r">
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
        <li style="margin-top:20px">
            <?php $this->load->helper('url');?>
<a href="<?php echo base_url()?>index.php/onloadmobiledashboard/displaymobileorderdetails/<?php echo $ordernumber;?>">
<h2 style="font-size:30pt">#12345<?php echo $ordernumber;?>&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $orderdate;?>&nbsp;&nbsp;&nbsp;&nbsp;
<?php echo $custfname;?>&nbsp;&nbsp;<?php echo $custlname;?></h2></a>

		 
           
        </li>
		<?php
		}
		?>
		</ul>
		</article>
		
		<?php
		}
		?>
		</div>
		</div>
		</body>
		</html>
		