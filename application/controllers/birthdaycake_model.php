<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Birthdaycake_model extends CI_Model
{
function birthdaycakeretrieve($category) {
$this->db->select('*');
$this->db->from('products');
$this->db->where('pc_id', $category); 
$where="p_id NOT IN (select p_id from specialsales)";
$this->db->where($where);
$query = $this->db->get();

return $query->result();

}
function specialsalesretrieve($category)
{
$date = date('Y-m-d');
$this->db->select('*');
$this->db->from('products');
$this->db->where('pc_id', $category); 
$where="p_id IN (select p_id from specialsales where ss_startdate>$date)";
$this->db->where($where);
$this->db->limit(2);
$query1 = $this->db->get();

return $query1->result();
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
