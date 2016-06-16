<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /*
  File name:
  Description:
  author:
  Date:
  Function list:

 */

class M_product extends CI_Model{


    /******************************************
     author:
     date:
     ********************************************/
      
 function get_product_byid($id){
  $this->db->select('*');
  $this->db->from('products');
  $this->db->where('productCode',$id);

  $query=$this->db->get();
     if($query->num_rows() > 0){

  return $query->result(); 

    }
}


}