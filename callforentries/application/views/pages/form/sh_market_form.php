<script type="text/javascript" src="<?=base_url()?>js/jquery-1.6.2.js"></script>
<script>
	function validate()
	{
		var valid=true;
		
		if(jQuery('#stall_photo').val() == '')
		{
			valid = false;
			jQuery('#stall_photo').css('border-color','red');
		}
		if(jQuery('#given_name').val() == '')
		{
			valid = false;
			jQuery('#given_name').css('border-color','red');
		}
		if(jQuery('#surname').val() == '')
		{
			valid = false;
			jQuery('#surname').css('border-color','red');
		}
		if(jQuery('#business_name').val() == '')
		{
			valid = false;
			jQuery('#business_name').css('border-color','red');
		}
		if(jQuery('#address').val() == '')
		{
			valid = false;
			jQuery('#address').css('border-color','red');
		}
		if(jQuery('#suburb').val() == '')
		{
			valid = false;
			jQuery('#suburb').css('border-color','red');
		}
		if(jQuery('#state').val() == '')
		{
			valid = false;
			jQuery('#state').css('border-color','red');
		}
		if(jQuery('#postcode').val() == '')
		{
			valid = false;
			jQuery('#postcode').css('border-color','red');
		}
		if(jQuery('#email').val() == '')
		{
			valid = false;
			jQuery('#email').css('border-color','red');
		}
		if(jQuery('#email').val() != jQuery('#confirm_email').val())
		{
			valid = false;
			jQuery('#email').css('border-color','red');
			jQuery('#confirm_email').css('border-color','red');
		}
		if(jQuery('#mobile').val() == '')
		{
			valid = false;
			jQuery('#mobile').css('border-color','red');
		}
		if(jQuery('#idemnity_agree').attr("checked") != 'checked')
		{
			valid = false;
			jQuery('#idemnity_agree').css('border-color','red');
		}
		if(jQuery('#fees_agree').attr("checked") != 'checked')
		{
			valid = false;
			jQuery('#fees_agree').css('border-color','red');
		}
		if(jQuery('#terms_agree').attr("checked") != 'checked')
		{
			valid = false;
			jQuery('#terms_agree').css('border-color','red');
		}
		if(jQuery('#declaration_agree').attr("checked") != 'checked')
		{
			valid = false;
			jQuery('#declaration_agree').css('border-color','red');
		}
		
		if(valid)
		{
			document.forms["foodForm"].submit();
		}
		else
		{
			alert('please fill all mandatory field');
		}
	}
