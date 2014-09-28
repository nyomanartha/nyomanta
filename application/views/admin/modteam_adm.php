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
                <i class="fa fa-table"></i> Moderator Team
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
            <th>Name</th>
            <th>Image</th>
            <th>Description</th>
            <th class="col-md-2">Action</th>
        </tr>
    </thead>
    <tbody>   
		<?php
        $nomor=1;
		foreach($recModTeamLimit->result() as $dataModTeamLimit)
		{ ?>
        <tr>
            <td><?php echo $nomor ?></td>
            <td><?php echo $dataModTeamLimit->modt_header;?></td>
            <td><img src="<?php echo base_url().'img/'.$dataModTeamLimit->modt_img;?>"
            	alt="..." class="img-rounded" style="min-height:30px;height:30px;"></td>
            <td><p><?php echo $dataModTeamLimit->modt_content;?></p></td>
            <td>
            	<a href="<?php echo site_url().'/admin/modteam_admc/UpdateModTeam/'.$dataModTeamLimit->modt_id;?>" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Edit</a>
                <a href="<?php echo site_url().'/admin/modteam_admc/DeleteModTeam/'.$dataModTeamLimit->modt_id;?>" class="btn btn-danger" onclick="return confirm('apakah anda ingin menghapus ini?')">Delete</a>
            </td>             
        </tr>
		<?php 
		$nomor++;
		} ?>
    
    </tbody>
</table>
<div class="text-center">
<center><a href="#" data-toggle="modal" data-target="#addmodteammodal" class="btn btn-success">Add New</a></center>
</div>
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Modal Add New Question -->
<div class="modal fade" id="addmodteammodal" tabindex="-1" role="dialog" aria-labelledby="donateLabel" aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3>Add New</h3></div>
            <div class="panel-body">
                <form id="AddModTeam" method="post" class="form-horizontal" enctype="multipart/form-data"
                    action="<?php echo site_url().'/admin/modteam_admc/processNewModTeam';?>">
                                   
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                           <input type="text" class="form-control" name="modt_header"
                           value="<?php echo set_value('modt_header');?>">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                            <textarea rows="3" class="form-control" name="modt_content">
								<?php echo set_value('modt_content');?></textarea>
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
    $('#AddModTeam').bootstrapValidator({
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