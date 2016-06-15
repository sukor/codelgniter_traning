<?php
$atb=array('class'=>'form-horizontal');
echo form_open('customer/customer/add_employees',$atb);
?>

<fieldset>

<!-- Form Name -->
<legend>ADD EMPLOYEE</legend>
<?= validation_errors()?>

<!-- Text input-->
<div class="form-group <?php if(form_error('firstName')){ echo 'has-error';}?>">
  <label class="col-md-4 control-label" for="firstName ">firstName</label>  
  <div class="col-md-4">

   <?php

   $inputfirstName=array(
     'name'=>'firstName',
     'id'=>'firstName',
     'class'=>'form-control input-md',
     'value'=>set_value('firstName')
   	);


    echo form_input( $inputfirstName);
    echo form_error('firstName','<p class="help_block">','</p>');

   ?>

    
  </div>
</div>
<!-- end input -->

<!-- Text input-->
<div class="form-group <?php if(form_error('lastName')){ echo 'has-error';}?>">
  <label class="col-md-4 control-label" for="lastName ">lastName</label>  
  <div class="col-md-4">

   <?php

   $inputlastName=array(
     'name'=>'lastName',
     'id'=>'lastName',
     'class'=>'form-control input-md'
    );


    echo form_input( $inputlastName);
    echo form_error('lastName','<p class="help_block">','</p>');

   ?>

    
  </div>
</div>
<!-- end input -->

<!-- Text input-->
<div class="form-group <?php if(form_error('email')){ echo 'has-error';}?>">
  <label class="col-md-4 control-label" for="email ">Email</label>  
  <div class="col-md-4">

   <?php

   $inputemail=array(
     'name'=>'email',
     'id'=>'email',
     'class'=>'form-control input-md',
     'value'=>set_value('email')
    );


    echo form_input( $inputemail);
    echo form_error('email','<p class="help_block">','</p>');

   ?>

    
  </div>
</div>
<!-- end input -->

<!-- Text input-->
<div class="form-group <?php if(form_error('emailp')){ echo 'has-error';}?>">
  <label class="col-md-4 control-label" for="emailp ">Email Repeat</label>  
  <div class="col-md-4">

   <?php

   $inputemailp=array(
     'name'=>'emailp',
     'id'=>'emailp',
     'class'=>'form-control input-md',
     'value'=>set_value('emailp')
    );


    echo form_input( $inputemailp);
    echo form_error('emailp','<p class="help_block">','</p>');

   ?>

    
  </div>
</div>
<!-- end input -->




<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button type='submit' id="" name="" class="btn btn-primary">Save</button>
  </div>
</div>

</fieldset>
</form>