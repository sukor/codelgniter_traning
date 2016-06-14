 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /*
  File name:
  Description:
  author:
  Date:
  Function list:

 */

  class Customer extends MY_Controller{


  	public function __construct(){

  		parent::__construct();
       $this->load->model('m_customer','m_c');


  	}



     
     /******************************************
     author:
     date:
     ********************************************/
      
      public function index(){

        

      	$this->load->helper('url');

      	echo 'site url ='.site_url('home');
      	echo "<br>";
      	echo 'base url ='.base_url('');
        echo "<br>";
        echo 'achor ='.anchor('customer/customer/test/3/4','home');
        echo "<br>";
         
         echo "<a href=".site_url('home')."> home</a>";


      	 echo "ini index di customer";


      }
 	/******************************************
     author:
     date:
     ********************************************/

      public function test($val=1,$val2=2){

      	echo $val;
      	echo '<br>';
      	echo $val2;
      	echo '<br>';

      	$this->_kira($val,$val2);


      }

	/******************************************
     author:
     date:
     ********************************************/
      private function _kira($val1=0,$val2=0){
               
             echo $val1+$val2;

      }


	/******************************************
     author:
     date:
     ********************************************/
      public function test2($val=2,$val2=3){

      	$tot=$val+$val2;

      	redirect('home/test3/'.$tot);


      }

	/******************************************
     author:
     date:
     ********************************************/
      public function test3($tot){

      	echo $tot;

      }


     /******************************************
     author:
     date:
     ********************************************/
 	public function customer_detail(){

        $data['title']='hello wolrd';
        $data['customer']='ali bin abu';
        $data['senarai_customer']=array('ali','abu','samad','dollah');

          
        $this->load->view('v_customer_detail',$data);

      	

      }


         /******************************************
     author:
     date:
     ********************************************/
  public function _get_customer(){

  // $this->load->model('m_customer');

  $datacustomer= $this->m_c->get_customer_array();
  $datacustomerobj= $this->m_c->get_customer();

  echo "<pre>";
    print_r($datacustomer[0]['customerName']);
     print_r($datacustomer[0]['contactLastName']);
  echo "</pre>";

   echo "<pre>";
    print_r($datacustomerobj[0]->customerName);
    print_r($datacustomerobj[0]->contactLastName);
  echo "</pre>";


  die();
  }



   /******************************************
     author:
     date:
     ********************************************/
  public function _get_order_customer($cus='tiada',$pro='tiada',$page=0){


    $this->load->library('pagination');


    $dataserch=array();
   if($_POST){
    $customerName= $this->input->post('customerName',TRUE);
    $productName= $this->input->post('productName',TRUE);
     
     $dataserch=array(
      'customerName'=>$customerName,
       'productName'=>$productName
      );
    
   }else{


    $customerName= $cus;
    $productName= $pro;



      $dataserch=array(
      'customerName'=>$customerName,
       'productName'=>$productName
      );


   }
    $customerNamelink=empty($customerName)?'tiada':$customerName;
    $productNamelink=empty($productName)?'tiada':$productName;

    $srchlink=$customerNamelink.'/'.$productNamelink;
    



   
   

      $datav['order']= $this->m_c->get_order_customer($dataserch,$page);

    
      $config['base_url'] = site_url('customer/customer/get_order_customer');
      $config['total_rows'] = 30;
      $config['per_page'] = 10; 

//config for bootstrap pagination class integration
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = false;
        $config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';


$this->pagination->initialize($config);


 $datav['link']= $this->pagination->create_links();




    $this->load->view('customer/v_order_customer', $datav);
    


  }





  } //end of class


