<div class = "jumbotron text-left fill">
	<div class = "container">
		<h1>Hasil Jawaban Soal UKDI</h1>
        <p>Dari <?php echo isset ($jumlah_soal)?$jumlah_soal:0;?> Soal yang dijawab <?php echo isset ($jumlah_benar)?$jumlah_benar:0;?> Benar dan <?php echo isset ($jumlah_salah)?$jumlah_salah:0;?> Salah</p>
       
	</div>
</div>    
    
   
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        
			<?php
			$no=1;
            foreach($recQuestion->result() as $dataQuestion)
            {?>            
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
                        	
							<?php
                            $recOption=$this->option_model->getOptQuestionID($dataQuestion->qst_id);
                            foreach($recOption->result() as $dataOption)
                            {
                            ?>
                            <div class="radio">
                                <label>
                                	<?php
									if($dataOption->opt_id==$dataQuestion->opt_idku)
									{ ?>
									<input type="radio" name="optionsRadios[<?php echo $dataQuestion->qst_id;?>]" id="optionsRadios1" value="
									<?php echo $dataOption->opt_id;?>" checked="checked">
                                    <?php echo $dataOption->opt_choices; ?>
									<?php }
									else
									{
									?>
									<input type="radio" name="optionsRadios[<?php echo $dataQuestion->qst_id;?>]" id="optionsRadios1" value="
									<?php echo $dataOption->opt_id;?>">
                                    <?php echo $dataOption->opt_choices; ?>
									<?php
									}
									?>
                                   
                                </label>
                            </div>
							<?php
                            }
                            ?>   
                        </div>
                    </div>
                    <div class="panel panel-success">   
                        <div class="panel-heading">Jawaban</div>
                        <div class="panel-body">
                            <p><?php echo $dataQuestion->qst_answerkey;?></p>
                        </div>
                    </div>         
                </div>  
            </div>
			<?php 
			$no++;
			}
            ?>  
                   
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