</script>
<div id="paga_content_outside">
    <div id="pagecontent" style="float:none;">
        <div id="left-container">
        	<div id="form_wrapper" style="font-family:'karla'">
                <div id="form_header" style="float:left"> 
                    STALLHOLDERS MARKET - Application Form 
                </div>
                <div style="clear:both;"></div>
                <div id="form_sub_header">
                	ST KILDA FESTIVAL 2015
                </div>
                
                <div style="line-height:15px;">
                	<span class="subheading2_content_page">APPLICATION FOR AN ITINERANT MARKET TRADER</span><br/><br/>
                    We are calling for market stallholders who are exuberant, unique and sell lots of shiny, pretty and unique wares to complement local retailers and join our Festival Sunday celebrations!<br/><br/>
                    In 2015, the big day falls on Sunday, 8th of February. With a crowd of up to 450,000 we're expecting many inquisitive festival goers who will be keen to explore what the day has to offer!<br/><br/>
                    <span class="subheading2_content_page">APPLICATION INSTRUCTIONS</span><br/><br/>
                    
                    For public health and safety reasons, the City of Port Phillip Council manages various special events through its Local Law 1 (Community Amenity). A permit is needed to trade at the St Kilda Festival and to use Council parks and reserves, including the foreshore and roads for a range of activities.<br/><br/>
                    
                    Whilst we encourage and welcome applications from stallholders, spaces are limited. Completing this application process does not guarantee you a site. Applications will be evaluated by St Kilda Festival Management and the outcome of your application will be advised in mid to late December. If your application is approved, you will be issued with a Tax Invoice that must be paid in full before your Permit can be issued. St Kilda Festival Management reserves the right to cancel your application at any time and without notice. Failure to pay the issued tax invoice within the terms of payment may result in a cancellation of your application.<br/><br/>
                    
                    Trader selection and site placement is at the absolute discretion of St Kilda Festival Management.<br/><br/>
                    
                    The closing date for all applications is <span style="font-weight:bold">FRIDAY, 28 NOVEMBER 2014. Late applications may not be accepted</span>.<br/><br/>
                    
                    Several pieces of supporting documentation are required to complete your application, including pictures of your stall and a checklist is provided within this application for your convenience. All supporting documentation must be received by <span>WEDNESDAY, 03rd DECEMBER, 2014</span>, to ensure your application can be considered.  <br/><br/>
                    
                    The online application process must be completed in a single session and all information will be lost prior to submission if you close this window before completing. An acknowledgement window will appear once your application has been submitted at the completion of this process. Please ensure you print a copy of your application for your records.<br/><br/>
                    
                    To assist you further we have included some important documents you can download and save relating to safety and trading at the festival. These documents can be found and downloaded from the Additional Downloads page of this website.<br/><br/>
                    
                    If you have any questions please contact:<br/><br/>
                    Angela de Mel<br/>
                    Festival Trader Liaison & Vending Manager<br/>
                    2015 St Kilda Festival<br/>
                    T: 03 9209 6266<br/>
                    M: 0434 316 784<br/>
                    E: <a href="mailto:skftraders@portphillip.vic.gov.au">skftraders@portphillip.vic.gov.au</a><br/><br/>
                </div>
                
                <form name="foodForm" id="foodForm" method="post" enctype="multipart/form-data" action="<?=base_url()?>page/form_market_process">
                <?php if($this->session->flashdata('form_mes') != '') { echo '<p style="font-size:14px;color:#ff0000">'.$this->session->flashdata('form_mes').'</p>'; } 
				?>
                    <div id="form_sub_header">Application Details</div>
                    <p>&nbsp;</p>
                    <!--<div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Application Number</div>
                        <div style="float:left"><input type="text" disabled="disabled" class="form_input" size="32"  name="application_number" value="FS75" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Date</div>
                        <div style="float:left"><input type="text"  class="form_input" size="32" value="23-07-2012" name="date" /></div>
                    </div>-->
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Given Name *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="given_name" id="given_name" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Surname *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="surname" id="surname" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Business Name *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="business_name" id="business_name" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">ABN</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="abn" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Mailing Address *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="address" id="address" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Suburb *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="suburb" id="suburb" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">State *</div>
                        <div style="float:left">
                            <select  name="state" id="state" class="form_input">
                                <option value="ACT">Australian Capital Territory</option>
                                <option value="NSW">New South Wales</option>
                                <option value="NT">Northern Territory</option>
                                <option value="QLD">Queensland</option>
                                <option value="SA">South Australia</option>
                                <option value="TAS">Tasmania</option>
                                <option value="VIC">Victoria</option>
                                <option value="WA">Western Australia</option>
                    
                            </select>
                        </div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Postcode *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="postcode" id="postcode" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Email *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="email" id="email" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Confirm Email *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="confirm_email" id="confirm_email" /></div>
                    </div>
                 	<?php if(0){ ?>
                    <!--<div style="clear:both; height:10px;"></div>
                    	<div>
                        <div style="width:auto; margin-bottom:10px;">Do you wish to receive information about the current or future St Kilda Festivals via email?</div>
                        <div style="float:left"><input type="radio" name="receive_information" value="Yes" /> Yes <input type="radio" name="receive_information" value="No" /> No</div>
                    </div>-->
					<?php } ?>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Telephone (please include state prefix)</div>
                        <div style="float:left">
                            	<input style="float:left;width:60px; margin-right:10px;" type="text" class="form_input" size="4" name="telephone_prefix" />
                            	<input style="float:left;width:228px" type="text" class="form_input" size="22" name="telephone" />
                        </div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left">Mobile *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="mobile" id="mobile" /></div>
                    </div>
                    <?php if(0){?>
                    <!--<div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left">Fax (please include state prefix)</div>
                        <div style="float:left">
                            	<input style="float:left;width:60px; margin-right:10px;" type="text" class="form_input" size="4" name="fax_prefix" />
                            	<input style="float:left;width:228px" type="text" class="form_input" size="22" name="fax" />
                        </div>
                        
                    </div>-->
                    <?php } ?>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Previous participant</div>
                        <div style="float:left"><input type="radio" name="previous_participant" value="Yes" /> Yes <input type="radio" name="previous_participant" value="No" /> No</div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <hr />
                    <div id="form_sub_header" style="margin-bottom:0px; margin-top:0px;">Stall Information</div>
                    <p><br/>Please provide a brief description of your stall including any theme, the typical crowd your stall attracts and previous events you have participated in:</p>
                    <textarea style="width:500px; height:50px;" name="stall_brief_description" class="validate['required']"></textarea>
                    <p style="margin:10px 0 0 0;">Standard market stall sites are 3m x 3m or 6m x 3m. Multiple sites may be considered at the discretion of St Kilda Festival Management.</p>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left;">I will be selling goods from a</div>
                        <div style=" float:left">
                        	<select class="form_input" name="stall_type">
                                  <option value="Marquee" />Marquee</option>
                                <option value="Table/Stall">Table/Stall</option>
                                <option value="Caravan/Trailer">Caravan/Trailer</option>
                                </select>
                        </div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        I wish to occupy:
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left; width:50px">
                        	<input type="checkbox" name="stall_size[]" value="3m x 3m Standard Site" />
                        </div>
                        <div style="float:left">3m x 3m Standard Site</div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left; width:50px">
                        	<input type="checkbox" name="stall_size[]" value="6m x 3m Double Site" />
                        </div>
                        <div style="float:left">6m x 3m Double Site (charged at double standard site rate)</div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left; width:50px">
                        	<input type="checkbox" name="stall_size[]" value="Multiple Sites" />
                        </div>
                        <div style="float:left">Multiple Sites - Please specify: Quantity <input type="text" style="border:1px solid #646464;" class="textfield" size="10" name="stall_size_quantity" /> Size <input type="text" style="border:1px solid #646464;" class="textfield" size="10" name="stall_size_size" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left">
                        	Please attach a photo of your stall here *<br />(Photo must be 1Mb or less in size preferably in JPEG format)
                        </div>
                        <script>
						function check_image()
						{
							var file = $('#stall_photo').val();
							var valid = false;
							if(file.indexOf(".jpg") != -1) {valid = true;}
							if(file.indexOf(".jpeg") != -1) {valid = true;}
							if(file.indexOf(".png") != -1) {valid = true;}
							if(file.indexOf(".gif") != -1) {valid = true;}
							
							if(!valid)
							{
								$('#stall_photo').val('');
								alert('please provide a valid image format such as, .jpg, .jpeg, .png or .gif');
							}
						}
						</script>
                        <div style="float:left"><input type="file" class="textfield validate['required']" onchange="check_image();" name="stall_photo" id="stall_photo" style="width:200px" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div id="form_sub_header" style="border-top:1px solid #646464; padding-top:5px; margin-bottom:0px; margin-top:0px">
                        STALL LOCATION
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        Please note that site all locations are at the absolute discretion of St Kilda Festival Management. The zone requested is not guaranteed. Corner sites are extremely limited and attract a surcharge of $58.20.<br/></br/>
                        I wish to be located in a:<br/>
                        <input type="checkbox" name="stall_location[]" value="Pedestrian Flow Zone - $298.70 per Standard Site" /> Pedestrian Flow Zone - $298.70 per Standard Site<br/>
                        <input type="checkbox" name="stall_location[]" value="Regular Zone - $154.50 per Standard Site" /> Regular Zone - $154.50 per Standard Site<br/><br/>
                        I want to be considered for a corner site within my requested zone type:<br/>
                        <input type="radio" name="stall_location_consider" value="Yes" /> Yes <input type="radio" name="stall_location_consider" value="No" /> No
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div id="form_sub_header" style="border-top:1px solid #646464; padding-top:5px; margin-bottom:0px; margin-top:0px;">
                        PRODUCT INFORMATION
                    </div>
                    <div>
                        Please list in the field below each product you intend to sell at the event and the price point at which you propose to sell each product.
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div style="width:150px; float:left">&nbsp;</div>
                        <div style="width:145px; float:left">Product</div>
                        <div style="width:10px; float:left">&nbsp;</div>
                        <div style="width:145px; float:left">Price</div>
                    </div>
                    <?php
                        for($i=1;$i<=25;$i++)
                        {?>
                            <div style="clear:both; height:5px;"></div>
                            <div>
                                <div style="width:150px; float:left"><?=$i?></div>
                                <div style="width:145px; float:left"><input style="width:145px !important" class="form_input" type="text" value="" id="product_name<?=$i?>" name="product_name<?=$i?>"></div>
                                <div style="width:10px; float:left">&nbsp;</div>
                                <div style="width:145px; float:left"><input style="width:145px !important" class="form_input" type="text" value="" id="product_price<?=$i?>" name="product_price<?=$i?>"></div>
                            </div>
                        <? }
                    ?>
                    <div style="clear:both; height:10px;"></div>
                    
                   
                    
                    <div style="clear:both; height:10px;"></div>
                    <!--
                    <div style="line-height:15px;">
                        Please note: Soft drink and water must be purchased through the St Kilda Festival to ensure sponsorship agreements the Festival has in place with suppliers are best serviced. Only soft drink and water stock purchased through the St Kilda Festival can be sold on Festival Sunday. Further information about the order process, products and a pricelist will become available if your application is successful.
                    </div>                    
                    <div style="clear:both; height:10px;"></div>
                    -->
                    <hr />
                    <div style="clear:both; height:10px;"></div>
                    <div id="form_sub_header" style="margin-top:0px; margin-bottom:0px;">Hires</div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        Marquee Packages can be hired from the St Kilda Festival. If you require a Marquee Package to trade from on Festival Sunday please select one from the options below:
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left; width:50px;">
                        	<input type="checkbox" name="hire_package[]" value="3x3m Marquee Package - $275.00 (Includes 3x3 Marquee, 2 chairs, 1 x 8' trestle table)" />
                        </div>
                        <div style="float:left">3x3m Marquee Package - $275.00 includes 3x3 Marquee, 2 chairs, 1 x 8' trestle table</div>    
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left; width:50px;">
                        	<input type="checkbox" name="hire_package[]" value="6x3m Marquee Package - $519.10 (Includes 6x3 Marquee, 2 chairs, 2 x 8' trestle table)" />
                        </div>
                        <div style="float:left">6x3m Marquee Package - $519.10 includes 6x3 Marquee, 2 chairs, 2 x 8' trestle table</div>    
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left; width:50px;">
                        	<input type="checkbox" name="hire_package[]" value="I do not required marquee hire" />
                        </div>
                        <div style="float:left">I do not required any marquee packages</div>    
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        Change to orders and refunds may not be possible once an invoice for payment has been issued.
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <hr />
                    <div style="clear:both; height:10px;"></div>
                    <div id="form_sub_header" style="margin-top:0px; margin-bottom:0px">Power</div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        Power will be supplied according to your order so please ensure you choose the correct amount for your operation. Additional power on the day cannot be guaranteed, hence it is important you pre order all required power.
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left; width:180px; margin-right:20px;">I required the following provision of power to my site:</div>
                        <div style="float:left">
                        	<select class="form_input" name="power_option">
                           		<option value="I do not require power $0" />I do not require power $0</option>
                                <option value="1 x 15 amp outlet - $116.40">1 x 15 amp outlet - $116.40</option>
                                <option value="2 x 15 amp outlet - $232.80">2 x 15 amp outlet - $232.80</option>
                                <option value="3 x 15 amp outlet - $349.20">3 x 15 amp outlet - $349.20</option>
                                <option value="1 x 3 phase outlet (32 amp, 5 pin, 3 phase) - $442.90" />1 x 3 phase outlet (32 amp, 5 pin, 3 phase) - $442.90</option>
                            </select>
                        </div>    
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <?php if(0) { ?>
                    <!--<hr />
                    <div style="clear:both; height:10px;"></div>
                    <div id="form_sub_header" style="margin-bottom:0px; margin-top:0px">Vehicle Access & Parking</div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        To gain vehicle access to the St Kilda Festival Precinct during Bump In & Bump Out periods on Festival Day, your vehicle needs to be accredited. The following information is required with your application:
                    </div>
                    <div style="clear:both; height:10px;"></div>
					
                    <div>
                        <div class="form_label" style="float:left; width:50px">
                        	<input type="checkbox" name="vehicle_parking[]" value="I will not require vehicle access to the Festival Precinct." />
                        </div>
                        <div style="float:left">I will not require vehicle access to the Festival Precinct.</div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    
                    <div>
                        <div class="form_label" style="float:left; width:50px">
                        	<input type="checkbox" name="vehicle_parking[]" value="I require vehicle access to the Festival Precinct" />
                        </div>
                        <div style="float:left">I require vehicle access to the Festival Precinct:<</div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        Number of vehicles: <input type="radio" name="number_vehicle" value="1" /> 1 <input type="radio" name="number_vehicle" value="2" /> 2 <input type="radio" name="number_vehicle" value="3" /> 3
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        Vehicle 1
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left">Register</div>
                        <div style="float:left"><input type="text" size="8" class="form_input" name="veh_1_reg" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left">Make</div>
                        <div style="float:left"><input type="text" class="form_input" size="10" name="veh_1_make" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left">Model</div>
                        <div style="float:left"><input type="text" class="form_input" size="10" name="veh_1_model" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left">Type</div>
                        <div style="float:left"><input type="text" class="form_input" size="10" name="veh_1_type" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        Vehicle 2
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left">Register</div>
                        <div style="float:left"><input type="text" size="8" class="form_input" name="veh_2_reg" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left">Make</div>
                        <div style="float:left"><input type="text" class="form_input" size="10" name="veh_2_make" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left">Model</div>
                        <div style="float:left"><input type="text" class="form_input" size="10" name="veh_2_model" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left">Type</div>
                        <div style="float:left"><input type="text" class="form_input" size="10" name="veh_2_type" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    
                    <div style="line-height:15px;">
                        Vehicle 3
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left">Register</div>
                        <div style="float:left"><input type="text" size="8" class="form_input" name="veh_3_reg" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left">Make</div>
                        <div style="float:left"><input type="text" class="form_input" size="10" name="veh_3_make" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left">Model</div>
                        <div style="float:left"><input type="text" class="form_input" size="10" name="veh_3_model" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left">Type</div>
                        <div style="float:left"><input type="text" class="form_input" size="10" name="veh_3_type" /></div>
                    </div>	
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left; width:50px">
                        	<input type="checkbox" name="vehicle_parking[]" value="I will be hiring a vehicle for the event and do not yet have the appropriate details available" />
                        </div>
                        <div style="float:left">I will be hiring a vehicle for the event and do not yet have the appropriate details available</div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left; width:50px">
                        	<input type="checkbox" name="vehicle_parking[]" value="I will require Festival allocated parking for this hire vehicle" />
                        </div>
                        <div style="float:left; width:500px;">I will require Festival allocated parking for this vehicle (not required for actual food vans, only support vehicles)</div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        Please note if you are hiring a vehicle, details must be provided as soon as available prior to the event to be accredited with St Kilda Festival. Trader Access Maps, Bump In/Out Vehicle Passes and Parking Passes will be forwarded prior to the event.
                    </div>
                    
                    <div style="clear:both; height:10px;"></div>-->
                    <?php } ?>
                    <hr />
                    <div style="clear:both; height:10px;"></div>
                    <div id="form_sub_header" style="margin-bottom:0px; margin-top:0px;">Insurance & Indemnity</div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        All itinerant traders must have public liability insurance to the value of $10,000,000 naming the <b>CITY OF PORT PHILLIP</b> as an interested party on the Certificate of Currency.
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left;">Please attach a copy of your certificate of currency:</div>
                        <div style="float:left"> <input type="file" class="validate['required']" size="15" name="insurance_cert" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        You are also required to indemnify the City of Port Phillip against all losses and claims by agreeing to the following:
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        THIS INDEMNITY is given this <input type="text" class="form_input" size="2" value="<?=date('jS')?>" name="idem_date" style="width:40px;"/>
                        day of <input type="text" class="form_input" size="8" value="<?=date('F')?>" name="idem_month" style="width:50px;"/>, 
                        <input type="text" class="form_input" value="<?=date('Y')?>" size="3" name="idem_year" style="width:40px;"/> 
                        by <input type="text" class="form_input" size="17" name="idem_name" style="width:220px;"/> 
                        (hereinafter called "the Indemnifier") to the PORT PHILLIP CITY COUNCIL (hereinafter called "the Council").
                        <br /><br />
                    Whereas the Indemnifier has applied to the Council for a permit to use a portion of the road or the footpath or other Council land within the municipal district under the Council's Local Law No 1 (Community Amenity) and the Council has granted that authority by way of a permit.<br /><br />
                    
                    By checking the box below the Indemnifier confirms that in consideration of the Council granting a permit the Indemnifier agrees to indemnify and to keep indemnified, and to hold harmless the Council, its servants and agents, and each of them from and against all actions, costs, claims, charges, expenses, penalties, demands and damages whatsoever which may be brought or made or claimed against them, or any of them, arising out of, or in relation to the Indemnifier's performance or purported performance under the permit granted by the Council and is directly related to the negligent acts, errors or omissions of the Indemnifier.<br /><br />
                    The Indemnifier's liability to indemnify the Council shall be reduced proportionally to the extent that any act of omission of the Council, its servants or agents, contributed to the loss or liability.<br /><br />
                    <input type="checkbox" name="idemnity_agree" id="idemnity_agree" class="validate['required']" /> 
                    I agree to indemnify the Council as per the above Indemnify Statement.
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <hr />
                    <div style="clear:both; height:10px;"></div>
                    <div id="form_sub_header" style="margin-bottom:0px; margin-top:0px;">Accessibility</div>
                    <div style="clear:both; height:10px;"></div>
                    
                    <div style="line-height:15px;">
                        St Kilda Festival is committed to providing accessibility to all people, including those with a disability. As a commitment towards the ensuring compliance with the St Kilda Festival's Disability Action Plan traders are required to agree to the following conditions:
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        <input type="checkbox" name="accessibility[]" value="I will not obstruct the pedestrian pathway around the trading site." class="validate['required']" /> I will not obstruct the pedestrian pathway around the trading site.
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        <input type="checkbox" name="accessibility[]" value="I will ensure that either the service counter/bench/display height of my outlet is no greater than 900mm or special assistance is provided to each customer that may require accessibility assistance." class="validate['required']" /> I will ensure that either the service counter/bench/display height of my outlet is no greater than 900mm or special assistance is provided to each customer that may require accessibility assistance.
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        <input type="checkbox" name="accessibility[]" value="I will ensure EFTPOS machines have an extension cord or operate wirelessly so as people with accessibility requirements are not disadvantaged." class="validate['required']" /> I will ensure EFTPOS machines have an extension cord or operate wirelessly so as people with accessibility requirements are not disadvantaged.
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        <input type="checkbox" name="accessibility[]" value="I will ensure that entrance and exit points of my site are completely accessible to all customers." class="validate['required']" /> I will ensure that entrance and exit points of my site are completely accessible to all customers.
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    
                    
                    <hr />
                    <div style="clear:both; height:10px;"></div>
                    <div id="form_sub_header" style="margin-bottom:0px; margin-top:0px;">Fees and charges</div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        <!--
                        The Site Permit Fee for all food vendors will be 25% of your gross revenue or the Site Permit Deposit Fee (as calculated by your site area measurement provided), whichever is the greater.  All fees will be invoiced and payable immediately upon receipt by the trader.
                        -->
                        All fees will be invoiced and shall be payable immediately upon receipt by the trader. Sites can only be confirmed once payment for the total amount has been received. Please note that you are liable for full payment once your application has been approved and processed. Full refunds cannot be made under any circumstances.
                        <br/><br />
                        SCHEDULE OF UP FRONT FEES AND CHARGES
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div style="width:400px; float:left">Application Fee (GST inclusive)</div>
                        <div style="width:auto; float:left">$28.80</div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div style="width:260px; float:left">Site Permit Deposit Fee (GST not applicable)</div>
                        <div style="width:140px; float:left">Pedestrian Flow Zone<br />Regular Zone</div>
                        <div style="width:auto; float:left">$298.70<br />$154.50</div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div style="width:400px; float:left">Corner Site Fee (GST not applicable)</div>
                        <div style="width:auto; float:left">$58.20</div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div style="width:260px; float:left">Hire (GST inclusive)</div>
                        <div style="width:140px; float:left">3mx3m Marquee Package<br />6mx3m Marquee Package</div>
                        <div style="width:auto; float:left">$275.00<br />$519.10</div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div style="width:260px; float:left">Power (GST inclusive)</div>
                        <div style="width:140px; float:left">15 amp outlet<br />3phase outlet</div>
                        <div style="width:auto; float:left">$116.40 per outlet<br />$442.90 per outlet</div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                    	<input type="checkbox" name="fees_agree" id="fees_agree" class="validate['required']" /> I have read and clearly understand the St Kilda Festival Fee Structure.
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px; font-weight:bold">
                        PLEASE DO NOT SEND ANY PAYMENTS WITH THIS APPLICATION OR YOUR SUPPORTING DOCUMENTATION. YOU WILL BE INVOICED ONCE YOUR APPLICATION HAS BEEN PROCESSED AND APPROVED.
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <hr />
                    <div style="clear:both; height:10px;"></div>
                    <div id="form_sub_header" style="margin-bottom:0px; margin-top:0px;">TERMS AND CONDITIONS</div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        You must agree to all terms & conditions of engagement as outlined in the St Kilda Festival Market Traders General Information and the St Kilda Festival Market Traders General Conditions. Please download here: <br />
                        <br/>
                    - <a href="<?=base_url()?>uploads/Doc_406_Itinerant_MARKET_Traders_2015.pdf" target="_blank">General Conditions: Download Here</a><br/><br/>    
                    - <a href="<?=base_url()?>uploads/Doc_405_Itinerant_MARKET_Traders_2015.pdf" target="_blank">Important Information - Market Stall: Download Here</a> <br /><br/>
                    - <a href="<?=base_url()?>uploads/Doc_400_Itinerant_MARKET_Traders_2015.pdf" target="_blank">Market Trader Checklist: Download here</a><br/><br/>
                    <input type="checkbox" name="terms_agree" id="terms_agree" class="validate['required']" /> I have read, clearly understand and agree to all terms and conditions as outlined in the above documents.
                    </div>
                    <div style="clear:both; height:10px;"></div>

                    <hr />
                    <div style="clear:both; height:10px;"></div>
                    <div id="form_sub_header" style="margin-bottom:0px; margin-top:0px;">SUPPORTING INFORMATION CHECKLIST</div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        If you have not been able to attach documents electronically to this application where requested you need to provide the following hardcopy information to the Festival to be able to complete and process your application:<br/><br/>
                        <ul>
                            <li>- Printed images of stall</li>
                            <li>- Certificate of Currency (public liability)</li>
                        </ul>
                        <br/>
                        Please ensure your application number is noted on all supporting documentation sent in to the St Kilda Festival.<br/><br/>
                        This supporting information must be provided by <b>WEDNESDAY 03rd DECEMBER 2014</b> or your application may not be considered. Your documentation can be forwarded by the following methods:<br/><br/>
                        By post:<br/>
                        Angela de Mel<br />
                        Festival Trader Liaison & Vending  Manager<br />
                        2015 St Kilda Festival<br />
                        Private Bag 3, PO St Kilda VIC 3182<br/><br/>
                        
                        In person/By courier:<br/>
                        Attn: Angela de Mel<br/>
                        Trader Liaison & Vending Manager<br/>
                        St Kilda Festival Office<br />
                        Level 1, 232 Carlisle Street<br />
                        St Kilda East VIC 3183
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <hr />
                    <div style="clear:both; height:10px;"></div>
                    <div id="form_sub_header" style="margin-top:0px; margin-bottom:0px;">DECLARATION</div>
                    <div style="clear:both; height:10px;"></div>
                    
                    <div style="line-height:15px;">
                        I understand that the submission of this application does not guarantee my business a site at the 2015 St Kilda Festival and the acceptance of my application is at the absolute discretion of the event organisers. I understand that I will not be liable for payment until I have been approved as an accredited vendor and invoiced by the City of Port Phillip according to the details I have provided in this application. I understand that I am liable for full payment of fees and charges once my application has been processed and approved by St Kilda Festival Management. I understand I will not receive a full refund under any circumstances once this payment has made to the City of Port Phillip. I guarantee that the information supplied in this application is current and accurate.<br/><br/>
                        <input type="checkbox" name="declaration_agree" id="declaration_agree" class="validate['required']" /> I confirm that I have completed this application honestly and to the best of my knowledge and that I have read and clearly understood all information contained within this application process.<br/><br/>
                        <span style="font-weight:bold">COLLECTION NOTICE</span><br/>
                        The personal information requested on this form is being collected by the council for the St Kilda Festival permits. The personal information will be used solely by the council for that primary purpose or directly related purposes.
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    
                    
                    <p align="center">
                    	<div class="button_div" onclick="validate();">
                        	SUBMIT
                        </div>
                    	<!--<input  type="submit" value="SUBMIT" name="submit" style="background:#000;color:#fff;font-size:16px;"  />-->
                    </p>
                    <div style="line-height:15px;">
                    	<br/>
                        To assist you further we have included some important documents you can download and save relating to safety and trading at the festival. These documents can be found and downloaded from the main Stallholder page of this website. If you have any questions please contact:<br/><br/>
                        Angela de Mel<br />
                        Festival Trader Liaison & Vending Manager<br />
                        2015 St Kilda Festival<br />
                        T:03 9209 6266 / 0434 316 784<br/>
                        E:<a href="mailto:skftraders@portphillip.vic.gov.au">skftraders@portphillip.vic.gov.au</a>
                    </div>
                    </form>
                <div style="clear:both; height:10px;"></div>
            </div> 
             
            
        	<div style="clear:both;"></div>
        </div>
    </div>
</div>

