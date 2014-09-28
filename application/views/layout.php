<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Title & Seo -->    
  <title><?php echo isset($seoTitle)? $seoTitle:"Kompetensi Dokter Indonesia";?></title> 
  <meta name="keywords" content="
  	<?php echo isset($seoKeywords)? $seoKeywords:
  	"Ujian Kompetensi, Dokter Indonesia, Tryout UKDI"; ?>">
  <meta name="description" content="
  	<?php echo isset($seoDescription)? $seoDescription:
	"Ujian Kompetensi, Dokter Indonesia, Tryout UKDI"; ?>">
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- CSS --> 
<!-- Bootstrap -->
<link rel="stylesheet" href="<?php echo base_url().'css/bootstrap_yeti.css';?>">
<!-- Bootstrap Font Awesome & Social Button -->
<link rel="stylesheet" href="<?php echo base_url().'css/font-awesome.css';?>">
<link rel="stylesheet" href="<?php echo base_url().'css/bootstrap-social.css';?>">
<!-- Carousel Owl -->
<link rel="stylesheet" href="<?php echo base_url().'css/owl.carousel.css';?>">
<link rel="stylesheet" href="<?php echo base_url().'css/owl.theme.css';?>">
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- JavaScript --> 
<!-- Jquery -->
<script src="<?php echo base_url().'js/jquery-1.11.1.js';?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url().'js/bootstrap.js';?>"></script>
<!-- Carousel Owl -->
<script src="<?php echo base_url().'js/owl.carousel.js';?>"></script>
</head>

<body>
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- NavBar --> 
  <div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
      <a href="<?php echo base_url();?>" class="navbar-brand"><i class="fa fa-user-md"></i>&nbsp; ArthaMD</a>
      <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
      <div class="collapse navbar-collapse navHeaderCollapse">
        <ul class="nav navbar-nav navbar-right">
          <li class=""><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i>&nbsp; Home</a></li>
          <li><a href="<?php echo site_url().'/exam_controller/all_exam/';?>"><i class="fa fa-graduation-cap"></i>&nbsp; Exams</a></li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-database"></i>&nbsp; Courses <b class="caret"></b></a>
            <ul class="dropdown-menu">
				<?php
                foreach($recCategoryNav->result() as $dataCategoryNav)
                { ?>
                    <li><a href="<?php echo site_url().'/exam_controller/exam_by_category/'.$dataCategoryNav->cat_id;?>">
					<?php echo $dataCategoryNav->cat_name;?></a></li>
                <?php
                }
                ?>
            </ul>
          </li>
          <li><a href="<?php echo site_url().'/about_controller';?>"><i class="fa fa-hospital-o"></i>&nbsp; About</a></li>
          <li><a href="#" data-toggle="modal" data-target="#contact"><i class="fa fa-phone"></i>&nbsp; Contact</a></li>
          <li><a href="#" data-toggle="modal" data-target="#donate"><i class="fa fa-money"></i>&nbsp; Donate</a></li>
          <?php
		  if($this->session->userdata('login')==true || $this->session->userdata('sess_login')==true)
		  { ?>
			  <li><a href="<?php echo site_url().'/user/home_usrc';?>"><i class="fa fa-user"></i>&nbsp; Dashboard</a></li>
		  <?php } ?>
		  
          <?php
		  if($this->session->userdata('login')==true || $this->session->userdata('sess_login')==true)
		  { ?>
			  <li><a href="<?php echo site_url().'/user_controller/logout/'?>"><i class="fa fa-user"></i>&nbsp; Logout</a></li>
		  <?php }
		  else
		  { ?>
			  <li><a href="#" data-toggle="modal" data-target="#login"><i class="fa fa-user"></i>&nbsp; Login / Signup</a></li>
		  <?php }
		  ?>
          
        </ul>
      </div>
    </div>
  </div>
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Content -->
<?php $this->load->view($page);?>
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
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Modal Login/Signup -->
<div class="modal fade bs-example-modal-sm" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
    <br>
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs nav-justified">
              <li class="active"><a href="#signin" data-toggle="tab">Sign In</a></li>
              <li class=""><a href="#signup" data-toggle="tab">Register</a></li>
            </ul>
        </div>
        <div class="modal-body">
            <div id="myTabContent" class="tab-content">
    <!--
    |=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
    |=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
    |=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
    -->
    <!-- Tab Sign In -->   
                <div class="tab-pane fade active in" id="signin">
                    <form class="form-horizontal" action="<?php echo site_url().'/user_controller/proses_user_login' ; ?>" method="post">
                        <fieldset>
                            <!-- Sign In Form -->
                            <!-- Text input-->
                            <div class="control-group">
                                <label class="control-label" for="userid"></label>
                                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                <input required id="usr_email" name="usr_email" type="text" class="form-control" placeholder="Username / e-mail" class="input-medium" required="">
                            </div>
                            <!-- Password input-->
                            <div class="control-group">
                                <label class="control-label" for="passwordinput"></label>
                                <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                                <input required id="passwordinput" name="passwordinput" class="form-control" type="password" placeholder="Password" class="input-medium">
                            </div>
                            <!-- Multiple Checkboxes (inline) -->
                            <div class="control-group text-right">
                                <label class="control-label" for="rememberme"></label>
                                <label class="checkbox inline" for="rememberme-0">
                                  <input type="checkbox" name="rememberme" id="rememberme-0" value="Remember me">Remember me
                                </label>
                            </div>
                            <!-- Button -->
                            <div class="control-group text-left">
                                <label class="control-label" for="signin"></label>
                                <p>
                                    <a href="#">Forgot Password?</a>
                                    <button type="submit" class="btn btn-success">Sign in</button>
                                </p>
                            </div>
                        	<!-- Login via Facebook -->
                            <a href="#" title="Facebook"
                            class="btn btn-block btn-social btn-facebook">
                            <i class="fa fa-facebook"></i> Sign in with Facebook
                            </a>          
                          	<!-- Login via Facebook -->
                            <a href="#" title="Google"
                            class="btn btn-block btn-social btn-google-plus">
                            <i class="fa fa-google-plus"></i> Sign in with Google
                            </a>
                            <!-- Login via Facebook -->
                            <a href="#" title="Twitter"
                            class="btn btn-block btn-social btn-twitter">
                            <i class="fa fa-twitter"></i> Sign in with Twitter
                            </a>
                            
                        </fieldset>
                    </form>
                </div> <!-- Akhir Tab Sign In -->          
    <!--
    |=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
    |=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
    |=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
    -->
    <!-- Tab Sign Up -->       
                <div class="tab-pane fade" id="signup">
                    <form id="AddNewUserForm" method="post" class="form-horizontal" enctype="multipart/form-data"
                    action="<?php echo site_url().'/user_controller/processNewUser';?>">
                        <fieldset>
                            <!-- Sign Up Form -->
                            <!-- Text input-->
                            <div class="control-group">
                                <label class="control-label" for="usr_name"></label>
                                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                <input id="usr_name" name="usr_name" class="form-control" type="text" 
                                placeholder="Username" class="input-large" required="">
                            </div>           
                            <!-- Text input-->
                            <div class="control-group">
                                <label class="control-label" for="usr_email"></label>
                                <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                                <input id="usr_email" name="usr_email" class="form-control" type="email" 
                                placeholder="Enter E-mail" class="input-large" required="">
                            </div>    
                            <!-- Password input-->
                            <div class="control-group">
                                <label class="control-label" for="usr_password"></label>
                                <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                                <input id="usr_password" name="usr_password" class="form-control" type="password" 
                                placeholder="Enter Password" class="input-large" required="">
                            </div>
                           
                            <!-- Button -->
                            <div class="control-group">
                                <label class="control-label" for="confirmsignup"></label>
                                <div class="controls">
                                    <button id="confirmsignup" name="confirmsignup" class="btn btn-success">Sign Up</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div> <!-- Akhir Tab Sign Up -->       
            </div><!-- /.tab-content -->
        </div><!-- /.modal-body -->        
        <div class="modal-footer">
        <center>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
        </div>
      </div>
    </div>
