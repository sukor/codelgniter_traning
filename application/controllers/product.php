<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends MY_Controller{
	public function index(){
		$this->load->view("product/index");
	}

	public function _products(){
		$this->load->view("product/list_products");
	}
}