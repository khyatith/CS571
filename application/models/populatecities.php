<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Populatecities extends CI_Model
{
function retrievecities(){
$this->load->database('forum');
$query = $this->db->query('SELECT * FROM cities');
return $query->result();


}
}