</div>
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Modal Donate -->
<div class="modal fade" id="donate" tabindex="-1" role="dialog" aria-labelledby="donateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="panel panel-primary">
            <div class="panel-heading"><h3>Help Us to Support and Maintain this Site</h3></div>
            <div class="panel-body">
                <div class="panel panel-info">
                    <!-- Default panel contents -->
                    <div class="panel-heading">Bank BCA</div>
                    <div class="panel-body">
                        <p>Rek: 123123123<br>
                        Atas Nama: Lalalala                           
                        </p>
                    </div>
                </div>
                <div class="panel panel-success">
                    <!-- Default panel contents -->
                    <div class="panel-heading">Bank BCA</div>
                    <div class="panel-body">
                        <p>Rek: 123123123<br>
                        Atas Nama: Lalalala                           
                        </p>
                    </div>
                </div>
                <div class="panel panel-danger">
                    <!-- Default panel contents -->
                    <div class="panel-heading">Bank BCA</div>
                    <div class="panel-body">
                        <p>Rek: 123123123<br>
                        Atas Nama: Lalalala                           
                        </p>
                    </div>
                </div>        
            </div>
            <div class="panel-footer">
                <center>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </center>
            </div>
        </div>
    </div>
</div>
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Modal Contact -->
<div class="modal fade" id="contact" tabindex="-1" role="dialog" aria-labelledby="contactLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="panel panel-primary">
        <div class="panel-heading">
        <h3 class="text-center"><i class="fa fa-info"></i>&nbsp; Any questions? Feel free to contact us.</h3>
        </div>           
        <div class="panel-body">
            <form class="form-horizontal">
                <!-- Text input-->                
                <div class="form-group">
                    <label for="contactName" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="contactName" required placeholder="Enter Your Name...">
                    </div>
                </div>                
                <!-- Text input-->                
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail3" required placeholder="Enter Your Email...">
                    </div>
                </div>
                <!-- Text input-->                
                <div class="form-group">
                    <label for="contactTitle" class="col-sm-2 control-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="contactTitle" required placeholder="Enter Your Title...">
                    </div>
                </div> 
                 <!-- Text input-->                
                <div class="form-group">
                    <label for="contactMessage" class="col-sm-2 control-label">Message</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" required rows="5"></textarea>
                    </div>
                </div>                
                <center>
                    <input type="reset" class="btn btn-danger" value="Clear" />
                    <input type="submit" class="btn btn-success" value="Send"/>
                </center>
            </form>
        </div>        
        <div class="panel-footer">
            <center>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </center>
        </div>  
        </div>
    </div>
</div>
</body>
</html>