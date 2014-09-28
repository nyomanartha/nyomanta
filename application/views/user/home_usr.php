<div class="container">
    <div class="row">
        <div class="col-md-2" role="main">
            <ul class="nav nav-pills nav-stacked" style="position:fixed">  
            <li class="active"><a href="<?php echo site_url().'/user/home_usrc';?>">Dashboard</a></li>     
            <li><a href="#">Inbox</a></li>
            <li><a href="#">Reviews</a></li>  
            <li><a href="#">Reports</a></li>   
            <li><a href="<?php echo site_url().'/user/question_usrc/upload_question';?>">Upload</a></li>   
            <li><a href="#">Questions</a></li> 
            <li><a href="#">Settings</a></li>
            <?php
				if($this->session->userdata('sess_level')=='moderator')
				{ ?>
                <li><a href="<?php echo site_url().'/user/question_usrc/get_question_confirm_status/'.$this->session->userdata('sess_usr_id')?>">Data Confirm</a></li>
				<?php }
			?>
            
        </ul> 
        </div>
        <div class="col-md-10" role="main">
            <div class = "jumbotron text-left">
                <div class = "container">
                    <h1>User Panel</h1>
                    <p>#</p>
                </div>
            </div>
        <!-- Content -->
            
        <?php $this->load->view($content_page); ?>
        <!-- Akhir Content -->
        </div>
    </div>
</div>	