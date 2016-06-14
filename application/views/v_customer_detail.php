

<div class="jumbotron">
  <h1><?= $customer ?></h1>
  <p>...</p>
  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
</div>

	
	<table class='table'>
		<tr>
			<th> nama</th>

		</tr>
		
	<?php

	foreach ($senarai_customer as $row) {
		?>
    <tr>
    <td> <?=$row ?> </td>
    </tr>
		<?php
		
	}

	?>
     
</table>


