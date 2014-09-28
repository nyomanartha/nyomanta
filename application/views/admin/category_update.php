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
<form id="UpdateCatForm" method="post" class="form-horizontal" enctype="multipart/form-data"
    action="<?php echo site_url().'/admin/category_admc/processUpdateCat';?>">
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Category Name</label>
        <div class="col-sm-10">
        <input type="hidden" name="cat_id" value="<?php echo isset($cat_id)? $cat_id: "";?>"/>
            <input type="text" class="form-control" name="cat_name"
                value="<?php echo isset($cat_name)? $cat_name: set_value('cat_name');?>" />
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Description</label>
        <div class="col-sm-10">
            <textarea rows="10" class="form-control" name="cat_description"><?php echo isset($cat_description)? $cat_description: set_value('cat_description');?></textarea>
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
    $('#UpdateCatForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            cat_name: {
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
            cat_description: {
                validators: {
                    notEmpty: {
                        message: 'The description is required and cannot be empty'
                    },
                }
            },
            upload_file: {
                validators: {
                    file: {
                        extension: 'jpeg,png,gif',
                        type: 'image/jpeg,image/png,image/gif',
                        maxSize: 2048 * 1024,   // 2 MB
                        message: 'The selected file is not valid'
                    }
                }
            }                      
        }
    });
});
</script>