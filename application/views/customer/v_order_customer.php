<div class="page-header">
  <h1>Order <small>customer</small></h1>
</div>


<?php
$atb=array('class'=>'form-horizontal');
echo form_open('customer/customer/get_order_customer',$atb);
?>

<fieldset>

<!-- Form Name -->
<legend>Order Search</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="customerName ">Customer</label>  
  <div class="col-md-4">

   <?php

   $inputCustomername=array(
     'name'=>'customerName',
     'id'=>'customerName',
     'class'=>'form-control input-md'
   	);


    echo form_input( $inputCustomername);

   ?>

    
  </div>
</div>



<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="productName">Product</label>
  <div class="col-md-4">

    <?php

    //$option=array('1'=>'kancil','2'=>'saga');
    $atrbproductname='class="form-control" id="dropproduct"';
     
     echo form_dropdown('productName',$optionproduct,
      '', $atrbproductname);


    ?>


  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button type='submit' id="" name="" class="btn btn-primary">Search</button>
  </div>
</div>

</fieldset>
</form>






<?php
// echo "<pre>";
// print_r($order);
// echo "</pre>";

$this->table->set_heading(array('Customer','Product Name',
	'Product Code ','Quantity Ordered  ','Date','Action'));

// add template
$tmpl=array('table_open'=>'<table class="table" id="ordertable">');
$this->table->set_template($tmpl);
//end add template


foreach ($order as $row) {

//button action
$linkedit=anchor('customer/customer/edit_order/'.$row->orderNumber,'Edit',array('class'=>'btn btn-info'));
$linkpadam=anchor('customer/customer/delete_order/'.$row->orderNumber,'Delete',array('class'=>'btn btn-info'));
$btnaction='
<div class="btn-group btn-group-justified" role="group" >'.
$linkedit.$linkpadam.'</div>';
// button action


	$this->table->add_row(array($row->customerName,
		$row->productName,$row->productCode,
		$row->quantityOrdered,$row->orderDate,$btnaction));
	
}


echo $this->table->generate();


?>

<script type="text/javascript">
$(document).ready(function(){

  $('#dropproduct').multiselect({
    enableFiltering:true,
    enableCaseInsensitiveFiltering:true

  });

    
    $('#ordertable').DataTable();



});


</script>
<style type="text/css">
 #dropproduct{
  display: none !important;
 }

</style>



