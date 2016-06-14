 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /*
  File name:
  Description:
  author:
  Date:
  Function list:

 */

  class Home extends CI_Controller{
     
     /******************************************
     author:
     date:
     ********************************************/
      
      public function index(){

         $datav['title']='home';

        $datav['title']='hello wolrd';
        $datav['customer']='ali bin abu';
        $datav['senarai_customer']=array('ali','abu','samad','dollah');


         $data['content_view']=$this->load->view('v_customer_detail',$datav,TRUE);
      	 $this->load->view('template_admin',$data);


      }
 	/******************************************
     author:
     date:
     ********************************************/

      public function test($val,$val2){

      	echo $val;
      	echo '<br>';
      	echo $val2;
      }


        public function test3($tot){

      	echo $tot;

      }



  } //end of class

