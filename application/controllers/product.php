<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends MY_Controller{

public function __construct(){

  		parent::__construct();
       $this->load->model('m_product','m_p');

}


	public function index(){
		$this->load->view("product/index");
	}

	public function _products(){
		$this->load->view("product/list_products");
	}



	public function _form_edit_product(){
		$this->viewTemplate=false;
		$id=$this->input->post('id');

        $data['detail'] = $this->m_p->get_product_byid($id);

		$this->load->view("product/v_form",$data);
	}


	public function _save_edit_product(){

		$this->viewTemplate=false;
     

     $productName=  $this->input->post('productName',TRUE);
     $productVendor=  $this->input->post('productVendor',TRUE);
     $quantityInStock=  $this->input->post('quantityInStock',TRUE);
     $productCode=  $this->input->post('productCode',TRUE);

 

       
        $data=array(
             'productName'=>$productName,
             'productVendor'=>$productVendor,
             'quantityInStock'=>$quantityInStock,

        	);

        $this->db->where('productCode',$productCode);
       $status= $this->db->update('products',$data);


       if($status==1){

        echo json_encode($productCode);
       }else{
         


       }






	}



	
}