<html>
<head>
<title>Test</title>
<body>
<form method="get">
<select class="form-control" id="citySelect" name="city">
<option value="1">1</option>
<option value="2">2</option>
</select>
<input type="text" value="hi" name="hello"/>
<?php
$name=$_GET['hello'];
var_dump($name);
?>
<a href="index.php/weatherapp/display_cities/storecities/<?php echo $this->input->post('hello');?>">send</a>

</form>


</body>
</html>