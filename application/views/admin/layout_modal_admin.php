<!DOCTYPE html>
<html lang="en">

<head>

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
<?php $this->load->view('admin/'.$admin_page);?>





<!-- Script --><!-- Script --><!-- Script --><!-- Script -->
<!-- Script --><!-- Script --><!-- Script --><!-- Script -->
<!-- Script --><!-- Script --><!-- Script --><!-- Script -->
<!-- Script --><!-- Script --><!-- Script --><!-- Script -->
<!-- Script  TinyMCE-->
<script type="text/javascript">
tinymce.init({
    selector: "textarea.adv",
	menubar : false,
	
 });
</script>
</body>
</html>