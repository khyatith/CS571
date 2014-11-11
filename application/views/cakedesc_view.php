<html>

<head>
<!--<link rel="stylesheet" type="text/css" href="/CodeIgniter/assets/css/homework3.css">-->

<script type="text/javascript" src="/CodeIgniter/assets/js/jquery-1.11.1.min.js"></script>
<!--<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1.min.js/themes/smoothness/jquery-ui.css">-->
<script src="/CodeIgniter/assets/js/Timeout.js"></script>

<script>
$(document).ready(function()
{
var width=$(window).width()
if(width>=1000)
{
$('head').append('<link rel="stylesheet" type="text/css" href="/CodeIgniter/assets/css/homework3.css">');
$("#compdiv").show();
$("#mobdiv").hide();
}
else if(width<1000)
{


$('head').append('<link rel="stylesheet" type="text/css" href="/CodeIgniter/assets/css/mobile.css">');
$('head').append('<meta name="viewport" content="width=device-width, initial-scale=1>');
$('head').append('<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.css">');
$('head').append('<script src="http://code.jquery.com/jquery-1.10.2.min.js">');
$('head').append('<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js">');
$('head').append('<script src="/CodeIgniter/assets/js/Timeout.js">');
$("#compdiv").hide();
$("#mobdiv").show();



}
$("#content > div:gt(0)").hide();

setInterval(function() { 
  $('#content > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#content');
},  3000);
});

</script>
</head>
<body onload="StartTimers();" onmousemove="ResetTimers();">

<div id="compdiv">
<?php include 'topmenu.php';?>

<div id="content">
<!--<img src="cake-wedding-01.jpg" style="width:595px;height:280px"/>-->

<div style="margin-left:10px">
  <img src="/CodeIgniter/assets/imgs/cake-wedding-01.jpg" style="width:630px;height:280px">
  </div>
  <div style="margin-left:10px">
  <img src="/CodeIgniter/assets/imgs/b-daycakepinkroses.jpg" style="width:630px;height:280px">
  </div>
  <div style="margin-left:10px">
  <img src="/CodeIgniter/assets/imgs/Cream_cake_and_berries.jpg" style="width:630px;height:280px">
  </div>
  <div style="margin-left:10px">
  <img src="/CodeIgniter/assets/imgs/slideshow3.jpg" style="width:630px;height:280px">
  </div>

</div>



<?php
foreach($query as $row)
{ 
?>
<table style="position:relative;display:inline-block;margin-top:120px;margin-left:-430px;width:575px;height:200px">
<tr>
<td style="padding:200px;padding-right:50px">
<img src="<?php echo "/CodeIgniter/assets/imgs/$row->pc_image";?>" style="width:150px;height:150px;margin-left:30px" />
</td>
</tr>

</table>
<?php
}
?>


<div id="rightContentColumn" style="margin-left:-150px;position:absolute">
<h4 style="text-align:center;"> BAKERY HOURS
<br><br>MONDAY-FRIDAY 9:00AM-10:00PM
<br><br>WEEKENDS      10:00AM-10:00PM</h4>
<p style="font-size:20px;font-weight:bold;color:#CC0000;">
<img src="/CodeIgniter/assets/imgs/phone_icon.jpg" style="margin:0px 30px" align="middle">
(213)509-7049</p>
</div>
</div>
</div>


<div id="mobdiv" data-role="page">
<div data-role="header" style="background-color:#FFCC99"> 
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
      <?php $this->load->helper('url') ?>
	  <li><a href="<?php echo base_url()?>index.php/onloadmobiledashboard/displaymobiledashboard" style="color:#663300">My profile</a></li>
      <li><a href="<?php echo base_url() ?>index.php/cakedetails/displaycart" style="color:#663300">View cart</a></li>
	  <li><a href="<?php echo base_url() ?>index.php/customerlogin/customerlogout" style="color:#663300">LogOut</a></li>
    </ul>
	
	
	<?php
	}
	?>
  </div>
 <article data-role="content">
    <ul data-role="listview" class="primary-menu" data-filter="true" data-split-icon="arrow-r" style="margin-left:-100px">
	<?php
foreach($query as $row)
{ 
?>
        <li>
            <a href="<?php echo base_url() ?>index.php/birthdaycakes/display_cakes/<?php echo $row->pc_id; ?><?php echo $row->pc_name;?>">
			<h2 style="color:#ECECEA"><?php echo $row->pc_name;?></h2>
           <img src="<?php echo "/CodeIgniter/assets/imgs/$row->pc_image";?>" style="width:150px;height:150px"/>
         
		 </a>
           
        </li>
		<?php
		}
		?>
		<li>
            <a href="<?php echo base_url() ?>index.php/birthdaycakes/special_sales">
			<h2 style="color:#ECECEA">Products On Sale!</h2>
           <img src="/CodeIgniter/assets/imgs/cakesale.jpg" style="width:150px;height:150px"/>
		   

         
		 </a>
           
        </li>
        </ul>
</article>





</div>

</body>
</html>