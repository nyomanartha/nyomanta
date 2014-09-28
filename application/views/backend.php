<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ArthaMD Admin</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'css/bootstrap_yeti.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'css/bootstrapValidator.css';?>">
    <link rel="stylesheet"
    	href="http://cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.css">
    <link rel="stylesheet"
    	href="http://cdn.datatables.net/responsive/1.0.1/css/dataTables.responsive.css">
    
    <!-- Custom CSS -->
    <!-- Bootstrap Font Awesome & Social Button -->
    <link rel="stylesheet" href="<?php echo base_url().'css/font-awesome.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'css/bootstrap-social.css';?>"> 
    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url().'js/jquery-1.11.1.js';?>"></script>
    <script src="<?php echo base_url().'js/jquery.dataTables.min.js';?>"></script>
    <script src="http://cdn.datatables.net/plug-ins/725b2a2115b/integration/bootstrap/3/dataTables.bootstrap.js"></script>
    <script src="http://cdn.datatables.net/responsive/1.0.1/js/dataTables.responsive.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url().'js/bootstrap.js';?>"></script>
    
    <script src="<?php echo base_url().'js/tinymce.min.js';?>"></script>
    <script src="<?php echo base_url().'js/bootstrapValidator.js';?>"></script>
    <script src="<?php echo base_url().'js/bootstrap-hover-dropdown.js';?>"></script>
    
    <!-- Table Sorter JavaScript -->



</head>
<body>

<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
      <a href="<?php echo site_url().'/admin/admc/';?>" class="navbar-brand"><i class="fa fa-user-md"></i>&nbsp; ArthaMD</a>
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
      <div class="collapse navbar-collapse navHeaderCollapse">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="<?php echo site_url().'/admin/admc/';?>">Dashboard</a></li>
            <li><a href="<?php echo site_url().'/admin/carousel_admc/';?>">Carousel</a></li>
            <li><a href="<?php echo site_url().'/admin/category_admc/';?>">Category</a></li>
            <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-hover="dropdown">
                        Question<i class="fa fa-fw fa-caret-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url().'/admin/question_admc/';?>">All Question</a></li>
                        <li><a href="#">Cardiology</a></li>
                        <li><a href="#">Dermatology</a></li>
                    </ul>
                </li> 
            <li><a href="<?php echo site_url().'/admin/user_admc/';?>">User Data</a></li>
                <li><a href="#" class="dropdown-toggle" data-hover="dropdown">
                    About<i class="fa fa-fw fa-caret-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Index</a></li>
                        <li><a href="<?php echo site_url().'/admin/coreteam_admc/';?>">Core Team</a></li>
                        <li><a href="<?php echo site_url().'/admin/modteam_admc/';?>">Mod Team</a></li>
                    </ul>
                </li>
                <li><a href="<?php echo site_url().'/Adminlogin_controller/logout';?>">Logout</a></li>         
            </ul>
          </div>
        </div>
      </div>
       
    <div id="page-wrapper">
        <div class="container">
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Content -->
<?php $this->load->view('admin/'.$admin_page);?>
        </div><!-- /.container -->
    </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Footer -->
<br>
<footer class="panel-footer">
    <div class="container ">
        <div class="col-sm-8 col-sm-offset-2 text-center ">      
          <p>Find us at:</p>
          <ul class="list-inline center-block ">
          	<li><a href="#" class="btn btn-social-icon btn-lg btn-facebook"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" class="btn btn-social-icon btn-lg btn-google-plus"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#" class="btn btn-social-icon btn-lg btn-microsoft"><i class="fa fa-windows"></i></a></li>
            <li><a href="#" class="btn btn-social-icon btn-lg btn-yahoo"><i class="fa fa-yahoo"></i></a></li>
            <li><a href="#" class="btn btn-social-icon btn-lg btn-twitter"><i class="fa fa-twitter"></i></a></li>
          </ul>
        </div><!--/col-->
    </div><!--/container-->
</div><!--/wrap-->

    <div id="footer">
      <div class="container">
          <p class="text-center">
            <i class="fa fa-copyright"></i> 2015-Present ArthaMD.com<br/>
            Maintained by the core team with the help of our contributors.
          </p>
          <p class="text-center">
            Handcrafted with <i class="fa fa-heart"></i> in Indonesia!
          </p>
      </div>
    </div>
</footer>
<!-- Start Script -->
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Script  TinyMCE-->
<script type="text/javascript">
tinymce.init({
    selector: "textarea.adv",
	menubar : false,	
 });
</script>
</body>
</html>
