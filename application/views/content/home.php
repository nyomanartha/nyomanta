<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Carousel -->
<div class="container">
<div id="owl-demo" class="owl-carousel owl-theme">
<?php
foreach($recCarousel->result() as $dataCarousel)
{ ?>
	<div class="item bg-warning text-center">
  		<img src="<?php echo base_url().'img/carousel/'.$dataCarousel->crs_img;?>" alt="The Last of us">
        <h3 style="margin:0px; padding:15px;"><?php echo $dataCarousel->crs_header;?></h3>
	</div>
<?php
} ?>
</div>
</div>
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- All Exam Big Box -->   
<hr/>
<div class="container">
<div class="row">
  <div class="col-md-4">
    <div class="thumbnail text-center">
      <img src="<?php echo base_url().'img/car_360x275.png';?>"  alt="...">
      <div class="caption">
         <h3>Soal Ujian Kompetensi Dokter Indonesia (UKDI)</h3>
        <p>Kumpulan soal dari berbagai divisi yang dirancang khusus untuk simulasi "Ujian Kompetensi Dokter Indonesia!"</p>
        <a href="<?php echo site_url().'/exam_controller/all_exam/';?>" class="btn btn-block btn-success" role="button"><i class="fa fa-pencil"></i> Do It!</a>
      </div>
    </div>
  </div>
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Exam by Category -->
<?php
	$idCatSpecialLama=0;
	foreach($recCategory->result() as $dataCategory)
{ 
	$idCatSpecialBaru=$dataCategory->cat_id;
	if($idCatSpecialBaru!=$idCatSpecialLama)
{ ?>
  <div class="col-md-2">
    <div class="thumbnail text-center">
      <img src="<?php echo base_url().'img/'.$dataCategory->cat_img;?>" data-src="holder.js/100%x100%" alt="...">
      <div class="caption">
        <h5 style="min-height:33px;height:33px;line-height:20px;"><b><?php echo $dataCategory->cat_name;?></b></h5>
        <a href="<?php echo site_url().'/exam_controller/exam_by_category/'.$idCatSpecialBaru;?>" class="btn btn-primary" role="button">
        <i class="fa fa-pencil"></i> Do It!</a>
      </div>
    </div>
  </div>
<?php 
}
	$idCatSpecialLama=$idCatSpecialBaru;
} ?>
</div>
</div>
<!-- Start Script -->
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Script Owl Carousel -->
<script>
$(document).ready(function() {
 
  $("#owl-demo").owlCarousel({
 
      navigation : false, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true,
	  responsive:true,
	  autoPlay:true
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  }); 
});
</script>
