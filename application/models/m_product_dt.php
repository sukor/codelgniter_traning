<?php

 class m_product_dt extends CI_Model implements DatatableModel{

        public function appendToSelectStr() {
                return array("action" => "p.productCode");
        }

        public function fromTableStr() {
            return 'products p';
        }

        public function joinArray(){
            // return array(
            // 	"orderdetails od"=>"od.productCode=p.productCode");
            return NULL;

        }

        public function whereClauseArray(){
            return NULL;
        }
   }