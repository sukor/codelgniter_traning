<?php
//print_r($detail);

$atb=array('class'=>'form-horizontal','id'=>'editproduct','data-toggle'=>'validator');
echo form_open('',$atb);
?>

<fieldset>

<!-- Form Name -->

<?= validation_errors()?>

<!-- Text input-->
<?= form_hidden('productCode',$detail[0]->productCode)?>
<div class="form-group <?php if(form_error('productName')){ echo 'has-error';}?>">
  <label class="col-md-4 control-label" for="productName ">productName</label>  
  <div class="col-md-4">

   <?php

   $productName=array(
     'name'=>'productName',
     'id'=>'productName',
     'class'=>'form-control input-md col-md-8',
     'value'=>$detail[0]->productName,
     'required'=>'required',
     'data-error'=>'Sila Masukan'
   	);


    echo form_input( $productName);
    echo form_error('productName','<p class="help_block with-errors">','</p>');

   ?>
   <div class="help-block with-errors"></div>
    
  </div>
</div>
<!-- end input -->

<!-- Text input-->
<div class="form-group <?php if(form_error('productVendor')){ echo 'has-error';}?>">
  <label class="col-md-4 control-label" for="productVendor ">productVendor</label>  
  <div class="col-md-4">

   <?php

   $productVendor=array(
     'name'=>'productVendor',
     'id'=>'productVendor',
     'class'=>'form-control input-md',
     'value'=>set_value('productVendor',$detail[0]->productVendor)
    );


    echo form_input( $productVendor);
    echo form_error('productVendor','<p class="help_block">','</p>');

   ?>

    
  </div>
</div>
<!-- end input -->

<!-- Text input-->
<div class="form-group <?php if(form_error('quantityInStock')){ echo 'has-error';}?>">
  <label class="col-md-4 control-label" for="quantityInStock ">quantityInStock</label>  
  <div class="col-md-4">

   <?php

   $quantityInStock=array(
     'name'=>'quantityInStock',
     'id'=>'quantityInStock',
     'class'=>'form-control input-md',
     'value'=>set_value('quantityInStock',$detail[0]->quantityInStock)
    );


    echo form_input( $quantityInStock);
    echo form_error('quantityInStock','<p class="help_block">','</p>');

   ?>

    
  </div>
</div>
<!-- end input -->




</fieldset>
</form>
<script type="text/javascript">
$(document).ready(function(){

  $('#addemployesform').validator();

});


</script>