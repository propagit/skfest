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
						return true;
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
						var work_address = $('#work_address').val();
						
						var band_member_name = $('#band_member_name').val();
						var role_in_band = $('#role_in_band').val();
						
						var website = $('#band_website').val();
						var bio_short = $('#biography_short').val();
						var bio_long = $('#biography_long').val();
						
						
						
						
						var valid = true;
						if(website.trim() == ''){
							valid = false;	
						}
						if(bio_short.trim() == ''){
							valid = false;	
						}
						if(bio_long.trim() == ''){
							valid = false;	
						}
						
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
						if($("input[@name='live_work_study_yes']:checked").val()=='yes')
						{
							if(band_member_name == '') 
							{
								valid = false;
							}
							if(role_in_band == '') 
							{
								valid = false;
							}
						}
						
						if (!$("input[@name='suburb_live_work_study']:checked").val()) 
						{
                           valid = false;
						  
                        }
						if (!$("input[@name='willing_to_play']:checked").val()) 
						{
                           valid = false;
						  
                        }
						if (!$("input[@name='previous']:checked").val()) 
						{
                           valid = false;
						  
                        }
						
						if(mailing_address == '') 
						{
							valid = false;
						}
						if(work_address == '') 
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
                    MUSICIAN ENTRY FROM
                </div>
                <div style="clear:both;"></div>
                <div id="form_sub_header">
                	Enter your details
                </div><br/>
                    <p><i>* denotes required field</i></p><br/>
                    <?php if($this->session->flashdata('musicians_entry'))
					{
						//echo '<p style="color:#ff0000">'.$this->session->flashdata('musicians_entry').'</p><br/>';
					}
					?>
                <form action="<?=base_url()?>page/add_musicians_entry" enctype="multipart/form-data" method="post" onsubmit="return validate_form();">
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
                        	<div class="form_label" style="float:left">Track Title 1 *</div>
                            <div style="float:left"><input class="form_input" type="text" id="track1" name="track1"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Track Title 2 *</div>
                            <div style="float:left"><input class="form_input" type="text" id="track2" name="track2"></div>
                        </div>
                        
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">UPload MP3 (Max Size 5MB)</div>
                            <div style="float:left"><input type="file" class="textfield" name="mp3" id="mp3" style="width:200px" /></div>
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
                        	<div class="form_label" style="float:left">Band Member Name *</div>
                            <div style="float:left"><input class="form_input" type="text" id="band_member_name" name="band_member_name"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Role in Band *</div>
                            <div style="float:left"><input class="form_input" type="text" id="role_in_band" name="role_in_band"></div>
                        </div>
                        <div class="gap"></div>
                        <div>Suburb in which they live, work or study *
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
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="suburb_live_work_study" value="None (Not eligible for Live N Local)"></div>
                            <div style="float:left">None (Not eligible for Live N Local)</div>
                        </div>
                        <div class="gap"></div>
                        <div>Please enter the address/ place of study that makes you eligible for Live N Local (if you are not eligible please type N/A) *
                        </div>
                        <div class="gap"></div>
                        <div>
                            <div style="float:left"><textarea class="form_textarea" id="work_address" name="work_address"></textarea></div>
                        </div>

                        <div class="gap"></div>
                        <div>To help us with programming, please provide some details about your band including how many people are in the band, when it was established, how many times you have performed including where and when.(Please keep under 100 words) *
                        </div>
                        <div class="gap"></div>
                        <div>
                            <div style="float:left"><textarea class="form_textarea" id="band_details" name="band_details"></textarea></div>
                        </div>
                        <div class="gap"></div>
                        <div class="gap"></div>
                        <div>Are you able/willing to perform an acoustic or unamplified show if required? *
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
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="willing_to_play" id="willing_to_play_both" value="Neither"></div>
                            <div style="float:left">Neither</div>
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
                        <div>Have you performed on the New Music Stage at a previous St Kilda Festival? *
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

                        <div class="gap"></div>
                        <div>
                        	Please provide the following publicity information which, if your band is selected to perform, will be included in the program and website. The St Kilda Festival reserves the right to edit publicity materials as required.	</div>
                        <div class="gap"></div>
                        <div>
                        	Biography short (max 20 words) *
                        </div>
                        <div class="gap"></div>
                        <div>
                            <div style="float:left"><textarea class="form_textarea" id="biography_short" name="biography_short"></textarea>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	Biography long (max 100 words) *
                        </div>
                        <div class="gap"></div>
                        <div>
                            <div style="float:left"><textarea class="form_textarea" id="biography_long" name="biography_long"></textarea>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Website *</div>
                            <div style="float:left"><input class="form_input" type="text" id="band_website" name="band_website" maxlength="255"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Facebook</div>
                            <div style="float:left"><input class="form_input" type="text" id="facebook" name="facebook" maxlength="255"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Youtube</div>
                            <div style="float:left"><input class="form_input" type="text" id="youtube" name="youtube" maxlength="255"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Twitter</div>
                            <div style="float:left"><input class="form_input" type="text" id="twitter" name="twitter" maxlength="255"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Other</div>
                            <div style="float:left"><input class="form_input" type="text" id="other_weblinks" name="other_weblinks" maxlength="255"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                            <div style="float:left">Picture: Please include with your mailed CD/USB a band photo, 300dpi JPEG or TIFF, landscape orientation</div>
                        </div>
                        <div class="gap"></div>
                        <div>Would you like the chance to play The Push stage in 2015?<br/>
(50% or more of your band members must be at school, years 7 – 12, and must live, work or study in the City of Port Phillip)
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="push_stage" id="push_stage_yes" value="Yes"></div>
                            <div style="float:left">Yes</div>
                        </div>
                        
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input type="radio" name="push_stage" id="push_stage_no" value="No"></div>
                            <div style="float:left">No</div>
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
                        	<div class="form_label" style="float:left">Mailing Address (Street, Suburb, State and Postcode) *</div>
                            <div style="float:left"><input class="form_input" type="text" id="mailing_address" name="mailing_address"></div>
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
                        
                        <div class="gap"></div><br/>
                        <p><strong>CHECKLIST</strong><br/><br/>
<strong>So that we can preview your band and its music, we require you to submit a CD/USB with two songs on it.</strong><br/><br/>
Please ensure you:
<ul style="list-style: inside">
	<li>test the CD/USB before submitting</li>
	<li>write the band name, and two song names on the CD/USB</li>
</ul>
Note – if you submit an entire album we will only listen to the first two songs
<br/>
<br/>

Upon completion of this application form, please send the CD/USB, along with a band photo (see above) clearly labelled with your band's name, contact name and phone number to:<br/>
<br/>
St Kilda Festival - Music<br/>
Private Bag 3<br/>
PO St Kilda<br/>
VIC 3182<br/><br/>

Note: The band photo and two songs can be on the same CD/USB<br>
Any materials submitted to the St Kilda Festival will not be returned<br><br>

Please note that in line with St Kilda Festival's policy of supporting Indigenous participation, the entry fee will be waived for bands that have a member or members who identify themselves as Aboriginal or Torres Strait Islander. If you are eligible, please check the "Fee Exempt" option below<br/><br/>
	<input type="checkbox" name="fee_exempt" value="No">&nbsp;Fee Exempt<br/></p>
                        <div class="gap"></div>
                        <div>
                        	<input class="form_button" type="submit" value="Submit" />
                        </div>
                    </div>
                </form>
            </div> 
             
            
        	<div style="clear:both;"></div>
        </div>
    </div>
</div>

