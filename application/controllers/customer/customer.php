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
  public function _get_order_customer(){

   
   if($_SERVER['REQUEST_METHOD']=="POST"){
    $customerName= $this->input->post('customerName',TRUE);
    $productName= $this->input->post('productName',TRUE);
   }
    


    $product= $this->m_c->get_product();

         $optio[]='Sila Pilih';
        foreach ($product as $row) {
          $optio[$row->productCode]=
          $row->productName."(".$row->productCode.")";
        }

      
    $datav['optionproduct']=$optio;

    $datav['order']= $this->m_c->get_order_customer($customerName,$productName);

    $this->load->view('customer/v_order_customer', $datav);
    


  }


    /******************************************
     author:
     date:
     ********************************************/
  public function _add_employees(){


        $data['title']='hello wolrd';

        $this->form_validation->set_rules('firstName',"First Name",'required|alpha|callback_nameCheck');
        $this->form_validation->set_rules('lastName',"Last Name",'required|alpha|callback_nameCheck');
        $this->form_validation->set_rules('email',"Email",'required|valid_email|is_unique[employees.email]|matches[emailp]');
        $this->form_validation->set_rules('emailp',"Email",'required|valid_email|is_unique[employees.email]');
        $this->form_validation->set_message('required','%s Wajib Di isi');
        $this->form_validation->set_message('alpha','%s Huruf sahaja');
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">','</div>');
        



        if($this->form_validation->run()==false){


             $this->load->view('employees/v_form_add',$data);

       
        }else{

          $firstName=$this->input->post('firstName',TRUE);
          $lastName=$this->input->post('lastName',TRUE);
          $email=$this->input->post('email',TRUE);


          $dataepmloyes=array(
                  'firstName'=>$firstName,
                  'lastName'=>$lastName,
                  'email'=>$email,

            );

     $secc=$this->m_c->add_employees($dataepmloyes);

     if($secc){


            redirect('customer/customer/success_add_employee/'.$secc);


     }else{



     }


      

         

        }
   


        }


     /******************************************
     author:
     date:
     ********************************************/


        public function nameCheck($val){

          if($val=='test'){

            $this->form_validation->set_message('nameCheck','%s tidak boleh nama test');

           return FALSE;
          }else{

             return TRUE;
          }

             

        }


  /******************************************
     author:
     date:
     ********************************************/


        public function _success_add_employee($id){

          
       $datav['detail'] = $this->m_c->get_employeebyid($id);

       $this->load->view('employees/v_detail_employees',$datav);

             

        }


        /******************************************
     author:
     date:
     ********************************************/


        public function _edit_order($id){

          
       $datav['detail'] = $this->m_c->get_order_customerbyId($id);

       $this->load->view('customer/v_edit_order',$datav);

             

        }






  } //end of class


