<?php
	foreach($recQuestion->result() as $dataQuestion)
?>
        
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Modal Add New Question -->

                <form id="registrationForm" method="post" class="form-horizontal" enctype="multipart/form-data"
                    action="<?php echo site_url().'/user/question_usrc/process_upload_question';?>">
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-10">
                           <select class="form-control" name="cat_id">
                         	<?php
						   	foreach($dataCatQuest->result() as $recCat)
							{
								echo "<option value='".$recCat->cat_id."'>".$recCat->cat_name."</option>";
							} ?>	
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