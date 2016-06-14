<?php
$atb=array('class'=>'form-horizontal');
echo form_open('customer/customer/add_employees',$atb);
?>

<fieldset>

<!-- Form Name -->
<legend>ADD EMPLOYEE</legend>
<?= validation_errors()?>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="customerName ">firstName</label>  
  <div class="col-md-4">

   <?php

   $inputfirstName=array(
     'name'=>'firstName',
     'id'=>'firstName',
     'class'=>'form-control input-md'
   	);


    echo form_input( $inputfirstName);

   ?>

    
  </div>
</div>
<!-- end input -->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="customerName ">lastName</label>  
  <div class="col-md-4">

   <?php

   $inputlastName=array(
     'name'=>'lastName',
     'id'=>'lastName',
     'class'=>'form-control input-md'
    );


    echo form_input( $inputlastName);

   ?>

    
  </div>
</div>
<!-- end input -->




<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button type='submit' id="" name="" class="btn btn-primary">Search</button>
  </div>
</div>

</fieldset>
</form>