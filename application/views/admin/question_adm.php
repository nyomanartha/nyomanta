<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Category <small> Overview</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i> Dashboard
            </li>
            <li class="active">
                <i class="fa fa-table"></i> Question
            </li> 
        </ol>
    </div><!-- /.col-lg-12 -->
</div><!-- /.row -->
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Table -->
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
        foreach($recQuestion->result() as $dataQuestion)
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
                <td><?php echo $dataQuestion->usr_name;?></td>
                <td><?php echo $dataQuestion->qst_idmoderator;?></td>
                <td><?php echo $dataQuestion->qst_postdate;?></td>
                <td><?php echo $dataQuestion->qst_status;?></td>
                <td><?php echo $dataQuestion->qst_confirmeddate;?></td>
                <td>
                    <a href="<?php echo site_url().'/admin/question_admc/UpdateQst/'.$dataQuestion->qst_id;?>" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit</a>
                    <a href="<?php echo site_url().'/admin/question_admc/DeleteQst/'.$dataQuestion->qst_id;?>" class="btn btn-danger" onclick="return confirm('apakah anda ingin menghapus ini?')">Delete</a>
                </td> 
            </tr>
        <?php
        $nomor++;
        } ?>          
    </tbody>
</table>    
<center><a href="#" data-toggle="modal" data-target="#addcategorymodal" class="btn btn-success">Add Question</a></center>
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Modal Add New Question -->
<div class="modal fade" id="addcategorymodal" tabindex="-1" role="dialog" aria-labelledby="donateLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3>Add Category</h3></div>
            <div class="panel-body">
                <form id="registrationForm" method="post" class="form-horizontal" enctype="multipart/form-data"
                    action="<?php echo site_url().'/admin/question_admc/processNewQst';?>">
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-10">
                           <select class="form-control" name="cat_id">
                         	<?php
						   	foreach($dataCatQuest->result() as $recCat)
							{
								echo "<option value='".$recCat->cat_id."'>".$recCat->cat_name."</option>";
							}
							?>	
                           </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Exam</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="qst_showexam">
								<option>No</option>
  								<option>Show</option><?php echo set_value('qst_showexam');?></select>
                        </div>
                    </div>
                                              
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" name="upload_file" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Case Study</label>
                        <div class="col-sm-10">
                            <textarea rows="5" class="form-control" name="qst_description">
								<?php echo set_value('qst_description');?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Question</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="qst_question"
                            	value="<?php echo set_value('qst_question');?>" />
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Key Answer</label>
                        <div class="col-sm-10">
                            <textarea rows="3" class="form-control" name="qst_answerkey">
								<?php echo set_value('qst_answerkey');?></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Option</label>
                        <div class="col-sm-10">
                            <div class="input_fields_wrap">
                                <button type="button" class="add_field_button btn btn-primary">Add</button><br><br>
                            </div>
                    	</div>
                    </div>
                    
                    <div class="form-group text-center">
                        <div class="modal-footer">
                            <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
                            <button type="submit" class="btn btn-success">Add Category</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </form>        
            </div>
        </div>
    </div>
</div>
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
<!-- Start Script -->
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Script Data Table & Pagination -->
<script>
$(document).ready(function() {
    $('#questionDT').dataTable({
        responsive: true
    });
} );
</script>
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Script Text Editor, Office Like for Textarea -->
<script type="text/javascript">
tinymce.init({
    selector: "textarea.editme",
	menubar : false,	
 });
</script>
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Script Add More Fields -->
<script>
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<remove><div class="row"><div class="col-sm-3"><select name="opt_truefalse[]" class="form-control"><option value="True">True</option><option value="False">False</option></select></div><div class="col-sm-9"><textarea style="resize:vertical" rows="3" name="option[]" class="form-control"/></textarea></div><input type="hidden" name="idOption" value="<?php echo $dataQuestion->qst_id; ?>"/></div> <a href="#" class="btn btn-danger btn-xs btn-block remove_field">Remove</a><br></remove>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('remove').remove(); x--;
    })
});
</script>