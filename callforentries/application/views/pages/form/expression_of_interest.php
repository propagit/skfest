<script type="text/javascript" src="<?=base_url()?>js/jquery-1.6.2.js"></script>
<div id="paga_content_outside">
    <div id="pagecontent" style="float:none;">
        <div id="left-container">
        	<div id="form_wrapper">
                <div id="form_header" style="float:left"> 
                    Trader Expressions of Interest
                </div>
                <div style="clear:both;"></div>
                <div id="form_sub_header">
                	Enter your details
                </div>
                <script>
					<?php 
						if($this->session->flashdata('success'))
						{?>
							alert('Thank you, we have received your application');
						<?php }
					?>
					function validateEmail(email) 
					{ 
						var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    					return filter.test(email);
					}
					
					function validate_form()
					{
						var name = $('#name').val();
						var business = $('#business').val();
						var address = $('#address').val();
						var suburb = $('#suburb').val();
						var state = $('#state').val();
						var pcode = $('#pcode').val();
						var email = $('#email').val();
						var re_email = $('#re_email').val();
						var phone = $('#phone').val();
						var detail = $('#detail').val();
						
						
						
						var valid = true;
						if($('#yalukit1').attr("checked") != 'checked' && $('#yalukit2').attr("checked") != 'checked' && $('#yalukit3').attr("checked") != 'checked')
						{
							valid = false;
						}
						if($('#yalukit_bfr1').attr("checked") != 'checked' && $('#yalukit_bfr2').attr("checked") != 'checked')
						{
							valid = false;
						}
						if(name == '') 
						{
							valid = false;
						}
						if(business == '') 
						{
							valid = false;
						}
						if(address == '') 
						{
							valid = false;
						}
						if(suburb == '') 
						{
							valid = false;
						}
						if(state == '') 
						{
							valid = false;
						}
						if(pcode == '') 
						{
							valid = false;
						}
						if(email == '') 
						{
							valid = false;
						}
						if(email != re_email) 
						{
							valid = false;
						}
						if(phone == '') 
						{
							valid = false;
						}
						if(detail == '') 
						{
							valid = false;
						}
						
						return valid;
					}
				</script>
                <form action="<?=base_url()?>page/add_expression_of_interest" method="post" onsubmit="return validate_form();">
                    <div id="form_content">
                    	<div style="font-family:karla; font-size:12px;">
                        	Would you like to be considered to have a stall at Yalukit Wilum Ngargee or Festival Sunday or Both? *
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="yalukit" id="yalukit1" value="Yalukit Willam Ngargee: Saturday 4 February"></div>
                            <div style="font-family:karla; font-size:12px;float:left">Yalukit Wilum Ngargee</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="yalukit" id="yalukit2" value="Festival Sunday: Sunday 12 February"></div>
                            <div style="font-family:karla; font-size:12px;float:left">Festival Sunday</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="yalukit" id="yalukit3" value="Yalukit Willam Ngargee & Festival Sunday"></div>
                            <div style="font-family:karla; font-size:12px;float:left">Yalukit Wilum Ngargee & Festival Sunday</div>
                        </div>
                        <div class="gap"></div>
                    	<div>
                        	<div class="form_label" style="float:left">Contact Name*</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="name" name="name"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Name of Stall/Business*</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="business" name="business"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Street Number and Name*</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="address" name="address"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Suburb or City*</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="suburb" name="suburb"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">State or Territory*</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="state" name="state"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Post Code*</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="pcode" name="pcode"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Email*</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="email" name="email"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Re-Enter Email*</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="re_email" name="re_email"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Phone Number*</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="phone" name="phone"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Website Address</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="web" name="web"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Please describe the stall and the products you sell*</div>
                            <div style="float:left"><textarea class="form_textarea" id="detail" name="detail"></textarea></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	Have you had a stall at Yalukit Wilum Ngargee or St Kilda Festival before?*
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="yalukit_bfr" id="yalukit_bfr1" value="Yes"></div>
                            <div style="float:left">Yes</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="yalukit_bfr" id="yalukit_bfr2" value="No"></div>
                            <div style="float:left">No</div>
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

