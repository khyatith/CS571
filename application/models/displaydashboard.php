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

$("#compdiv").hide();
$("#mobdiv").show();



}});

</script>

</head>
<body onload="StartTimers();" onmousemove="ResetTimers();">
<div id="compdiv">
<form method="post" action="">
<table style="background-color:#E49D67;height:200px;margin-left:200px;width:500px;margin-top:50px">
<tr>
<td></td>
<td style="color:#CC0000;font-weight:bold;font-size:18pt">MY PROFILE</td>
</tr>
<?php
foreach($query as $row)
{
?>
<tr>
<td style="color:#CC0000">FIRST NAME</td>
<td><?php echo $row->CustomerFirstName;?></td>
</tr>
<tr>
<td style="color:#CC0000">LAST NAME</td>
<td><?php echo $row->CustomerLastName;?></td>
</tr>
<tr>
<td style="color:#CC0000">USERNAME</td>
<td><?php echo $row->UserName;?></td>
</tr>
<?php
}
?>
<tr>
<td></td>
<?php $this->load->helper('url');?>
<td><a href="<?php echo base_url() ?>index.php/onloaddashboard/display_viewprofile/<?php echo $custusername;?>"><input type="button" style="background-color:#cc0000" id="continue" value="VIEW/EDIT PROFILE"></td>
</a>
</tr>
</table>
</form>

<!--<form method="post" action="OnLoadDashboard.php">
<table style="background-color:#E49D67;height:200px;margin-left:200px;width:500px;margin-top:50px">
</table>-->
</div>
</body>
</html>