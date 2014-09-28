<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- External Modal Panel-->
<div class="panel panel-primary" style="margin-bottom:0px">
<div class="panel-heading"><h3>Add Category</h3></div>
<div class="panel-body">
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- External Modal Form Update-->
<form id="registrationForm" method="post" class="form-horizontal" enctype="multipart/form-data" action="<?php echo site_url().'/user/question_usrc/processUpdateQst';?>">

	<div class="form-group">
        <label class="col-sm-2 control-label">Category</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="cat_id"
            	value="<?php echo isset($cat_id)? $cat_id: set_value('cat_id');?>" />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Exam</label>
        <div class="col-sm-10">
            <select class="form-control" name="qst_showexam">
                <option>No</option>
                <option>Show</option><?php echo isset($qst_showexam)? $qst_showexam: set_value('qst_showexam');?></select>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Image</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" name="upload_file" />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Status</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="qst_status"
                value="<?php echo isset($qst_status)? $qst_status: set_value('qst_status');?>" />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Case Study</label>
        <div class="col-sm-10">
            <input type="hidden" name="qst_id" value="<?php echo isset($qst_id)? $qst_id: "";?>"/>
            <textarea rows="5" class="form-control" name="qst_description" style="resize:vertical"><?php echo isset($qst_description)? $qst_description: set_value('qst_description');?>
            </textarea>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Question</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="qst_question"
            	value="<?php echo isset($qst_question)? $qst_question: set_value('qst_question');?>" />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Key Answer</label>
        <div class="col-sm-10">
            <textarea rows="3" class="form-control" name="qst_answerkey" style="resize:vertical"><?php 
            echo isset($qst_answerkey)? $qst_answerkey: set_value('qst_answerkey');?></textarea>
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Option</label>
        <div class="col-sm-10">
            <button type="button" class="add_field_button btn btn-primary">Add</button><br><br>
            <div class="row">
				<?php
                	foreach($dataOption->result() as $recOption)
                {?>
                    <div class="col-sm-3">
                    <select class="form-control" name="opt_truefalse[]">
                <?php
					if($recOption->opt_truefalse=="True")
					{
						echo '<option value="True" selected="selected">True</option>';
						echo '<option value="False">False</option>';
					}
					else
					{
						echo '<option value="True">True</option>';
						echo '<option value="False" selected="selected">False</option>';
					}
                ?>
                	</select>
                    </div>
                    <div class="col-sm-9">
                        <textarea rows="2" class="form-control" name="option[]" style="resize:vertical"><?php echo $recOption->opt_choices;?></textarea><a href="#" class="btn btn-danger btn-xs btn-block remove_field">Remove</a><br>
                        <input type="hidden" name="idoption[]" value="<?php echo $recOption->opt_id;?>" />
                    </div>  
                <?php }
                ?>   
            </div>
            <div class="input_fields_wrap"></div>
        </div>
    </div>
    
    <div class="form-group text-center">
        <div class="modal-footer">
            <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
            <button type="submit" class="btn btn-success">Update</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </div>
</form>                
</div>
</div>       
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
            $(wrapper).append('<remove><div class="row"><div class="col-sm-3"><select name="opt_truefalse[]" class="form-control"><option value="True">True</option><option value="False">False</option></select></div><div class="col-sm-9"><textarea style="resize:vertical" rows="3" name="option[]" class="form-control"/></textarea></div><input type="hidden" name="idOption" value="<?php echo $recOption->qst_id; ?>"/></div> <a href="#" class="btn btn-danger btn-xs btn-block remove_field">Remove</a><br></remove>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('remove').remove(); x--;
    })
});
</script>