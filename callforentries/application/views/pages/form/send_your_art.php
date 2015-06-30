<script type="text/javascript" src="<?=base_url()?>js/jquery-1.6.2.js"></script>
<div id="paga_content_outside">
    <div id="pagecontent" style="float:none;">
        <div id="left-container">
        	<div id="form_wrapper">
                <div id="form_header" style="float:left"> 
                    St Kilda Festival Poster Design Competition
                </div>
                <div style="clear:both;"></div>
                <div id="form_sub_header">
                	Entry form
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
						var firstname = $('#firstname').val();
						var surname = $('#surname').val();
						var email = $('#email').val();
						var agree = $('#agree').attr('checked');
						var valid = true;
						if(firstname == '') 
						{
							valid = false;
						}
						if(surname == '') 
						{
							valid = false;
						}
						if(email == '') 
						{
							valid = false;
						}
						/*if(validateEmail(email))
						{
							valid = false;
						}*/
						if(agree != 'checked') {valid = false;}
						
						return valid;
					}
				</script>
                <form action="<?=base_url()?>page/add_send_your_art" method="post" onsubmit="return validate_form();">
                    <div id="form_content">
                    	<div>
                        	<div class="form_label" style="float:left">First Name</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="firstname" name="firstname"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Surname</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="surname" name="surname"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Phone</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="phone" name="phone"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Email</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="email" name="email"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div style="float:left"><input class="form_checkbox" type="checkbox" value="Yes" id="live" name="live"></div>
                        	<div class="form_label_checkbox" style="float:left">Tick here to confirm that you either live, work or study in the City of Port Phillip</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Please give details</div>
                            <div style="float:left"><textarea class="form_textarea" id="detail" name="detail"></textarea></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div style="float:left"><input class="form_checkbox" type="checkbox" value="1" id="agree" name="agree"></div>
                        	<div class="form_label_checkbox" style="float:left">By submitting this application I certify that I have read and agree with the <a target="_blank" href="http://www.stkildafestival.com.au/callforentries/page/pages/35">TERMS AND CONDITIONS</a></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div style="float:left">&nbsp;</div>
                        	<div class="form_label_checkbox">
                            	Submit your design via email or by regular post:<br><br>
                                
                                <ul>
                                <li>
                                  <strong>EMAIL SUBMISSIONS</strong> must be sent to <strong><a href="mailto:stkildafestival@portphillip.vic.gov.au?subject=POSTER DESIGN COMPETITION">stkildafestival@portphillip.vic.gov.au</a></strong> with 'POSTER DESIGN COMPETITION' in the subject line. Please include your name, address and phone number in the body of the email.<br><br>
                                <li>
                                <li>
                                  <strong>POSTAL SUBMISSIONS</strong> must be sent on CD to:<br>
                                  St Kilda Festival,<br> 
                                  City of Port Phillip, <br>
                                  Private Bag 3,<br> 
                                  PO St Kilda, VIC 3182,<br> 
                                  ATTN: St Kilda Festival Poster Design Competition.<br><br> 
                                  Each CD must be clearly labelled with your name and phone number.<br><br>
                                </li>
                                <ul>
                                
                                Check the <a target="_blank" href="http://www.stkildafestival.com.au/callforentries/page/pages/35">TERMS AND CONDITIONS</a> for image specification requirements. Please note: No entries will be accepted after the closing date
                            	
                            </div>
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

