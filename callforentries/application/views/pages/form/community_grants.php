<script type="text/javascript" src="<?=base_url()?>js/jquery-1.6.2.js"></script>
<div id="paga_content_outside">
    <div id="pagecontent" style="float:none;">
        <div id="left-container">
        	<div id="form_wrapper">
                <div id="form_header" style="float:left"> 
                    Community Grants Form
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
						var group = $('#group').val();
						var event_name = $('#event').val();
						var group_benefit = $('#group_benefit').val();
						var festival_benefit = $('#festival_benefit').val();
						var amount = $('#amount').val();
						var funding_for = $('#funding_for').val();
						var name = $('#name').val();
						var phone = $('#phone').val();
						var valid = true;
						if($('#withinpp1').attr("checked") != 'checked' && $('#withinpp2').attr("checked") != 'checked')
						{
							valid = false;
						}
						if(group == '') 
						{
							valid = false;
						}
						if(event_name == '') 
						{
							valid = false;
						}
						if(group_benefit == '') 
						{
							valid = false;
						}
						if(festival_benefit == '') 
						{
							valid = false;
						}
						if(amount == '') 
						{
							valid = false;
						}
						if(funding_for == '') 
						{
							valid = false;
						}
						if(name == '') 
						{
							valid = false;
						}
						if(phone == '') 
						{
							valid = false;
						}
					}
				</script>
                <form action="<?=base_url()?>page/add_community_grants" method="post" onsubmit="return validate_form();">
                    <div id="form_content">
                    	<div>
                        	<div class="form_label" style="float:left">Name of community group. *</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="group" name="group"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Name of event/ activity (as entered in the Event Application Form). *</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="event_name" name="event_name"></div>
                        </div>
                        <div class="gap"></div>
                        <div style="font-family:karla; font-size:12px;">
                        	Please confirm your community group is based within the City of Port Phillip *
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="withinpp" id="withinpp1" value="Yes"></div>
                            <div style="font-family:karla; font-size:12px;float:left">Yes</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="withinpp" id="withinpp2" value="No"></div>
                            <div style="font-family:karla; font-size:12px;float:left">No</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Briefly describe how your community group will benefit for participating in the St Kilda Festival. *</div>
                            <div style="float:left"><textarea class="form_textarea" id="group_benefit" name="group_benefit"></textarea></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Briefly describe how the Port Phillip community and Festival audience will benefit from your participation in the Festival. *</div>
                            <div style="float:left"><textarea class="form_textarea" id="festival_benefit" name="festival_benefit"></textarea></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Please specify the $$ amount of funding your are seeking. *</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="amount" name="amount"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Please specify what the funding will be used for (eg Infrastructure, performance fees, promotion, or resources). *</div>
                            <div style="float:left"><textarea class="form_textarea" id="funding_for" name="funding_for"></textarea></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Contact person name. *</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="name" name="name"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Contact person telephone. *</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="phone" name="phone"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Contact person email.</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="email" name="email"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	Please send email to <a href="mailto:stkildafestival@portphillip.vic.gov.au">stkildafestival@portphillip.vic.gov.au</a> for more information 
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

