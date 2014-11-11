<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Birthdaycake_model extends CI_Model
{
function birthdaycakeretrieve($category) {
/*$this->db->select('*');
$this->db->from('products');
$this->db->where('pc_id', $category); 
$where="p_id NOT IN (select p_id from specialsales)";
$this->db->where($where);
$query = $this->db->get();*/


$sql=$this->db->query("SELECT *
FROM products, productcategories
WHERE products.pc_id = productcategories.pc_id
AND productcategories.pc_id = '$category'
AND p_id NOT
IN (SELECT p_id
FROM specialsales
)");

return $sql->result();

}
function specialsalesretrieve($category)
{
$date = date('Y-m-d');
$sql=$this->db->query("select * from products,specialsales where products.pc_id='$category' and products.p_id in(select specialsales.p_id from specialsales where ss_startdate>$date) limit 2");
/*$this->db->select('*');
$this->db->from('products');
$this->db->where('pc_id', $category); 
$where="p_id IN (select p_id from specialsales where ss_startdate>$date)";
$this->db->where($where);
$this->db->limit(2);*/

//$query1 = $this->db->get();

return $sql->result();
}

function specialsalesproduct()
{
$date = date('Y-m-d');
$this->db->select('*');
$this->db->from('products');
$this->db->join('specialsales', 'specialsales.p_id = products.p_id');
$this->db->join('productcategories', 'products.pc_id = productcategories.pc_id');
$where="products.p_id IN (select p_id from specialsales where ss_enddate>$date)";
$this->db->where($where);
$query = $this->db->get();

return $query->result();

}

}
