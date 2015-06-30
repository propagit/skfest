<script type="text/javascript" src="<?=base_url()?>js/jquery-1.6.2.js"></script>
<div id="paga_content_outside">
    <div id="pagecontent" style="float:none;">
        <div id="left-container">
        	<div id="form_wrapper">
                <div id="form_header" style="float:left"> 
                    Participants
                </div>
                <div style="clear:both;"></div>
                <div id="form_sub_header">
                	Existing participants <br/>Log in here if you already have a password
                </div>
                <script>
					function validateEmail(email) 
					{ 
						var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    					return filter.test(email);
					}
					
					function validate_form()
					{
						var name = $('#name').val();
						var email = $('#email').val();
						var valid = true;
						if(name == '') 
						{
							valid = false;
						}
						if(email == '') 
						{
							valid = false;
						}
						//if(validateEmail(email))
						//{
						//	valid = false;
						//}
						
						return valid;
					}
				</script>
                <div>
                	Please login with your username and password to access the participants area.
                </div>
                <form action="<?=base_url()?>page/member_login" method="post">
                    <div id="form_content">
                    	<div class="gap"></div>
                    	<div>
                        	<div class="form_label" style="float:left">Username</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="username" name="username"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Password</div>
                            <div style="float:left"><input class="form_input" type="password" value="" id="password" name="password"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<input class="form_button" type="submit" value="Login">
                        </div>
                    </div>
                </form>
                
                <div style="clear:both; margin-top:20px; border-top:1px solid #646464;"></div>
                <div id="form_sub_header">
                	New participant
                </div>
                <form action="<?=base_url()?>page/new_participant" method="post" onsubmit="return validate_form()">
                    <div id="form_content">
                    	<div class="gap"></div>
                    	<div>
                        	<div class="form_label" style="float:left">Name</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="name" name="name"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Email</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="email" name="email"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Telephone</div>
                            <div style="float:left"><input class="form_input" type="tel" value="" id="phone" name="phone"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Membership Type</div>
                            <select input class="form_input" id="cat" name="cat">
                            	<option value="1">Stallholders - Food</option>
                                <option value="2">Stallholders - Market/General</option>
                                <option value="3">Permanent Traders</option>
                            </select>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<input class="form_button" type="submit" value="Submit">
                        </div>
                    </div>
                </form>
            </div> 
             
            
        	<div style="clear:both;"></div>
        </div>
    </div>
</div>

