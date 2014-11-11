<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Cakedetails extends CI_Controller
{public function __construct()
{
parent:: __construct();
$this->load->library('session');
$this->load->helper('url');
$this->load->library('javascript');
$this->load->model('pc_model');
$data['query'] = $this->pc_model->productcategory();
$this->load->view('topmenu',$data);
$this->session->set_userdata('prevpage', uri_string());
}
public function cake_details($cakeid)
{
$this->load->helper(array('form', 'url'));
$this->load->library('form_validation');
$this->form_validation->set_rules('dynamic_cakeshape', 'Cake Shape', 'required');
$this->form_validation->set_rules('dynamic_cakesize', 'Cake Size', 'required');
$this->form_validation->set_rules('SelectFlavour', 'Cake Flavour', 'required');
//$this->form_validation->set_rules('cakemessage', 'Message On Cake', 'required');
$this->form_validation->set_rules('cakemessage', 'Message On Cake', 'trim|max_length[50]|xss_clean');
if ($this->form_validation->run() == FALSE)
{
$data=array();
//$cakeid=$this->input->get("cakeid");
$this->load->model('cakedetails_model');
$data['query'] = $this->cakedetails_model->cakedetailsretrieve($cakeid);

$data['query2'] = $this->cakedetails_model->cakeshaperetrieve();


$this->load->view('cakedetails_view',$data);

}
else
{
if($this->session->userdata('customerusername')=="" && $this->session->userdata('customerpassword')=="")
{

$shape=$this->input->post('dynamic_cakeshape');

$sql=mysql_query("select * from cakeshapes where cakeshapeid='$selectedcakeshape'");
while($row=mysql_fetch_array($sql))
{
$cakeshapename=$row['cakeshapename'];

}

//$selectedcakesize=$this->input->post('dynamic_cakesize');
$selectedflavour=$this->input->post('SelectFlavour');
$selectedfilling=$this->input->post('Filling');
$selectedmessage=$this->input->post('cakemessage');
$selectedquantity=$this->input->post('quantity');
$selectedprice=$this->input->post('price');
//var_dump($selectedmessage);
if($selectedfilling=="")
{

}
else
{
while (list ($key, $val) = each ($selectedfilling)){

$sql2 .= "$val,";

}

//for filling
$cart_filling = $this->session->userdata('selectedfilling');
$cart_filling[] = $sql2;
$this->session->set_userdata('selectedfilling', $cart_filling);
}
//for cakeshape
$cart_shape=array();
$cart_shape = $this->session->userdata('selectedcakeshape');
$cart_shape[]=$this->input->post('dynamic_cakeshape');
$this->session->set_userdata('selectedcakeshape', $cart_shape);
//for cake size
$cart_size = $this->session->userdata('selectedcakesize');
$cart_size[]= $selectedcakesize;
$this->session->set_userdata('selectedcakesize', $cart_size);
//for cake flavour
$cart_flavour = $this->session->userdata('selectedflavour');
$cart_flavour[] = $selectedflavour;
$this->session->set_userdata('selectedflavour', $cart_flavour);
//for message
$cart_message = $this->session->userdata('selectedmessage');
$cart_message[] = $selectedmessage;
$this->session->set_userdata('selectedmessage', $cart_message);
//for quantity
$cart_quantity = $this->session->userdata('selectedquantity');
$cart_quantity[] = $selectedquantity;
$this->session->set_userdata('selectedquantity', $cart_quantity);
//for price
$cart_price = $this->session->userdata('selectedprice');
$cart_price[] = $selectedprice;
$this->session->set_userdata('selectedprice', $cart_price);




$this->session->set_userdata('selectedcakeshape', $selectedcakeshape);



$this->load->view('shoppingcart_view.php');
}
else if($this->session->userdata('customerusername')!="" && $this->session->userdata('customerpassword')!="")
{
$selectedproductid=$this->session->userdata('productid');
echo $selectedproductid;
$username=$this->session->userdata('customerusername');
$sql1=mysql_query("select * from customers where UserName='$username'");
if($row=mysql_fetch_array($sql1))
{
$custid=$row['CustomerId'];
}
/*$sql=mysql_query("select * from shoppingcarts where p_id='$selectedproductid' && CustomerId='$custid'");
if($row=mysql_fetch_array($sql))
{
$data['errormessage']="Product Already present In Cart!";
$this->load->view('cakedetails_view.php',$data);
}*/

$shape=$this->input->post('dynamic_cakeshape');
$sql=mysql_query("select * from cakeshapes where cakeshapeid='$shape'");
if($row=mysql_fetch_array($sql))
{
$cakeshapename=$row['cakeshapename'];
}
$selectedcakesize=$this->input->post('dynamic_cakesize');
$selectedflavour=$this->input->post('SelectFlavour');
$selectedfilling=$this->input->post('Filling');
$selectedmessage=$this->input->post('cakemessage');
$selectedquantity=$this->input->post('quantity');
$selectedprice=$this->input->post('price');
$totalpriceoforder=$selectedquantity*$selectedprice;
//var_dump($selectedmessage);
if($selectedfilling=="")
{

}
else
{
while (list ($key, $val) = each ($selectedfilling)){

$sql2 .= "$val,";

}
$this->load->model('cakedetails_model');
$this->cakedetails_model->insertshoppingcart($selectedproductid,$custid,$cakeshapename,$selectedcakesize,$sql2,$selectedflavour,$selectedmessage,$selectedquantity,$selectedprice,$totalpriceoforder);

$this->load->model('cakedetails_model');
$data['query5']=$this->cakedetails_model->displayshoppingcart($custid);
$this->load->view('shoppingcart_view',$data);

}
}

}
}

public function changecakesize()
{

$cakeid = $this->input->post('cakeid');
$drop1=$this->input->post('drop1');

$this->load->model('cakedetails_model');
echo $this->cakedetails_model->changecakesizemodel($cakeid,$drop1);
//$this->load->view('cakedetails_view',$data);
//echo $this->city_model->get_cities($state_id);
}

}
