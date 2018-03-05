<html>
<head>
	<title><?php echo $title; ?></title>
	
	<link rel="stylesheet" href="<?php echo base_url("assets/css/common/default.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/" . $page_name . ".css"); ?>" />
	<?php echo $additional_css; ?>
</head>
<body>
<div class="header">
	<a href="<?php echo base_url(); ?>" class="header-menu <?php echo $header["home"]; ?>" >Home</a>
	<a href="<?php echo base_url("insert"); ?>" class="header-menu <?php echo $header["insert"]; ?>" >Insert</a>
	<a href="<?php echo base_url("update"); ?>" class="header-menu <?php echo $header["update"]; ?>" >Update</a>
	<a href="<?php echo base_url("delete"); ?>" class="header-menu <?php echo $header["delete"]; ?>" >Delete</a>
</div>
<div class="container">