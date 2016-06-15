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
		            <th>Price Each</th>
		            <th>Action</th>
		        </tr>
		    </thead>
		    <tbody></tbody>
		</table>
	</div>
</div>

<script>
	$(document).ready(function(){
		$('#myDataTable').dataTable( {
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
	            { data: "od.priceEach" }, 
	            { data: "$.action" } 
	        ]
	    });
	});

	function fnEditProduct(productCode){
		alert(productCode);
	}
</script>