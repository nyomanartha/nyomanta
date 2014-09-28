<table id="questionDT" class="table table-hover">
    <thead>
        <tr>
            <th>No.</th>
            <th>Image</th>
            <th>Case Study</th>
            <th>Question</th>
            <th class="none">Option</th>
            <th class="none">Key</th>
            <th class="none">Category</th>
            <th class="none">Exam</th>
            <th class="none">Creator</th>
            <th class="none">Moderator</th>
            <th class="none">Uploaded</th>
            <th class="none">Status</th>
            <th class="none">Confirmed</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $nomor=1;
        foreach($dataQuest->result() as $dataQuestion)
        { ?>
            <tr>
                <td><?php echo $nomor;?></td>
                <td><img src="<?php echo base_url().'img/'.$dataQuestion->qst_img;?>"
                alt="..." class="img-rounded" style="min-height:30px;height:30px;"></td>
                <td><textarea disabled><?php echo $dataQuestion->qst_description;?></textarea></td>
                <td><?php echo $dataQuestion->qst_question;?></td>
                <td><?php
                        $recOption=$this->option_model->getOptQuestionID($dataQuestion->qst_id);
                        foreach($recOption->result() as $dataOption)
                    { ?>
                        <ul style="list-style-type:circle; display:block; margin-left:15px; padding-left:15px;">
                            <li>(<?php echo $dataOption->opt_truefalse;?>) <?php echo $dataOption->opt_choices; ?></li>			                        </ul>		
                    <?php
                    } ?>            
                </td>
                <td><?php echo $dataQuestion->qst_answerkey;?></td>
                <td><?php echo $dataQuestion->cat_name;?></td>
                <td><?php echo $dataQuestion->qst_showexam;?></td>
                <?php
					$dataCreator=$this->question_model->getUserbyidCreator($dataQuestion->qst_iduser)->row();
					$dataModerator=$this->question_model->getUserbyidCreator($dataQuestion->qst_idmoderator)->row();
				?>
                <td><?php echo $dataCreator->usr_name;?></td>
                <td><?php echo isset ($dataModerator->usr_name)?$dataModerator->usr_name:'';?></td>
                <td><?php echo $dataQuestion->qst_postdate;?></td>
                <td><?php
                        $recOption=$this->option_model->getOptQuestionID($dataQuestion->qst_id);
                        foreach($recOption->result() as $dataOption)
                    { ?>
                        <ul style="list-style-type:circle; display:block; margin-left:15px; padding-left:15px;">
                            <li>(<?php echo $dataOption->opt_truefalse;?>) <?php echo $dataOption->opt_choices; ?></li>			                        </ul>		
                    <?php
                    } ?>            
                </td>
                <td><?php echo $dataQuestion->qst_confirmeddate;?></td>
                <td>
                    <a href="<?php echo site_url().'/user/question_usrc/UpdateQst/'.$dataQuestion->qst_id;?>" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit</a>
                    <a href="<?php echo site_url().'/user/question_usrc/DeleteQst/'.$dataQuestion->qst_id;?>" class="btn btn-danger" onclick="return confirm('apakah anda ingin menghapus ini?')">Delete</a>
                </td> 
            </tr>
        <?php
        $nomor++;
        } ?>          
    </tbody>
</table>
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Modal Update Question (External Source)-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div> <!-- /.modal -->