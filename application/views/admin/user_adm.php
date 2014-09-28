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
                <i class="fa fa-table"></i> User
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
            <th>Username</th>
            <th>Full Name</th>            
            <th>E-mail</th>
            <th class="none">Password</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>  
    	<?php
		$nomor=1;
		foreach($recUserLimit->result() as $dataUserLimit)
		{ ?>
        <tr>
            <td><?php echo $nomor ?></td>
            <td><img src="<?php echo base_url().'img/'.$dataUserLimit->usr_img;?>"
            	alt="..." class="img-rounded" style="min-height:30px;height:30px;"></td>
            <td><?php echo $dataUserLimit->usr_username;?></td>
            <td><?php echo $dataUserLimit->usr_name;?></td>           
            <td><?php echo $dataUserLimit->usr_email;?></td>
            <td><?php echo $dataUserLimit->usr_password;?></td>
            <td>
            	<a href="<?php echo site_url().'/admin/user_admc/UpdateUser/'.$dataUserLimit->usr_id;?>" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit</a>
                <a href="<?php echo site_url().'/admin/user_admc/DeleteUser/'.$dataUserLimit->usr_id;?>" class="btn btn-danger" onclick="return confirm('apakah anda ingin menghapus ini?')">Delete</a>
            </td>
        </tr>
		<?php 
		$nomor++;
		} ?>   
    </tbody>
</table>
<div class="text-center">
<center><a href="#" data-toggle="modal" data-target="#addusermodal" class="btn btn-success">Add New</a></center>
</div>
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Modal Add New Question -->
<div class="modal fade" id="addusermodal" tabindex="-1" role="dialog" aria-labelledby="donateLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3>Add New</h3></div>
            <div class="panel-body">
                <form id="AddNewUserForm" method="post" class="form-horizontal" enctype="multipart/form-data"
                    action="<?php echo site_url().'/admin/user_admc/processNewUser';?>">
                                   
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="usr_name"
                            value="<?php echo set_value('usr_name');?>"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="usr_email"
                            value="<?php echo set_value('usr_email');?>"/>
								
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="usr_username"
                            value="<?php echo set_value('usr_username');?>"/>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="usr_password"
                            value="<?php echo set_value('usr_password');?>"/>
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
                            <button type="submit" class="btn btn-success">Add New</button>
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
<!-- Script BootstrapValidator -->
<script>
$(document).ready(function() {
    $('#AddNewUserForm').bootstrapValidator({
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