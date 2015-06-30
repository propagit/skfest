<script type="text/javascript" src="<?=base_url()?>js/jquery-1.6.2.js"></script>
<script>
					<?php 
						if($this->session->flashdata('musicians_entry'))
						{?>
							alert('<?=$this->session->flashdata('musicians_entry')?>');
						<?php }
					?>
					function validateEmail(email) 
					{ 
						var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    					return filter.test(email);
					}
					
					function validate_form()
					{
						var bandname = $('#bandname').val();
						var musictype = $('#musictype').val();
						var contactname = $('#contactname').val();
						var phone = $('#phone').val();
						
						var email = $('#email').val();
						var re_email = $('#re_email').val();
						var track1 = $('#track1').val();
						var track2 = $('#track2').val();
						
						var mailing_address = $('#mailing_address').val();
						var band_details = $('#band_details').val();
						var valid = true;
						if(bandname == '') 
						{
							valid = false;
							
						}
						if(musictype == '') 
						{
							valid = false;
						}
						if(contactname == '') 
						{
							valid = false;
						}
						if(phone == '') 
						{
							valid = false;
						}
						if(email == '') 
						{
							valid = false;
						}
						if(re_email == '') 
						{
							valid = false;
						}
						if(email != re_email)
						{
							alert('Email re-entered does not match');
							valid = false;
						}
						/*if(validateEmail(email))
						{
							valid = false;
						}*/
						if (!$("input[@name='receive_email_yes']:checked").val()) 
						{
						
							valid = false;
						}
						if (!$("input[@name='live_work_study_yes']:checked").val()) 
						{
						
							valid = false;
						}
						if (!$("input[@name='suburb_live_work_study']:checked").val()) 
						{
                           valid = false;
						  
                        }
						if(mailing_address == '') 
						{
							valid = false;
						}
						if(band_details == '') 
						{
							valid = false;
						}
						if(!valid)
						{
							alert('Please answer all required questions');
						}
						return valid;
					}
				</script>
