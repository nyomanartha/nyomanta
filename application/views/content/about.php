<div class = "jumbotron text-left">
	<div class = "container">
		<h1>About</h1>
		<p>Learn about the project's history and find out the maintaining teams.</p>
	</div>
</div>

<div class="container">
<div class="row">
<div class="col-md-12" role="main">

<?php
$dataAbout=$recAbout->row();
?>
<!-- History
================================================== -->
<h1 id="history" class="page-header">History</h1>

<p class="lead"><?php echo $dataAbout->abt_history_header;?></p>
<?php echo $dataAbout->abt_history_content;?>
            
<!-- Team Core
================================================== -->
<h1 id="team" class="page-header">Team</h1>
<p class="lead"><?php echo $dataAbout->abt_team_header;?></p>

<h2 id="team-core">Core team</h2>
<?php
foreach($recCoreTeam->result() as $dataCoreTeam)
{ ?>
     <div class="media">
       <a class="pull-left" href="#">
          <img class="media-object" src="<?php echo base_url().'img/team/'.$dataCoreTeam->ct_img;?>" 
          alt="Media Object">
       </a>
       <div class="media-body">
          <h4 class="media-heading"><?php echo $dataCoreTeam->ct_header;?></h4>
          <?php echo $dataCoreTeam->ct_content;?>
       </div>
    </div>
<?php
}
?>
  
<!-- Team Core
================================================== -->


<h2 class="text-right">Moderator team</h2>
<?php
foreach($recModTeam->result() as $dataModTeam)
{ ?>
     <div class="media">
       <a class="pull-right" href="#">
          <img class="media-object" src="<?php echo base_url().'img/team/'.$dataModTeam->modt_img;?>" 
          alt="Media Object">
       </a>
       <div class="media-body">
          <h4 class="media-heading"><?php echo $dataModTeam->modt_header;?></h4>
          <?php echo $dataModTeam->modt_content;?>
       </div>
    </div>
<?php
}
?>
    


</div>
</div>
</div>	