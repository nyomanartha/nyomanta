<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Panel-->
<div class="panel panel-primary" style="margin-bottom:0px">
<div class="panel-heading"><h3>Edit</h3></div>
<div class="panel-body">
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- External Modal Form Update-->
<form id="UpdateModTeam" method="post" class="form-horizontal" enctype="multipart/form-data"
    action="<?php echo site_url().'/admin/modteam_admc/processUpdateModTeam';?>">
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Name</label>
        <div class="col-sm-10">
        <input type="hidden" name="modt_id" value="<?php echo isset($modt_id)? $modt_id: "";?>"/>
            <input type="text" class="form-control" name="modt_header"
                value="<?php echo isset($modt_header)? $modt_header: set_value('modt_header');?>" />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Description</label>
        <div class="col-sm-10">
             <textarea rows="3" class="form-control" name="modt_content"><?php echo isset($modt_content)? $modt_content: set_value('modt_content');?></textarea>
        </div>
    </div>
                 
    <div class="form-group">
        <label class="col-sm-2 control-label">Image</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" name="upload_file" />
        </div>
    </div>

    <div class="form-group text-center">
        <div>
            <!-- Do NOT use name="submit" or id="submit" for the Submit button -->
            <button type="submit" class="btn btn-success">Update</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
    </div>
</form>        
</div><!-- /.panel-body -->
</div><!-- /.panel panel-primary -->
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Script BootstrapValidator -->
<script>
$(document).ready(function() {
    $('#UpdateModTeam').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            modt_header: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The category name is required and cannot be empty'
                    },
                    
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'The category name can only consist of alphabetical and number'
                    },                    
                }
            },
            modt_content: {
                validators: {
                    notEmpty: {
                        message: 'The description is required and cannot be empty'
                    },
                }
            },
            upload_file: {
                validators: {
                    file: {
                        extension: 'jpeg,png',
                        type: 'image/jpeg,image/png',
                        maxSize: 2048 * 1024,   // 2 MB
                        message: 'The selected file is not valid'
                    }
                }
            }                      
        }
    });
});
</script> 