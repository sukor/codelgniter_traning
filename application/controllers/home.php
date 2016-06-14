 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

 /*
  File name:
  Description:
  author:
  Date:
  Function list:

 */

  class Home extends CI_Controller{

    public function _remap($method, $params = array()){
      if($method!="index")
        $method = '_'.$method;

      if(method_exists($this, $method))
      {
        return call_user_func_array([$this, $method], $params);
      }

        show_404();
    }

    public function _output($output){
      $respon["content_view"] = $output;
      echo $this->load->view('template_admin',$respon,TRUE);
    }
     
     /******************************************
     author:
     date:
     ********************************************/
      
      public function index(){

         $datav['title']='home';

        $datav['title']='hello wolrd';
        $datav['customer']='ali bin abu';
        $datav['senarai_customer']=array('ali','abu','samad','dollah');


        $this->load->view('v_customer_detail',$datav);
      	 


      }
 	/******************************************
     author:
     date:
     ********************************************/

      public function _test($val,$val2){

      	echo $val;
      	echo '<br>';
      	echo $val2;
      }


        public function _test3($tot=3){

      	echo $tot;

      }



  } //end of class

