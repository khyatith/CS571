<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Cakedetails_model extends CI_Model
{
function cakedetailsretrieve($cakeid)
{
$this->db->select('*');
$this->db->from('products');
$this->db->where('p_id', $cakeid);
$query = $this->db->get();
return $query->result();
}

function cakeflavourretrieve($cakeid)
{
$this->db->select('*');
$this->db->from('products');
$this->db->where('p_id', $cakeid);
$query = $this->db->get();
foreach ($query->result() as $row)
{
$flavours1=explode(',',$row->p_flavours);
	
	for($i=0;$i<sizeof($flavours1)-1;$i++)
	{
	
	$this->db->select('*');
$this->db->from('cakeflavours');
$this->db->where('cakeflavourname',$flavours1[$i]);
$query1 = $this->db->get();
return $query1->result();
}
}

}
function cakeshaperetrieve()
{
$this->db->select('*');
$this->db->from('cakeshapes');
$query2 = $this->db->get();
return $query2->result();
}
function suggestions($cakeid)
{
$suggestsql=$this->db->query("Select DISTINCT p_id,Cake_name,productprice,Cake_image from orderdetails where OrderId in (select DISTINCT OrderId from orderdetails where p_id='$cakeid') and p_id != '$cakeid'");
return $suggestsql->result();
}
/*function cakefillingretrieve($cakeid)
{
$this->db->select('*');
$this->db->from('products');
$this->db->where('p_id', $cakeid);
$query = $this->db->get();
foreach ($query->result() as $row)
{
$fillings1=explode(',',$row->p_filling);
	
	for($i=0;$i<sizeof($fillings1)-1;$i++)
	{
	
	$this->db->select('*');
$this->db->from('cakefillings');
$this->db->where('cakefillingname',$fillings1[$i]);
$query4 = $this->db->get();
}
foreach ($query4->result() as $row)
{
$data['cakefillingname']=$row->cakefillingname;
$data['cakefillingimage']=$row->cakefillingimage;

}
}
return $data;

}*/
function cakeshaperetrieveforcart($selectedcakeshape)
{
$this->db->select('*');
$this->db->from('cakeshapes');
$this->db->where('cakeshapeid',$selectedcakeshape);
$query = $this->db->get();
return $query->result();

}
function cakesaleretrieve($pid)
{

$ss=$this->db->query("select * from specialsales where p_id='$pid'");
/*$this->db->select('*');
$this->db->from('specialsales');
$this->db->where('p_id',$cakeid);*/

//$query5 = $this->db->get();
return $ss->result();
/*if ($query5->num_rows() > 0) return $query5->result();
    return false;*/

}
function changecakesizemodel($cakeid,$drop1)
{
$html='';
//echo $cakeid;
//echo $drop1;
$this->db->select('*');
$this->db->from('cakesizes');
$this->db->where('p_id',$cakeid);
$this->db->where('cakeshapeid',$drop1);
$query = $this->db->get();
//$data="hi";
foreach($query->result() as $row1)
{
 $html .= '<option value="'.$row1->cakesizename .'">'.$row1->cakesizename.'</option>';
}

return $html;
//return $data;
}

function insertshoppingcart($cakeid,$custid,$cakeshapename,$selectedcakesize,$sql2,$selectedflavour,$selectedmessage,$selectedquantity,$selectedprice,$totalpriceoforder)
{
/*$result = mysql_query("SELECT * FROM products where p_id='$cakeid'"); 
	if(!$result)
	{
	die (mysql_error());
	}
	while($row=mysql_fetch_array($result))
	{
	$cakename=$row['p_name'];
	$cakeimage=$row['p_image'];
	$cakefrosting=$row['p_frosting'];
	$cakeprice=$row['p_price'];
   }*/
   $sql="select * from products where p_id=?";
   $query1=$this->db->query($sql,array($cakeid));
   foreach($query1->result() as $row)
   {
   $cakename=$row->p_name;
	$cakeimage=$row->p_image;
	$cakefrosting=$row->p_frosting;
	$cakeprice=$row->p_price;
   }
 
$query="insert into shoppingcarts(p_id,CustomerId,Productprice,Productquantity,Cake_name,Cake_flavour,Cake_frosting,Cake_shape,Cake_size,Cake_filling,Cake_message,Cake_image,Totalprice) values('$cakeid','$custid','$selectedprice','$selectedquantity','$cakename','$selectedflavour','$cakefrosting','$cakeshapename','$selectedcakesize','$sql2','$selectedmessage','$cakeimage','$totalpriceoforder')";
$insertedrow=mysql_query($query);
   //return mysql_affected_rows();
  /*$this->db->select('*');
$this->db->from('shoppingcarts');
$this->db->where('CustomerId',$custid);

$query5 = $this->db->get();
return $query5->result();*/
    


}
function removeproduct($shoppingid)
{

/*$sql=mysql_query("DELETE from shoppingcarts where shoppingcartId='$shoppingid'");
if(!$sql)
{
die (mysql_error());

}
else
{
return 1;
}*/
$sql="delete from shoppingcarts where shoppingcartId=?";
$this->db->query($sql,array($shoppingid));
$count=$this->db->affected_rows();
if($count>0)
{
return 1;
}
}
function editproduct($shoppingid)
{
$this->db->select('*');
$this->db->from('shoppingcarts');
$this->db->where('shoppingcartId',$shoppingid);
$query = $this->db->get();
return $query->result();

}
function updatecart($shoppingid,$cakeshape,$cakesize,$flavour,$sql2,$cakemessage,$quantity,$totalprice)
{
$shapesql=mysql_query("select * from cakeshapes where cakeshapeid='$cakeshape'");
if($row=mysql_fetch_array($shapesql))
{
$shapename=$row['cakeshapename'];
}
$updatesql=mysql_query("update shoppingcarts SET Productquantity='$quantity',Cake_flavour='$flavour',Cake_shape='$shapename',Cake_size='$cakesize',Cake_filling='$sql2',Cake_message='$cakemessage',Totalprice='$totalprice' where shoppingcartId='$shoppingid'");


}
public function increasequantity($shoppingid,$currentquantity,$productprice)
{
if($currentquantity==5)
{

}
else
{

$newquantity=$currentquantity+1;
$totalprice=$productprice*$newquantity;
//$totalprice=$totalprice+$producprice;
$incquan=mysql_query("update shoppingcarts set Productquantity='$newquantity',Totalprice='$totalprice' where shoppingcartId='$shoppingid'");

}


}
public function decreasequantity($shoppingid,$currentquantity,$productprice)
{
if($currentquantity==1)
{

}
else
{

$newquantity=$currentquantity-1;
$totalprice=$productprice*$newquantity;
//$totalprice=$totalprice+$producprice;
$decquan=mysql_query("update shoppingcarts set Productquantity='$newquantity',Totalprice='$totalprice' where shoppingcartId='$shoppingid'");

}



}
public function empty_cart()
{
$custid=$this->session->userdata('cid');
$this->db->query("delete from shoppingcarts where CustomerId='$custid'");
}

}