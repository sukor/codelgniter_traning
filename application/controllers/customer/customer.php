 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /*
  File name:
  Description:
  author:
  Date:
  Function list:

 */

  class Customer extends CI_Controller{


  	public function __construct(){

  		parent::__construct();

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






  } //end of class


