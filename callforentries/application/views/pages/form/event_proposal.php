<script type="text/javascript" src="<?=base_url()?>js/jquery-1.6.2.js"></script>
<div id="paga_content_outside">
    <div id="pagecontent" style="float:none;">
        <div id="left-container">
        	<div id="form_wrapper">
                <div id="form_header" style="float:left"> 
                    Events & Activities Proposal
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
						var address = $('#address').val();
						var email = $('#email').val();
						var re_email = $('#re_email').val();
						var phone = $('#phone').val();
						var activity = $('#activity').val();
						var web = $('#web').val();
						var group = $('#group').val();
						var description = $('#description').val();
						var valid = true;
						if($('#considered_for1').attr("checked") != 'checked' && $('#considered_for2').attr("checked") != 'checked' && $('#considered_for3').attr("checked") != 'checked')
						{
							valid = false;
						}
						if(name == '') 
						{
							valid = false;
						}
						if(address == '') 
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
						if(activity == '') 
						{
							valid = false;
						}
						/*if(web == '') 
						{
							valid = false;
						}*/
						if(group == '') 
						{
							valid = false;
						}
						if(description == '') 
						{
							valid = false;
						}
						
						if(valid){document.eventProposalForm.submit();}
						else
						{alert('Please fill up the form!');}
					}
				</script>
                <form action="<?=base_url()?>page/add_event_proposal" method="post" name="eventProposalForm" id="eventProposalForm">
                    <div id="form_content">
                    	<div>
                        	<div class="form_label" style="float:left">Contact Name*</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="name" name="name"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Contact Address*</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="address" name="address"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Contact email address*</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="email" name="email"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Retype email address*</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="re_email" name="re_email"></div>
                        </div>
                        <div class="gap"></div>
                         <div>
                        	<div class="form_label" style="float:left">Contact Telephone*</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="phone" name="phone"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Event/ Activity Name*</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="activity" name="activity"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Event / Activity website/ facebook address </div>
                            <div style="float:left"><textarea class="form_textarea" id="web" name="web"></textarea></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Business/ Community Group Name*</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="group" name="group"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Description of Event*</div>
                            <div style="float:left"><textarea class="form_textarea" id="description" name="description"></textarea></div>
                        </div>
                        <div class="gap"></div>
                        <div style="font-family:karla; font-size:12px;">
                        	Would you like to be considered for Live N Local, Festival Sunday, or both?*
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="considered_for" id="considered_for1" value="Live N Local only"></div>
                            <div style="font-family:karla; font-size:12px;float:left">Live N Local only</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="considered_for" id="considered_for2" value="Festival Sunday only"></div>
                            <div style="font-family:karla; font-size:12px;float:left">Festival Sunday only</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="considered_for" id="considered_for3" value="Both Live N Local and Festival Sunday"></div>
                            <div style="font-family:karla; font-size:12px;float:left">Both Live N Local and Festival Sunday</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">List two referees and their phone numbers - referees must be able to vouch for quality and standards of similar events you have previously held (Not required if your event has previously been held at St Kilda Festival)</div>
                            <div style="float:left"><textarea class="form_textarea" id="referees" name="referees"></textarea></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Please provide an overview of your event requirements - including the amount of space required - surface required - bump in and out times - etc</div>
                            <div style="float:left"><textarea class="form_textarea" id="requirements" name="requirements"></textarea></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Please provide an overview of ways in which you will manage impact to the environment while running this event - including protection from damage to parks - reserves or surfaces - any resulting pollution - water usage or otherwise</div>
                            <div style="float:left"><textarea class="form_textarea" id="manage_impact" name="manage_impact"></textarea></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	Please send email to <a href="mailto:stkildafestival@portphillip.vic.gov.au">stkildafestival@portphillip.vic.gov.au</a> for more information 
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<input class="form_button" type="button" value="Submit" onClick="validate_form();">
                        </div>
                    </div>
                </form>
            </div> 
             
            
        	<div style="clear:both;"></div>
        </div>
    </div>
</div>

