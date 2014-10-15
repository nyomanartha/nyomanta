<div class = "jumbotron text-left fill">
	<div class = "container">
		<h1>Latihan Soal UKDI</h1>
		<p><em>It is not in the stars to hold our destiny, but in ourselves</em></p>
        <!-- Single button -->          
	</div>
</div>    
    
   
<div class="container" >
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <form action="<?php echo site_url().'/exam_controller/exam_process/';?>" method="post">
        <input type="text" name="pageposition" value="<?php echo $this->uri->segment(3); ?>" />
			<?php
			$no=1;
            foreach($recQuestion->result() as $dataQuestion)
            { ?>            
            <div class="panel panel-primary">
               <div class="panel-heading">
               <input type="text" name="idresult[<?php echo $dataQuestion->qst_id; ?>]" value="<?php echo $dataQuestion->idresult; ?>" />
               <h3>Soal Nomor <?php echo $no;?></h3>
              </div>
                <div class="panel-body">
                    <div class="panel panel-success">
                        <!-- Default panel contents -->
                        <div class="panel-body">
                            <p><?php echo $dataQuestion->qst_description;?></p>
                        </div>
                    </div>
                    <div class="panel panel-info">
                        <!-- Default panel contents -->
                        <div class="panel-heading"><?php echo $dataQuestion->qst_question;?></div>
                        <div class="panel-body">
                        <?php
						if($dataQuestion->opt_idku==0)
						{?>
                        <input type="radio" name="optionsRadios[<?php echo $dataQuestion->qst_id;?>]" value="0" checked="checked"/>
						<?php }
						?>
                        	
							<?php
                            $recOption=$this->option_model->getOptQuestionID($dataQuestion->qst_id);
                            foreach($recOption->result() as $dataOption)
                            { ?>
                            <div class="radio">
                                <label>
                                <?php
								if($dataQuestion->opt_idku==$dataOption->opt_id)
								{?>
                                <input type="radio" name="optionsRadios[<?php echo $dataQuestion->qst_id;?>]" id="optionsRadios1" value="<?php echo $dataOption->opt_id;?>" checked="checked">
								<?php }
								else
								{?>
                                <input type="radio" name="optionsRadios[<?php echo $dataQuestion->qst_id;?>]" id="optionsRadios1" value="<?php echo $dataOption->opt_id;?>">
								<?php }
								?>
                                    
                                    <?php echo $dataOption->opt_choices; ?>
                                </label>
                            </div>
							<?php
                            } ?>   
                        </div>
                    </div>       
                </div>  
            </div>
			<?php 
			$no++;
			} ?>
            <input type="submit" name="submit" value="save" />
            </form> 
            <a href="<?php echo site_url().'/exam_controller/finalresult'; ?>">Final Result</a>
            <div class="text-center">
            
            	<?php echo $link; ?>
                <ul class="pagination">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul>
                <div class="progress">
  					<div class="progress-bar progress-bar-primary progress-bar-striped"  role="progressbar"
                    aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                    45% Complete
                    </div>
				</div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#pagination-demo').twbsPagination({
        totalPages: 10,
        visiblePages: 3,
        onPageClick: function (event, page) {
            $('#page-content').text('Page ' + page);
        }
    });
	</script>