<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Panel-->
<div class="panel panel-primary" style="margin-bottom:0px">
<div class="panel-heading"><h3>Add Category</h3></div>
<div class="panel-body">
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- External Modal Form Update-->
<form id="UpdateUserForm" method="post" class="form-horizontal" enctype="multipart/form-data"
    action="<?php echo site_url().'/admin/user_admc/processUpdateUser';?>">
   
    <div class="form-group">
        <label class="col-sm-2 control-label">Full Name</label>
        <div class="col-sm-10">
        <input type="hidden" name="usr_id" value="<?php echo isset($usr_id)? $usr_id: "";?>"/>
            <input type="text" class="form-control" name="usr_name"
                value="<?php echo isset($usr_name)? $usr_name: set_value('usr_name');?>" />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">email</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="usr_email"
                value="<?php echo isset($usr_email)? $usr_email: set_value('usr_email');?>" />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Username</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="usr_username"
                value="<?php echo isset($usr_username)? $usr_username: set_value('usr_username');?>" />
        </div>
    </div>
    
    <div class="form-group">
        <label class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="usr_password"
                value="<?php echo isset($usr_password)? $usr_password: set_value('usr_password');?>" />
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
    $('#UpdateUserForm').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            usr_name: {
                message: 'The name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The name is required and cannot be empty'
                    },
                    
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'The name can only consist of alphabetical and number'
                    },                   
                }
            },
			
            usr_email: {
                validators: {
                    emailAddress: {
                        message: 'The value is not a valid email address'
                    },
					notEmpty: {
                        message: 'The e-mail is required and cannot be empty'
                    },
                }
            },
			
			usr_username: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    
                    regexp: {
                        regexp: /^[a-zA-Z0-9]+$/,
                        message: 'The username can only consist of alphabetical and number'
                    },                  
                }
            },
			
            usr_password: {
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