<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Cakedetails extends CI_Controller
{public function __construct()
{
parent:: __construct();
session_start();
$this->load->library('session');
$this->load->helper('url');
$this->load->library('javascript');
$this->load->model('pc_model');
$data['query'] = $this->pc_model->productcategory();
//$this->load->view('topmenu',$data);
$this->session->set_userdata('prevpage', uri_string());
$this->load->library('cart');
}
public function cake_details($cakeid)
{
$this->load->helper(array('form', 'url'));
$this->load->library('form_validation');

//$this->form_validation->set_rules('dynamic_cakeshape', 'Cake Shape', 'required');
//$this->form_validation->set_rules('dynamic_cakesize', 'Cake Size', 'required');
//$this->form_validation->set_rules('SelectFlavour', 'Cake Flavour', 'required');
//$this->form_validation->set_rules('cakemessage', 'Message On Cake', 'required');
//$this->form_validation->set_rules('cakemessage', 'Message On Cake', 'trim|max_length[50]|xss_clean');
if ($this->form_validation->run() == FALSE)
{
$data=array();
//$cakeid=$this->input->get("cakeid");
$this->load->model('cakedetails_model');
$data['query'] = $this->cakedetails_model->cakedetailsretrieve($cakeid);

$data['query2'] = $this->cakedetails_model->cakeshaperetrieve();
$this->load->model('pc_model');
$data['query5'] = $this->pc_model->productcategory();

$this->load->view('cakedetails_view',$data);
//$this->load->view('shoppingcart_view');

}

elseif($this->session->userdata('customerusername')=="" && $this->session->userdata('customerpassword')=="")
{
if(!isset($_SESSION['p_d'])){
    $_SESSION['p_d'] = array();
	
}
if(!isset($_SESSION['cartforsize'])){
    $_SESSION['cartforsize'] = array();
	
}
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
	
}
if(!isset($_SESSION['cartforquantity'])){
    $_SESSION['cartforquantity'] = array();
	
}
if(!isset($_SESSION['cartforprice'])){
    $_SESSION['cartforprice'] = array();
	
}
if(!isset($_SESSION['cartforfilling'])){
    $_SESSION['cartforfilling'] = array();
	
}
if(!isset($_SESSION['cartforflavour'])){
    $_SESSION['cartforflavour'] = array();
	
}
if(!isset($_SESSION['cartformessage'])){
    $_SESSION['cartformessage'] = array();
	
}
array_push($_SESSION['p_d'],$cakeid);

$shape=$this->input->post('dynamic_cakeshape');

$selectedflavour=$this->input->post('SelectFlavour');
$selectedcakesize=$this->input->post('dynamic_cakesize');
$selectedfilling=$this->input->post('Filling');
$selectedcakemessage=$this->input->post('cakemessage');
$selectedquantity=$this->input->post('quantity');
$selectedprice=$this->input->post('price');


//var_dump($selectedmessage);
if($selectedfilling=="")
{
$sql2="";
array_push($_SESSION['cartforfilling'],$sql2);
}
else
{
while (list ($key, $val) = each ($selectedfilling)){

$sql2 .= "$val,";

}
array_push($_SESSION['cartforfilling'],$sql2);
}

$sql=mysql_query("select * from cakeshapes where cakeshapeid='$shape'");
if($row=mysql_fetch_array($sql))
{
//$item['cake_shape']=$row['cakeshapename'];
array_push($_SESSION['cart'],$row['cakeshapename']);
}
//var_dump($_SESSION);
//$selectedcakesize=$this->input->post('dynamic_cakesize');
$res=mysql_query("select * from products where p_id='$cakeid'");
if($row=mysql_fetch_array($res))
{
/*$item['cake_image']=$row['p_image'];
$item['cake_name']=$row['p_name'];
$item['cake_frosting']=$row['p_frosting'];*/
$p_image=$row['p_image'];
$p_name=$row['p_name'];
$p_frosting=$row['p_frosting'];

}
if(!isset($_SESSION['cartforimage'])){
    $_SESSION['cartforimage'] = array();
}
if(!isset($_SESSION['cartforfrosting'])){
    $_SESSION['cartforfrosting'] = array();
}

array_push($_SESSION['cartforimage'],$p_image);
array_push($_SESSION['cartforfrosting'],$p_frosting);
if(!isset($_SESSION['cartforname'])){
    $_SESSION['cartforname'] = array();
	
}
array_push($_SESSION['cartforname'],$p_name);
array_push($_SESSION['cartforsize'],$selectedcakesize);
//$_SESSION['selectedcakesize']=$selectedcakesize;
array_push($_SESSION['cartforflavour'],$selectedflavour);
if($selectedcakemessage!="")
{

array_push($_SESSION['cartformessage'],$selectedcakemessage);
}
else 
{
$selectedcakemessage="";

//unset ($_SESSION['SelectedCakeMessage']);
array_push($_SESSION['cartformessage'],$selectedcakemessage);
}
array_push($_SESSION['cartforquantity'],$selectedquantity);
array_push($_SESSION['cartforprice'],$selectedprice);

/*$item['cake_id']=$cakeid;

$item['cake_flavour']=$this->input->post('SelectFlavour');
$item['cake_size']=$this->input->post('dynamic_cakesize');
$selectedfilling=$this->input->post('Filling');
$item['cake_message']=$this->input->post('cakemessage');
$item['cake_quantity']=$this->input->post('quantity');

$item['cake_price']=$this->input->post('price');

//var_dump($selectedmessage);
if($selectedfilling=="")
{

}
else
{
while (list ($key, $val) = each ($selectedfilling)){

$sql2 .= "$val,";

}
}
$item['cake_filling']=$sql2;
$cart=$this->session->userdata('cart');
$cart[]=$item;
$this->session->set_userdata('cart',$cart);*/

/*for($i=0;$i<count($cart);$i++)
{
echo $cart[$i]['cake_id'];
}*/

//for filling
/*$cart_filling = $this->session->userdata('selectedfilling');
$cart_filling[] = $sql2;
$this->session->set_userdata('selectedfilling', $cart_filling);
}
//for cakeshape
//$cart_shape=array();
$cart_shape = $this->session->userdata('selectedcakeshape');
$cart_shape[count($cart_shape)]=$this->input->post('dynamic_cakeshape');
$this->session->set_userdata('selectedcakeshape', $cart_shape);
//for cake size
$cart_size = $this->session->userdata('selectedcakesize');
$cart_size[count($cart_size)]= $selectedcakesize;
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




$this->session->set_userdata('selectedcakeshape', $selectedcakeshape);*/



$this->load->view('shoppingcart_view.php');
}

else if($this->session->userdata('customerusername')!="" && $this->session->userdata('customerpassword')!="")
{

$selectedproductid=$this->session->userdata('productid');

$username=$this->session->userdata('customerusername');
$getcust=mysql_query("select * from customers where UserName='$username'");
if($row1=mysql_fetch_array($getcust))
{
$custid=$row1['CustomerId'];
}

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

while (list ($key, $val) = each ($selectedfilling)){

$sql2 .= "$val,";

}

$this->load->model('cakedetails_model');
$this->cakedetails_model->insertshoppingcart($cakeid,$custid,$cakeshapename,$selectedcakesize,$sql2,$selectedflavour,$selectedmessage,$selectedquantity,$selectedprice,$totalpriceoforder);

//$this->load->model('cakedetails_model');
//$data['query5']=$this->cakedetails_model->displayshoppingcart($custid);
//$this->load->view('topmenu',$data);
$this->load->view('shoppingcart_view');

}
//$this->load->view('shoppingcart_view');
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
public function removecakeid($shoppingid)
{

$this->load->model('cakedetails_model');
$check=$this->cakedetails_model->removeproduct($shoppingid);
$this->load->view('shoppingcart_view.php',$check);


}
public function updatecakeid($shoppingid)
{
$this->load->model('cakedetails_model');
$data['query']=$this->cakedetails_model->editproduct($shoppingid);
$this->load->model('pc_model');
$data['query8'] = $this->pc_model->productcategory();
$this->load->view('updateshoppingcart_view.php',$data);

}
public function updatecakedetails($shoppingid)
{
$cakeshape=$this->input->post('dynamic_cakeshape');
$cakesize=$this->input->post('dynamic_cakesize');
$flavour=$this->input->post('SelectFlavour');
$filling=$this->input->post('Filling');
while (list ($key, $val) = each ($filling)){

$sql2 .= "$val,";

}
$cakemessage=$this->input->post('cakemessage');
$quantity=$this->input->post('quantity');
$totalprice=$this->input->post('price');
$this->load->model('cakedetails_model');
$this->cakedetails_model->updatecart($shoppingid,$cakeshape,$cakesize,$flavour,$sql2,$cakemessage,$quantity,$totalprice);
$this->load->view('shoppingcart_view');
}
public function incquantity($shoppingid,$currentquantity,$productprice)
{

$this->load->model('cakedetails_model');
$this->cakedetails_model->increasequantity($shoppingid,$currentquantity,$productprice);
$this->load->view('shoppingcart_view');
}
public function decquantity($shoppingid,$currentquantity,$productprice)
{
$this->load->model('cakedetails_model');
$this->cakedetails_model->decreasequantity($shoppingid,$currentquantity,$productprice);
$this->load->view('shoppingcart_view');
}
public function checkoutnow($custid)
{
$this->load->library('form_validation');
if ($this->form_validation->run() == FALSE)
{
$data=array();
$custusername=$this->session->userdata('customerusername');
$this->load->model('displaydashboard_model');
//$data['query'] = $this->displaydashboard_model->display_dashboard($custusername);
$data['query'] = $this->displaydashboard_model->display_ccinfo();
$this->load->view('creditcardinfo_view',$data);

}
}
public function creditcardvalidate($custid)
{
$custfname=$this->input->post('firstname');
$custlname=$this->input->post('lastname');
$contactnew=$this->input->post('customercontact');
$emailnew=$this->input->post('customeremail');
$ss=$this->input->post('shippingstreet');
$sc=$this->input->post('shippingcity');
$sstate=$this->input->post('shippingstate');
$szip=$this->input->post('shippingzip');
$bs=$this->input->post('billingstreet');
$bc=$this->input->post('billingcity');
$bstate=$this->input->post('billingstate');
$bzip=$this->input->post('billingzip');
$ccfirstnamenew=$this->input->post('ccfirstname');
$cclastnamenew=$this->input->post('cclastname');
$ccnumbernew=$this->input->post('ccnumber');
$cvvnew=$this->input->post('cvv');
$expirymonthnew=$this->input->post('validmonth');
$expiryyearnew=$this->input->post('validyear');
$_SESSION['emailid']=$this->input->post('customeremail');
$date = date('Y-m-d H:i:s');
$expr = '/^\+?(\(?[0-9]{3}\)?|[0-9]{3})[-\.\s]?[0-9]{3}[-\.\s]?[0-9]{4}$/';

//VALIDATIONS
if(strlen($contactnew)==0 || strlen($emailnew)==0 || strlen($ss)==0 || strlen($sc)==0 || strlen(sstate)==0 || strlen($szip)==0 || strlen($bs)==0 || strlen($bc)==0 || strlen($bc)==0 || strlen($bstate)==0 || strlen($bzip)==0 || strlen($ccfirstnamenew)==0 || strlen($cclastnamenew)==0 || strlen($ccnumbernew)==0 || strlen($cvvnew)==0 || strlen($expirymonthnew)==0 || strlen($expiryyearnew)==0  )
{
$data['errormessage']="Please Enter All The Fields!";
$this->load->view('creditcardinfo_view',$data);

}
else if(!preg_match($expr, $contactnew))
{

$data['errormessage']="Invalid Contact Number!";
$this->load->view('creditcardinfo_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$contactnew))
{
$data['errormessage']="Invalid Contact Number!";
$this->load->view('creditcardinfo_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$ss))
{
$data['errormessage']="Invalid Shipping Street!";
$this->load->view('creditcardinfo_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$sc))
{
$data['errormessage']="Invalid Shipping City!";
$this->load->view('creditcardinfo_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$sstate))
{
$data['errormessage']="Invalid Shipping State!";
$this->load->view('creditcardinfo_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$szip))
{
$data['errormessage']="Invalid Shipping Zip!";
$this->load->view('creditcardinfo_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$bs))
{
$data['errormessage']="Invalid Billing Street!";
$this->load->view('creditcardinfo_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$bc))
{
$data['errormessage']="Invalid Billing City!";
$this->load->view('creditcardinfo_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$bstate))
{
$data['errormessage']="Invalid Billing State!";
$this->load->view('creditcardinfo_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$bzip))
{
$data['errormessage']="Invalid Billing Zip!";
$this->load->view('creditcardinfo_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$ccfirstnamenew))
{
$data['errormessage']="Invalid Card holder First name!";
$this->load->view('creditcardinfo_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$cclastnamenew))
{
$data['errormessage']="Invalid Card Holder Last Name!";
$this->load->view('creditcardinfo_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$ccnumbernew))
{
$data['errormessage']="Invalid Credit card Number!";
$this->load->view('creditcardinfo_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$cvvnew))
{
$data['errormessage']="Invalid CVV Number!";
$this->load->view('creditcardinfo_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$expirymonthnew))
{
$data['errormessage']="Invalid Credit card expiry month!";
$this->load->view('creditcardinfo_view',$data);
}
else if(preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$expiryyearnew))
{
$data['errormessage']="Invalid Credit Card expiry year!";
$this->load->view('creditcardinfo_view',$data);
}
else if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$emailnew))
{
$data['errormessage']="Invalid Email!";
$this->load->view('creditcardinfo_view',$data);
}
else if(!is_numeric($bzip))
{
$data['errormessage']="Invalid Billing Zip!";
$this->load->view('creditcardinfo_view',$data);
}
else if(!is_numeric($szip))
{
$data['errormessage']="Invalid Shipping Zip!";
$this->load->view('creditcardinfo_view',$data);
}
else if($szip==0 || $bzip==0)
{
$data['errormessage']="Zip Codes cannot be 0!";
$this->load->view('creditcardinfo_view',$data);
}
else if(!is_numeric($cvvnew) || strlen($cvvnew)>4 || strlen($cvvnew)<3)
{
$data['errormessage']="CVV should be a 3 or 4 digit number!";
$this->load->view('creditcardinfo_view',$data);
}
else if(!is_numeric($ccnumbernew))
{
$data['errormessage']="Credit Card Number should be in digits!";
$this->load->view('creditcardinfo_view',$data);
}
else if(strlen($ccnumbernew)>16 || strlen($ccnumbernew)<16)
{
$data['errormessage']="Credit Card number should be 16 digits long!";
$this->load->view('creditcardinfo_view',$data);
}
else if(!is_numeric($expirymonthnew) || $expirymonthnew<0 || $expirymonthnew>12 || strlen($expirymonthnew)>2)
{
$data['errormessage']="Invalid Credit card expiry month!";
$this->load->view('creditcardinfo_view',$data);
}
else if(!is_numeric($expiryyearnew) || $expiryyearnew<date("Y") || strlen($expiryyearnew)>4)
{
$data['errormessage']="Invalid Credit card expiry year!";
$this->load->view('creditcardinfo_view',$data);
}
else if($expiryyearnew==date("Y") && $expirymonthnew<date("m"))
{
$data['errormessage']="Invalid Credit card expiry date!";
$this->load->view('creditcardinfo_view',$data);
}
else
{
$this->load->model('displaydashboard_model');
$this->displaydashboard_model->insertorder($custid,$custfname,$custlname,$contactnew,$emailnew,$ss,$sc,$szip,$sstate,$bs,$bc,$bzip,$bstate,$ccfirstnamenew,$cclastnamenew,$ccnumbernew,$cvvnew,$expirymonthnew,$expiryyearnew,$date);
$this->session->set_userdata('emailid',$this->input->post('customeremail'));
$this->load->view('orderconfirm.php');


}
}
public function displaycart()
{
$this->load->view('shoppingcart_view.php');
}
}
