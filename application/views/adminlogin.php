<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Signin Template for Bootstrap</title>
    <link rel="stylesheet" href="<?php echo base_url().'css/bootstrap_yeti.css';?>">
    <!-- Bootstrap Font Awesome & Social Button -->
    <link rel="stylesheet" href="<?php echo base_url().'css/font-awesome.css';?>">
    <link rel="stylesheet" href="<?php echo base_url().'css/bootstrap-social.css';?>">
    <!-- Carousel Owl -->
    <!-- Javascript -->
    <script src="<?php echo base_url().'js/jquery-1.11.1.js';?>"></script>
    <script src="<?php echo base_url().'js/bootstrap.js';?>"></script>
  </head>

  <body>
  
<!--
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|	|=|
-->
<!-- Container -->  
<div class="container">
<?php
	echo $pesanLogin=$this->session->flashdata('message');
	echo isset ($pesanLogin)? $pesanLogin:"";
?>
    <div class="panel panel-primary" style="margin-top:20%;">
        <div class="panel-heading"><h3>Please sign in</h3></div>
        <div class="panel-body">      
            <form class="form-signin" role="form" action="<?php echo site_url().'/Adminlogin_controller/proses_login'; ?>" method="post">            
                <input type="email" class="form-control" placeholder="Email address" required autofocus name="txtemail"><hr>
                <input type="password" class="form-control" placeholder="Password" required name="txtpassword"><hr>               
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>       
        </div> 
    </div>
</div><!-- /container -->


 
  </body>
</html>
