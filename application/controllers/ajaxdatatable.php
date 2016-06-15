<?php

class Ajaxdatatable extends CI_Controller {
    public function product_datatable() {
        //Important to NOT load the model and let the library load it instead.  
        $this -> load -> library('Datatable',
				         array('model' => 'm_product_dt',
				         'rowIdCol' => 'p.productCode'));

        $this -> datatable -> setPreResultCallback(
                    function(&$json) {
                        $rows =& $json['data'];
                        foreach($rows as &$r) {
                        	$r['$']['action'] = '<button type="button" class="btn btn-info btn-circle" onclick="fnEditProduct(\''.$r['p']['productCode'].'\')">
                    							<i class="fa fa-edit"></i>
                        						</button>';
                        }


                        $json['a_custom_property'] = 'Check me out with firebug!';  
                    }
                );

        //format array is optional, but shown here for the sake of example
        $json = $this -> datatable -> datatableJson();

        $this -> output -> set_header("Pragma: no-cache");
        $this -> output -> set_header("Cache-Control: no-store, no-cache");
        $this -> output -> set_content_type('application/json') -> set_output(json_encode($json));

    }

}