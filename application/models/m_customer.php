<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /*
  File name:
  Description:
  author:
  Date:
  Function list:

 */

class M_customer extends CI_Model{

   
     /******************************************
     author:
     date:
     ********************************************/
      
 function get_customer(){

 	$query=$this->db->get('customers');
 	return $query->result();  //object
   // return $query->result_array();   //array


 }


      /******************************************
     author:
     date:
     ********************************************/
      
 function get_customer_array(){

 	$query=$this->db->get('customers');
 	//return $query->result();  //object
    return $query->result_array();   //array


 }

    /******************************************
     author:
     date:
     ********************************************/
      
 function get_order_customer($customerName,$productName){

 	$this->db->select('*');
 	$this->db->from('orders o');
 	$this->db->join('customers c',
 		'o.customerNumber = c.customerNumber','right');
 	$this->db->join('orderdetails od',
 		'od.orderNumber=o.orderNumber','right');
 	$this->db->join('products p',
 		'p.productCode =od.productCode ','right');



 

 	if($customerName){

 		$this->db->like('c.customerName',$customerName,'both');

 	}


  if($productName){

    $this->db->where('p.productCode',$productName);

  }



    $query=$this->db->get();


    if($query->num_rows() > 0){

    

        return $query->result();

    }

 
    

    


 }


      /******************************************
     author:
     date:
     ********************************************/
      
 function get_product(){
  $this->db->select('productName,productCode');
  $this->db->from('products');
  $this->db->order_by('productName','ASC');

  $query=$this->db->get();
     if($query->num_rows() > 0){

  return $query->result(); 

    }
}

         /******************************************
     author:
     date:
     ********************************************/
      

 function add_employees($data){
  
   $this->db->insert('employees',$data);

    return $this->db->insert_id();


 }

       /******************************************
     author:
     date:
     ********************************************/
      

 function get_employeebyid($id){
      
  $this->db->select('*');
  $this->db->from('employees');
  $this->db->where('employeeNumber',$id);
  
  $query=$this->db->get();
     if($query->num_rows() > 0){

  return $query->row(); 

    }
  

}


    /******************************************
     author:
     date:
     ********************************************/
      
 function get_order_customerbyId($id){

  $this->db->select('*');
  $this->db->from('orders o');
  $this->db->join('customers c',
    'o.customerNumber = c.customerNumber','right');
  $this->db->join('orderdetails od',
    'od.orderNumber=o.orderNumber','right');
  $this->db->join('products p',
    'p.productCode =od.productCode ','right');



    $this->db->where('o.orderNumber',$id);




    $query=$this->db->get();


    if($query->num_rows() > 0){

    

        return $query->result();

    }

 
    

    


 }






} // end of class