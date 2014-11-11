<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Pc_model extends CI_Model
{
function productcategory() {
$this->load->database();
$query = $this->db->query('SELECT * FROM productcategories');
return $query->result();
}
function signupinsert($custfname,$custlname,$custuname,$custpassword)
{
$count=0;
$this->db->select('*');
$this->db->from('customers');
$this->db->where('UserName', $custuname);
$query = $this->db->get();
$rowcount = $query->num_rows();
if($rowcount==0)
{
//$sql="insert into customers(CustomerFirstName,CustomerLastName,UserName,Password) values('$custfname','$custlname','$custuname',password('$custpassword'))";
$sql="insert into customers(CustomerFirstName,CustomerLastName,UserName,Password) values(?,?,?,password(?))";
$this->db->query($sql,array($custfname,$custlname,$custuname,$custpassword));

//$res=mysql_query($sql);
$count=$this->db->affected_rows(); 

}
return $count;
}
}
