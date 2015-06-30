<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Administrator | St Kilda Festvial</title>
    <script type="text/javascript" src="<?=base_url()?>js/jquery.js"></script>
    <script type="text/javascript" src="<?=base_url()?>js/jquery.tooltip.js"></script>  
    <link href="<?=base_url()?>css/base/jquery.ui.all.css" rel="stylesheet" type="text/css">
    <link rel='stylesheet' type='text/css' href='<?=base_url()?>css/jquery.tooltip.css' />
    <link rel='stylesheet' type='text/css' href='<?=base_url()?>css/admin/layout.css' />
    <link href='http://fonts.googleapis.com/css?family=Karla' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Special+Elite' rel='stylesheet' type='text/css'>
    
    <script>
	var $j = jQuery.noConflict();  
	var xmlhttp;
	function GetXmlHttpObject()
	{
		if (window.XMLHttpRequest)
		{
			// code for IE7+, Firefox, Chrome, Opera, Safari
			return new XMLHttpRequest();
		}
		if (window.ActiveXObject)
		{
			// code for IE6, IE5
			return new ActiveXObject("Microsoft.XMLHTTP");
		}
		return null;
	}	
	</script>
</head>

<body>
<div id="page-wrapper">
	<div id="header">
		<div class="logo"><a href="<?=base_url()?>admin"><img src="<?=base_url()?>images/spacerLarge.gif" width="208" height="152" /></a></div>
        <div id="main-nav">
        	<div class="text-welcome">
                <a href="<?=base_url()?>admin">St Kilda Festvial Website Management</a>
                <?php if ($this->session->userdata('cdkAdminloggedIn')): ?>
                    // <a href="<?=base_url()?>admin/logout">Logout</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
	
    
    <div id="content">