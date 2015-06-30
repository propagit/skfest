<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Administrator | St Kilda Festvial</title>
    <link rel='stylesheet' type='text/css' href='<?=base_url()?>css/admin/layout.css' />
    <!--<link rel="shortcut icon" type="image/x-icon" href="<?=base_url()?>images/LongIcon.ico" />-->
</head>

<body>
<div id="page-wrapper">
	<div id="header">
		<div class="logo"><a href="<?=base_url()?>admin"><img width="208" height="152" src="<?=base_url()?>images/admin/spacerLarge.gif" alt="" />
        </a></div>
        <div id="bar-top">
        	<div class="text-welcome">
                <a href="<?=base_url()?>admin">Welcome to St Kilda Festival Management</a>
                // 
				<?php if ($this->session->userdata('cdkAdminloggedIn')): ?>
                    <a href="<?=base_url()?>admin/logout">Logout</a>
                <?php else: ?>
                	<a href="<?=base_url()?>login">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>    
    <div id="content-big">    
        <div class="content-title">
            <img src="<?=base_url()?>images/admin/title-login.png" alt="" />    	
        </div>
    
        <div class="bar-title">    
            <div>
                Please enter your username and password
            </div>    
        </div>
    
        <div style="padding:20px">
            <?php print '<span style="color:#ff0000">'.$this->session->flashdata('error_authentication').'</span>'; ?>
            <form name="loginForm" method="post" action="<?=base_url()?>login">
            <p>Username</p> <input type="text" name="username" class="medium" />
            <p>Password</p> <input type="password" name="password" class="medium" />
            <!--<input type="hidden" name="<?php echo $this->security->csrf_token_name?>" value="<?php echo $this->security->csrf_hash?>" /> -->
            <input type="submit" style="display:none" />
            <p><input type="button" class="button rounded" value="Login" onclick="document.loginForm.submit()" /></p>
            </form>        
        </div>