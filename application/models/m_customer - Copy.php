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
      
 function get_order_customer($dataserch,$page){

 	$this->db->select('*');
 	$this->db->from('orders o');
 	$this->db->join('customers c',
 		'o.customerNumber = c.customerNumber','right');
 	$this->db->join('orderdetails od',
 		'od.orderNumber=o.orderNumber','right');
 	$this->db->join('products p',
 		'p.productCode =od.productCode ','right');



 

 	// if($customerName){

 	// 	$this->db->like('c.customerName',$customerName,'both');

 	// }

if(!empty($dataserch)){
  foreach ($dataserch as $key => $row) {

          if($key=='customerName'){
             if($row !='tiada'){


            $this->db->like('c.customerName',$row,'both');
   
              }
          }else{

             if($row !='tiada'){


             $this->db->where('p.productName',urldecode($row));
   
   
              }

           
          }
      

  }
}

 $tempdb = clone $this->db;
  $num_result = $tempdb->count_all_results(); 

    $this->db->limit(10,$page);

    $query=$this->db->get();


    if($query->num_rows() > 0){

      $data['count']=$num_result;
      $data['result']=$query->result();

        return $data;   //array

    }

 
    

    


 }






} // end of class