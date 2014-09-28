<div class = "jumbotron text-left fill">
	<div class = "container">
		<h1>Latihan Soal UKDI</h1>
		<p><em>It is not in the stars to hold our destiny, but in ourselves</em></p>
        <!-- Single button -->
            <div class="btn-group">
              <button type="button" class="btn btn-info btn-lg dropdown-toggle" data-toggle="dropdown">
                Berapa Jumlah Soal yang Ingin Anda Kerjakan? <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url().'/exam_controller/exam_by_category_limit/'.$cat_id."/3";?>">Kerjakan 10 Soal Latihan</a></li>
                <li><a href="<?php echo site_url().'/exam_controller/exam_by_category_limit/'.$cat_id."/25";?>">Kerjakan 25 Soal Latihan</a></li>
                <li><a href="<?php echo site_url().'/exam_controller/exam_by_category_limit/'.$cat_id."/50";?>">Kerjakan 50 Soal Latihan</a></li>
                <li class="divider"></li>
                <li><a href="<?php echo site_url().'/exam_controller/exam_by_category_limit/'.$cat_id."/100";?>">Kerjakan 100 Soal Latihan</a></li>
              </ul>
            </div>
	</div>
</div>