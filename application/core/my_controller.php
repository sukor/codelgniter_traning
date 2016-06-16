<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_Controller extends CI_Controller{

  public $viewTemplate; 

   public function __construct(){

      parent::__construct();
      $this->viewTemplate=true;
       

    }


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

      if(!$this->viewTemplate){
           echo $output;
      }else{
      $respon["content_view"] = $output;
      echo $this->load->view('template_admin',$respon,TRUE);
     }

    }
}// end of class