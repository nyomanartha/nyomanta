<div class = "jumbotron text-left fill">
	<div class = "container">
		<h1>Latihan Soal UKDI</h1>
		<p><em>It is not in the stars to hold our destiny, but in ourselves</em></p>
	</div>
</div>    
    
   
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <form action="<?php echo site_url().'/exam_controller/exam_process/';?>" method="post">          
			<?php
			$no=1;
            foreach($recQuestion->result() as $dataQuestion)
            { ?>            
            <div class="panel panel-primary">
               <div class="panel-heading"><h3>Soal Nomor <?php echo $no;?></h3></div>
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
                        	<input type="radio" name="optionsRadios[<?php echo $dataQuestion->qst_id;?>]" value="0" checked="checked"/>
							<?php
                            $recOption=$this->option_model->getOptQuestionID($dataQuestion->qst_id);
                            foreach($recOption->result() as $dataOption)
                            { ?>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="optionsRadios[<?php echo $dataQuestion->qst_id;?>]" id="optionsRadios1" value="
									<?php echo $dataOption->opt_id;?>">
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
            <div class="text-center">
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