<div id="paga_content_outside">
    <div id="pagecontent" style="float:none;">
        <div id="left-container">
        	<div id="form_wrapper">
                <div id="form_header" style="float:left"> 
                    
                </div>
                <div style="clear:both;"></div>
                <div id="form_sub_header">
                	
                </div><br/>
                    <p>
                    	Thank you for submitting your application for the 2012 St Kilda Festival.<br/><br/>
                    </p><br/>
                    <?php if($this->session->flashdata('musicians_entry'))
					{
						//echo '<p style="color:#ff0000">'.$this->session->flashdata('musicians_entry').'</p><br/>';
					}
					?>
                <!--<form action="<?=base_url()?>page/add_musicians_entry" method="post" onsubmit="return validate_form();">
                    <div id="form_content">
                    	<div>
                        	<div class="form_label" style="float:left">Band Name *</div>
                            <div style="float:left"><input class="form_input" type="text" id="bandname" name="bandname"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Type of Music(Jazz/Funk/Metal etc)*</div>
                            <div style="float:left"><input class="form_input" type="text" id="musictype" name="musictype"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Contact Name *</div>
                            <div style="float:left"><input class="form_input" type="text" id="contactname" name="contactname"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Phone Number (pref mobile) *</div>
                            <div style="float:left"><input class="form_input" type="text" id="phone" name="phone"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Alternative Phone Number</div>
                            <div style="float:left"><input class="form_input" type="text" id="alt_phone" name="alt_phone"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Email Address *</div>
                            <div style="float:left"><input class="form_input" type="text" id="email" name="email"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Re-Enter Email Address *</div>
                            <div style="float:left"><input class="form_input" type="text" id="re_email" name="re_email"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Track Title 1 *</div>
                            <div style="float:left"><input class="form_input" type="text" id="track1" name="track1"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Track Title 2 *</div>
                            <div style="float:left"><input class="form_input" type="text" id="track2" name="track2"></div>
                        </div>
                        <div class="gap"></div>
                        <div>I would like to receive email updates from the St Kilda Festival *
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="receive_email" id="receive_email_yes" value="Yes"></div>
                            <div style="float:left">Yes</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="receive_email" id="receive_email_no" value="No"></div>
                            <div style="float:left">No</div>
                        </div>
                        <div class="gap"></div>
                        <div>Do you or any other band member live, work or study in the City of Port Phillip? *
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="live_work_study" id="live_work_study_yes" value="Yes"></div>
                            <div style="float:left">Yes</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="live_work_study" id="live_work_study_no" value="No"></div>
                            <div style="float:left">No</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                          If yes please provide the details
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Band Member Name</div>
                            <div style="float:left"><input class="form_input" type="text" id="band_member_name" name="band_member_name"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Role in Band</div>
                            <div style="float:left"><input class="form_input" type="text" id="role_in_band" name="role_in_band"></div>
                        </div>
                        <div class="gap"></div>
                        <div>Please tick the suburb in which you live work or study *
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="suburb_live_work_study" value="Albert Park/Middle Park"></div>
                            <div style="float:left">Albert Park/Middle Park</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="suburb_live_work_study" value="Balaclava/East St Kilda"></div>
                            <div style="float:left">Balaclava/East St Kilda</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="suburb_live_work_study" value="Elwood"></div>
                            <div style="float:left">Elwood</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="suburb_live_work_study" value="Ripponlea"></div>
                            <div style="float:left">Ripponlea</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="suburb_live_work_study" value="Port MelbourneGarden City/Beacon Cove"></div>
                            <div style="float:left">Port MelbourneGarden City/Beacon Cove</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="suburb_live_work_study" value="South Melbourne"></div>
                            <div style="float:left">South Melbourne</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="suburb_live_work_study" value="St Kilda/St Kilda South/St Kilda West"></div>
                            <div style="float:left">St Kilda/St Kilda South/St Kilda West</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="suburb_live_work_study" value="St Kilda Rd"></div>
                            <div style="float:left">St Kilda Rd</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="suburb_live_work_study" value="Windsor"></div>
                            <div style="float:left">Windsor</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="suburb_live_work_study" value="None (Not eligible for Live N Local)"></div>
                            <div style="float:left">None (Not eligible for Live N Local)</div>
                        </div>
                        <div class="gap"></div>
                        <div>Please enter a current mailing address (Street, Suburb, State and Postcode) *
                        </div>
                        <div class="gap"></div>
                        <div>
                            <div style="float:left"><textarea class="form_textarea" id="mailing_address" name="mailing_address"></textarea></div>
                        </div>
                        <div class="gap"></div>
                        <div>To help us with programming, please provide some details about your band including how many people are in the band, when it was established, when it was established, how many times you have performed including where and when.(Please keep under 100 words) *
                        </div>
                        <div class="gap"></div>
                        <div>
                            <div style="float:left"><textarea class="form_textarea" id="band_details" name="band_details"></textarea></div>
                        </div>
                        <div class="gap"></div>
                        <div>What are your band's website, facebook, twittter, blog etc addresses - please add all you have so we can help promote you
                        </div>
                        <div class="gap"></div>
                        <div>
                            <div style="float:left"><textarea class="form_textarea" id="band_online" name="band_online"></textarea></div>
                        </div>
                        <div class="gap"></div>
                        <div>Would you like the chance to play The Push stage in 2012?
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="play_push_stage" value="Yes (50% or more of your band members must be at school, years 7 – 12)"></div>
                            <div style="float:left">Yes (50% or more of your band members must be at school, years 7 – 12)</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="play_push_stage" value="No"></div>
                            <div style="float:left">No</div>
                        </div>
                        <div class="gap"></div>
                        <div>Are you able/willing to perform an acoustic or unamplified show if required?
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="willing_to_play" id="willing_to_play_acoustic" value="Acoustic"></div>
                            <div style="float:left">Acoustic</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="willing_to_play" id="willing_to_play_unamplified" value="Unamplified"></div>
                            <div style="float:left">Unamplified</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="willing_to_play" id="willing_to_play_both" value="Both"></div>
                            <div style="float:left">Both</div>
                        </div>
                        <div class="gap"></div>
                        <div>Do you have a PA or other performance equipment you would be able to use?
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="equipment" id="equipment_yes" value="Yes"></div>
                            <div style="float:left">Yes</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="equipment" id="equipment_no" value="No"></div>
                            <div style="float:left">No</div>
                        </div>
                        <div class="gap"></div>
                        <div>Have you performed on the New Music Stage at a previous St Kilda Festival?
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="previous" id="previous_yes" value="Yes"></div>
                            <div style="float:left">Yes</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="previous" id="previous_no" value="No"></div>
                            <div style="float:left">No</div>
                        </div>
                        <div class="gap"></div><br/>
                        <p><strong>CHECKLIST</strong><br/><br/>
<strong>So that we can preview your band and its music, we need the following material:</strong><br/><br/>
i) 2 x Songs on CD* (please test CD before posting) NB: If you send us  a whole CD, we will listen to the first 2 songs<br/>
ii) 1 x DVD of live footage (optional)<br/>
iii) Any additional information you have relating to the band including press kits or media releases.<br/>
<br/>
Upon completion of this application form, please send these materials clearly labelled with your band's name, contact name and phone number to:<br/>
<br/>
St Kilda Festival - Music<br/>
Private Bag 3<br/>
PO St Kilda<br/>
VIC 3182<br/><br/>
Please note that in line with St Kilda Festival's policy of supporting Indigenous participation, the entry fee will be waived for bands that have a member or members who identify themselves as Aboriginal or Torres Strait Islander. If you are eligible, please check the "Fee Exempt" option below<br/><br/>
	<input type="checkbox" name="fee_exempt" value="Yes">&nbsp;Fee Exempt<br/></p>
                        <div class="gap"></div>
                        <div>
                        	<input class="form_button" type="submit" value="Submit" />
                        </div>
                    </div>
                </form>-->
            </div> 
             
            
        	<div style="clear:both;"></div>
        </div>
    </div>
</div>

