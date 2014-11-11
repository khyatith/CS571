<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Customerlogin_model extends CI_Model
{
function custlogin($custusername,$custpassword) {
$this->db->select('*');
$this->db->from('customers');
$this->db->where('UserName', $custusername);
$this->db->where('Password','password('.$custpassword.')',FALSE);
$query=$this->db->get();

if ($query->num_rows() > 0){ 
foreach($query->result() as $row)
{
$cid=$row->CustomerId;
$this->session->set_userdata('cid',$cid);


}
return $query->result();
}

else
{
    return false;
	}

}

function insertincart($custid)
{
$selectedproductid=$_SESSION['p_d'];
$array1=$_SESSION['cart'];

$arrayimage=$_SESSION['cartforimage'];
$arrayname=$_SESSION['cartforname'];
$arraysize=$_SESSION['cartforsize'];
$arrayflavour=$_SESSION['cartforflavour'];
$arrayfilling=$_SESSION['cartforfilling'];
$arraymessage=$_SESSION['cartformessage'];

$arrayquantity=$_SESSION['cartforquantity'];
//$arrayquantity=$_SESSION['cartforquantity'];
$arrayfrosting=$_SESSION['cartforfrosting'];
$arrayprice=$_SESSION['cartforprice'];
$custid=$_SESSION['customerid'];
$totalprice=0.0;
$count=0;
for($i=0;$i<sizeof($selectedproductid);$i++)
{
$custid=$this->session->userdata('cid');
$priceforone=$arrayprice[$i]/$arrayquantity[$i];
$totalprice=$priceforone*$arrayquantity[$i];
$sql="INSERT into shoppingcarts (p_id,CustomerId,Productprice,Productquantity,Cake_name,Cake_flavour,Cake_frosting,Cake_shape,Cake_size,Cake_filling,Cake_message,Cake_image,Totalprice) values ('$selectedproductid[$i]','$custid', '$priceforone','$arrayquantity[$i]','$arrayname[$i]','$arrayflavour[$i]','$arrayfrosting[$i]','$array1[$i]','$arraysize[$i]','$arrayfilling[$i]','$arraymessage[$i]','$arrayimage[$i]',$totalprice)";
$ret=mysql_query($sql);




/*$sql="INSERT into shoppingcarts (p_id,CustomerId,Productprice,Productquantity,Cake_name,Cake_flavour,Cake_frosting,Cake_shape,Cake_size,Cake_message,Cake_image,Totalprice) values (?,?, ?,?,?,?,?,?,?,?,?,?)";
$this->db->query($sql,array($selectedproductid[$i],$custid,$priceforone,$arrayquantity[$i],$arrayname[$i],$arrayflavour[$i],$arrayfrosting[$i],$array1[$i],$arraysize[$i],$arraymessage[$i],$arrayimage[$i],$totalprice));

/*'$selectedproductid[$i]','$custid', '$priceforone','$arrayquantity[$i]','$arrayname[$i]','$arrayflavour[$i]','$arrayfrosting[$i]','$array1[$i]','$arraysize[$i]','$arrayfilling[$i]','$arraymessage[$i]','$arrayimage[$i]',$totalprice)";
$ret=mysql_query($sql);*/


}
$check1=$this->db->affected_rows();
//echo $check1;

/*$this->db->select('*');
$this->db->from('customers');
$this->db->where('UserName', $custusername);
$query = $this->db->get();
$countrow=$query->num_rows();

if($countrow>0)
{
foreach($query->result() as $row1)
{
$custid=$row1->CustomerId;
}
$user[]=$this->session->userdata['cart'];
foreach($user as $value)
{
for($i=0;$i<count($value);$i++)
{
//echo $value[$i]['cake_filling'];
$id=$value[$i]['cake_id'];
$img=$value[$i]['cake_image'];
$price=$value[$i]['cake_price'];
$quantity=$value[$i]['cake_quantity'];
$cakename=$value[$i]['cake_name'];
$cakeflavour=$value[$i]['cake_flavour'];
$cakefrosting=$value[$i]['cake_frosting'];
$cakeshape=$value[$i]['cake_shape'];
$cakesize=$value[$i]['cake_size'];
$cakefilling=$value[$i]['cake_filling'];
$cakemessage=$value[$i]['cake_message'];
$totalprice=$quantity*$price;

$data = array(
   'p_id' => $id ,
   'CustomerId' => $custid ,
   'Productprice' => $price,
   'Productquantity'=>$quantity,
   'Cake_name' => $cakename,
   'Cake_flavour' => $cakeflavour,
   'Cake_frosting' => $cakefrosting,
   'Cake_shape' => $cakeshape,
   'Cake_size' => $cakesize,
   'Cake_filling' => $cakefilling,
   'Cake_message' => $cakemessage,
   'Totalprice' => $totalprice
);
*/

/*$this->db->insert_batch('shoppingcarts', $data);*/

//$sql="INSERT into shoppingcarts () values ('$id')");
//$ret=mysql_query($sql);

//$sql = "INSERT IGNORE INTO my_table(lat, lng, date, type) VALUES (?,?,?,?);"; 
//$this->db->query($sql, array($data['lat'], $data['lng'], $data['date'], $data['type']));
//$sql="INSERT into shoppingcarts (p_id,CustomerId,Productprice,Productquantity,Cake_name,Cake_flavour,Cake_frosting,Cake_shape,Cake_size,Cake_filling,Cake_message,Cake_image,Totalprice) values (?,?, ?,?,?,?,?,?,?,?,?,?,?)";
//$this->db->query($sql,array($id,$custid,$price,$quantity,$cakename,$cakeflavour,$cakefrosting,$cakeshape,$cakesize,$cakefilling,$cakemessage,$img,$totalprice));
//$sql="INSERT into shoppingcarts (p_id,CustomerId,Productprice,Productquantity,Cake_name,Cake_flavour,Cake_frosting,Cake_shape,Cake_size,Cake_message,Cake_image,Totalprice) values (?,?, ?,?,?,?,?,?,?,?,?,?)";
//$this->db->query($sql,array($id,$custid,$price,$quantity,$cakename,$cakeflavour,$cakefrosting,$cakeshape,$cakesize,$cakemessage,$img,$totalprice));


//echo $check1;
}
public function ssretrieve()
{
$date = date('Y-m-d');
/*$query=$this->db->query("select * from products,specialsales where products.p_id in(select specialsales.p_id from specialsales)limit 3");
return $query->result();*/

    $this->db->select('products.p_id');
	$this->db->select('products.p_name');
	$this->db->select('products.p_image');
	$this->db->select('products.p_price');
	$this->db->select('specialsales.ss_price');
    $this->db->from('products, specialsales');
	$where = 'specialsales.p_id = products.p_id';
	$this->db->where($where);
	$this->db->order_by('specialsales.p_id', 'RANDOM');
	$this->db->limit(3);
	
	$sql2 = $this->db->get();
		
    return $sql2->result();

}
}




