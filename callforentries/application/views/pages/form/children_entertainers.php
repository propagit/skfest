<script type="text/javascript" src="<?=base_url()?>js/jquery-1.6.2.js"></script>
<script>
					<?php 
						if($this->session->flashdata('children_entertainers'))
						{?>
							alert('<?=$this->session->flashdata('children_entertainers')?>');
						<?php }
					?>
					function validateEmail(email) 
					{ 
						var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    					return filter.test(email);
					}
					
					function validate_form()
					{
						var individualname = $('#individualname').val();
						var performancetype = $('#performancetype').val();
						var contactname = $('#contactname').val();
						var phone = $('#phone').val();
						
						var email = $('#email').val();
						var re_email = $('#re_email').val();
						
						
						var webaddress = $('#webaddress').val();
						var band_details = $('#band_details').val();
						var valid = true;
						if(contactname == '') 
						{
							valid = false;
							
						}
						if(performancetype == '') 
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
//						if(validateEmail(email))
//						{
//							valid = false;
//						}
						if (!$("input[@name='receive_email_yes']:checked").val()) 
						{
						
							valid = false;
						}
						if (!$("input[@name='live_work_study_yes']:checked").val()) 
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
                    KIDS' ENTERTAINMENT PROPOSAL
                </div>
                <div style="clear:both;"></div>
                <div id="form_sub_header">
                	Enter your details
                </div><br/>
                    <p><i>* denotes required field</i></p><br/>
                    <?php if($this->session->flashdata('children_entertainers'))
					{
						//echo '<p style="color:#ff0000">'.$this->session->flashdata('children_entertainers').'</p><br/>';
					}
					?>
                <form action="<?=base_url()?>page/add_children_entertainers" method="post" onsubmit="return validate_form();">
                    <div id="form_content">
                    	<div>
                        	<div class="form_label" style="float:left">Contact Name *</div>
                            <div style="float:left"><input class="form_input" type="text" id="contactname" name="contactname"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Name of Individual or Act *</div>
                            <div style="float:left"><input class="form_input" type="text" id="individualname" name="individualname"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Type of Performance *</div>
                            <div style="float:left"><input class="form_input" type="text" id="performancetype" name="performancetype"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Mobile Phone Number *</div>
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
                        	<div class="form_label" style="float:left">Web Address *</div>
                            <div style="float:left"><input class="form_input" type="text" id="webaddress" name="webaddress"></div>
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
                        <div>Do you live or work in the City of Port Phillip? *
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
                        <div>To help us with programming please provide some details about your act; when it was established- how many times you have performed including where and when (Please keep under 150 words) *
                        </div>
                        <div class="gap"></div>
                        <div>
                            <div style="float:left"><textarea class="form_textarea" id="band_details" name="band_details"></textarea></div>
                        </div>
                        
                        <div class="gap"></div><br/>
                        <p>Please send any supplementary materials that help demonstrate what your performance is to:<br/><br/>
St Kilda Festival - Children's Entertainment<br/>
Private Bag 3<br/>
PO St Kilda<br/>
VIC 3182</p>
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

