<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Products</h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<table id="myDataTable" class="table">
		    <thead>
		        <tr>
		            <th>Product Name</th>
		            <th>Product Line</th>
		            <th>Vendor</th>
		            <th>Quantity in Stock</th>
		            <!-- <th>Price Each</th> -->
		            <th>Action</th>
		        </tr>
		    </thead>
		    <tbody></tbody>
		</table>
	</div>
</div>

<!-- start modal edit product -->
<div id="modaleditproduct" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <div id='formedit'></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id='editbtnsave' type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- end modal edit product -->

<script>
	$(document).ready(function(){

	var tableproduct=	$('#myDataTable').dataTable( {
			dom: 'Blfrtip',
			bstateSave:true,

        buttons: [
            'copyFlash',
            'csvFlash',
            'excelFlash',
            'pdfFlash'
        ],
	        processing: true,
	        serverSide: true,
	        ajax: {
	            "url": "<?=site_url('ajaxdatatable/product_datatable')?>",
	            "type": "POST",
	            "data": {'<?php echo $this->security->get_csrf_token_name(); ?>':
	            '<?php echo $this->security->get_csrf_hash(); ?>'}
	        },
	        columns: [
	            { data: "p.productName" },
	            {data : "p.productLine"},
	            {data : "p.productVendor"},
	            { data: "p.quantityInStock" }, 
	           // { data: "od.priceEach" }, 
	            { data: "$.action" } 
	        ]
	    });


	          $('#editbtnsave').click(function(){

	          	alert('tekan saya');
	          	//  ajax request submit edit product
                var request=$.ajax({
                	url:'<?=site_url('product/save_edit_product')?>',
                	method:"POST",
                	data: $('#editproduct').serializeArray(),
                	dataType:'json'
                });


                request.done(function(msg){
                    
                   // $('#formedit').html(msg);
                   tableproduct.fnDraw(false);
                   $('#modaleditproduct').modal('hide');


                    //alert(msg);


                });

                request.fail(function(jq,textstatus){
             
                 alert('Request Failed:'+textstatus);
                });
                // end ajax request form edit product


	          });


                







	});

	function fnEditProduct(productCode){
		//alert(productCode);
        $('#modaleditproduct').modal({
          keyboard: false
        });

        var rowpos=$('#myDataTable #'+productCode).position();

        $('body').scrollTop(rowpos.top);



        //  ajax request form edit product
        var request=$.ajax({
        	url:'<?=site_url('product/form_edit_product')?>',
        	method:"POST",
        	data: {id:productCode,'<?php echo $this->security->get_csrf_token_name(); ?>':
	            '<?php echo $this->security->get_csrf_hash(); ?>'},
        	dataType:'html'
        });


        request.done(function(msg){
            
            $('#formedit').html(msg);
            //alert(msg);

        });

        request.fail(function(jq,textstatus){
     
         alert('Request Failed:'+textstatus);
        });
        // end ajax request form edit product


	}
</script>