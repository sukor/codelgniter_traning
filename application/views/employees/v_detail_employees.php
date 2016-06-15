<?php
echo '<pre>';
print_r($detail);
echo '</pre>';
echo $detail->email;

?>
<div class="alert alert-success" role="alert">
Berjaya di tambah
</div>


 <div class="col-sm-4 col-md-4">
            <img src="http://thetransformedmale.files.wordpress.com/2011/06/bruce-wayne-armani.jpg"
            alt="" class="img-rounded img-responsive" />
        </div>
        <div class="col-sm-4 col-md-4">
            <blockquote>
                <p><?=$detail->firstName?></p> <small><cite title="Source Title">><?=$detail->lastName?> <i class="glyphicon glyphicon-map-marker"></i></cite></small>
            </blockquote>
            <p> <i class="glyphicon glyphicon-envelope"></i> <?=$detail->email?>
                <br
                /> <i class="glyphicon glyphicon-globe"></i> www.bootsnipp.com
                <br /> <i class="glyphicon glyphicon-gift"></i> January 30, 1974</p>
        </div>