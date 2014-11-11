<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Displaydashboard_model extends CI_Model
{

function display_dashboard($custusername)
{
/*$custusername=$this->session->userdata('customerusername');
$this->db->select('*');
$this->db->from('customers');
$this->db->where('UserName', $custusername);
$query1 = $this->db->get();

foreach($query1->result() as $row)
{
$customerid=$row->CustomerId;
}*/
$customerid=$this->session->userdata('cid');

$this->db->select('*');
$this->db->from('customers');
$this->db->where('CustomerId', $customerid);
$query = $this->db->get();
return $query->result();
}
function updateprofile($fname,$lname,$shippingstreet,$shippingcity,$shippingstate,$shippingzip,$billingstreet,$billingstate,$billingcity,$billingzip,$contact,$username,$email)
{
/*$custusername=$this->session->userdata('customerusername');
$this->db->select('*');
$this->db->from('customers');
$this->db->where('UserName', $custusername);
$query = $this->db->get();

foreach($query->result() as $row)
{
$customerid=$row->CustomerId;
}*/
$customerid=$this->session->userdata('cid');
/*$query=$this->db->query("update customers set CustomerFirstName='$fname',CustomerLastName='$lname',ShippingStreet='$shippingstreet',ShippingCity='$shippingcity',ShippingState='$shippingstate',ShippingZip='$shippingzip',
BillingStreet='$billingstreet',BillingCity='$billingcity',BillingState='$billingstate',BillingZip='$billingzip',UserName='$username',CustomerEmail='$email',CustomerContact='$contact'
WHERE CustomerId='$customerid'");*/
$sql="update customers set CustomerFirstName=?,CustomerLastName=?,ShippingStreet=?,ShippingCity=?,ShippingState=?,ShippingZip=?,
BillingStreet=?,BillingCity=?,BillingState=?,BillingZip=?,UserName=?,CustomerEmail=?,CustomerContact=?
WHERE CustomerId=?";


$this->db->query($sql,array($fname,$lname,$shippingstreet,$shippingcity,$shippingstate,$shippingzip,$billingstreet,$billingcity,$billingstate,$billingzip,$username,$email,$contact,$customerid));
return $this->db->affected_rows();
//return $query->result();
//return mysql_affected_rows();

}
function updatemobileprofile($fname,$lname,$shippingstreet,$shippingcity,$shippingstate,$shippingzip,$billingstreet,$billingstate,$billingcity,$billingzip,$contact,$username,$email)
{
$customerid=$this->session->userdata('cid');

$query=$this->db->query("update customers set CustomerFirstName='$fname',CustomerLastName='$lname',ShippingStreet='$shippingstreet',ShippingCity='$shippingcity',ShippingState='$shippingstate',ShippingZip='$shippingzip',
BillingStreet='$billingstreet',BillingCity='$billingcity',BillingState='$billingstate',BillingZip='$billingzip',UserName='$username',CustomerEmail='$email',CustomerContact='$contact'
WHERE CustomerId='$customerid'");
return $this->db->affected_rows();
}
function edit_password($oldpassword,$newpassword)
{

/*$custusername=$this->session->userdata('customerusername');
$this->db->select('*');
$this->db->from('customers');
$this->db->where('UserName', $custusername);
$query = $this->db->get();

foreach($query->result() as $row)
{
$customerid=$row->CustomerId;
}*/
$customerid=$this->session->userdata('cid');
//$sql=mysql_query("update customers set Password=password('$newpassword') WHERE CustomerId='$customerid'");
$sql="update customers set Password=password(?) WHERE CustomerId=?";
$this->db->query($sql,array($newpassword,$customerid));
return $this->db->affected_rows();
//return mysql_affected_rows();
}
function display_ordersummary()
{

/*$custusername=$this->session->userdata('customerusername');
$this->db->select('*');
$this->db->from('customers');
$this->db->where('UserName', $custusername);
$query = $this->db->get();

foreach($query->result() as $row)
{
$customerid=$row->CustomerId;
}*/
$customerid=$this->session->userdata('cid');

$this->db->select('*');
$this->db->from('orders');
$this->db->where('CustomerId', $customerid);
$query1 = $this->db->get();
//echo $query1->num_rows();
return $query1->result();

}
function display_orderdetails($ordernumber)
{
$this->db->select('*');
$this->db->from('orders');
$this->db->where('OrderId', $ordernumber);
$query= $this->db->get();
return $query->result();
}

function display_order($ordernumber)
{
/*$this->db->select('*');
$this->db->from('orderdetails');
$this->db->where('OrderId', $ordernumber);
$query1= $this->db->get();
return $query1->result();*/
$sql="select * from orders,orderdetails where orders.OrderId=orderdetails.OrderId && orders.OrderId=?";
$query=$this->db->query($sql,array($ordernumber));
//$query1= $this->db->get();
return $query->result();


}
function displayorderdetails($ordernumber)
{
$this->db->select('*');
$this->db->from('orders');
$this->db->join('orderdetails', 'orders.OrderId = orderdetails.OrderId');
$where="orders.OrderId='$ordernumber'";
$this->db->where($where);
$query2 = $this->db->get();

return $query2->result();

}
public function insertorder($custid,$custfname,$custlname,$contactnew,$emailnew,$ss,$sc,$szip,$sstate,$bs,$bc,$bzip,$bstate,$ccfirstnamenew,$cclastnamenew,$ccnumbernew,$cvvnew,$expirymonthnew,$expiryyearnew,$date)
{

$this->db->trans_start();
$sql="INSERT into orders (CustomerId,CustomerFirstName,CustomerLastName,BillingStreet,BillingCity,BillingState,BillingZip,ShippingStreet,ShippingCity,ShippingState,ShippingZip,CustomerContact,OrderDate,CreditCardNumber,CVV,CCFirstName,CCLastName,ExpiryYear,ExpiryMonth) values (?,?, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
$this->db->query($sql,array($custid,$custfname,$custlname,$bs,$bc,$bstate,$bzip,$ss,$sc,$sstate,$szip,$contactnew,$date,$ccnumbernew,$cvvnew,$ccfirstnamenew,$cclastnamenew,$expirymonthnew,$expiryyearnew));
//$sql="INSERT into orders(CustomerId,CustomerFirstName,CustomerLastName,BillingStreet,BillingCity,BillingState,BillingZip,ShippingStreet,ShippingCity,ShippingState,ShippingZip,CustomerContact,OrderDate,CreditCardNumber,CVV,CCFirstName,CCLastName,ExpiryYear,ExpiryMonth) values()"
$check=$this->db->affected_rows();
$insert_id = $this->db->insert_id();
$sqlselect="SELECT * from shoppingcarts where CustomerId=?";
$query1=$this->db->query($sqlselect,array($custid));
foreach($query1->result() as $row)
{
$scpid=$row->p_id;
$scpp=$row->Productprice;
$scq=$row->Productquantity;
$sccakename=$row->Cake_name;
$sccflavour=$row->Cake_flavour;
$sccfilling=$row->Cake_filling;
$sccfrosting=$row->Cake_frosting;
$sccshape=$row->Cake_shape;
$sccsize=$row->Cake_size;
$scmessage=$row->Cake_message;
$scimage=$row->Cake_image;

$sqlinsert="insert into orderdetails(OrderId,p_id,CustomerId,productprice,productquantity,Cake_name,Cake_flavour,Cake_frosting,Cake_shape,Cake_size,Cake_message,Cake_image,OrderDate)values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
//$sqlinsert="insert into orderdetails(OrderId,p_id,CustomerId,productprice,productquantity,Cake_name,Cake_flavour,Cake_frosting,Cake_shape,Cake_size,Cake_filling,Cake_message,Cake_image,OrderDate)values()";
$this->db->query($sqlinsert,array($insert_id,$scpid,$custid,$scpp,$scq,$sccakename,$sccflavour,$sccfrosting,$sccshape,$sccsize,$scmessage,$scimage,$date));

$deletequery="delete from shoppingcarts where CustomerId=? && p_id=?";
$this->db->query($deletequery,array($custid,$scpid));
$this->db->trans_complete();
}
}
function display_ccinfo()
{
$customerid=$this->session->userdata('cid');
$sql="select * from customers,shoppingcarts where shoppingcarts.CustomerId=customers.CustomerId && customers.CustomerId=?";
$query=$this->db->query($sql,array($customerid));
return $query->result();
}
}