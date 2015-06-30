<script type="text/javascript" src="<?=base_url()?>js/jquery-1.6.2.js"></script>
<script>
	function validate()
	{
		var valid=true;
		
		if($j('#mfv_registration3').val() == '')
		{
			valid = false;
		}
		if($j('#given_name').val() == '')
		{
			valid = false;
		}
		if($j('#surname').val() == '')
		{
			valid = false;
		}
		if($j('#business_name').val() == '')
		{
			valid = false;
		}
		if($j('#address').val() == '')
		{
			valid = false;
		}
		if($j('#suburb').val() == '')
		{
			valid = false;
		}
		if($j('#state').val() == '')
		{
			valid = false;
		}
		if($j('#postcode').val() == '')
		{
			valid = false;
		}
		if($j('#email').val() == '')
		{
			valid = false;
		}
		if($j('#email').val() != $j('#confirm_email').val())
		{
			valid = false;
		}
		if($j('#mobile').val() == '')
		{
			valid = false;
		}
		if($j('#fss1').val() == '')
		{
			valid = false;
		}
		if($j('#fss2').val() == '')
		{
			valid = false;
		}
		if($j('#fss3').val() == '')
		{
			valid = false;
		}
		if($j('#cp1').val() == '')
		{
			valid = false;
		}
		if($j('#cp2').val() == '')
		{
			valid = false;
		}
		if($j('#cp3').val() == '')
		{
			valid = false;
		}
		if($j('#idemnity_agree').attr("checked") != 'checked')
		{
			valid = false;
		}
		if($j('#fees_agree').attr("checked") != 'checked')
		{
			valid = false;
		}
		if($j('#terms_agree').attr("checked") != 'checked')
		{
			valid = false;
		}
		if($j('#declaration_agree').attr("checked") != 'checked')
		{
			valid = false;
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
	
	function clear_contact()
	{
		$j('#cp1').val('');
		$j('#cp2').val('');
		$j('#cp3').val('');
		$j('#contact_title').val('');
		$j('#contact_on').val('');
		$j('#contact_hf').val('');
		$j('#contact_mo').val('');
		$j('#contact_fx').val('');
		$j('#contact_em').val('');
	}
	
	function copy_contact()
	{
		$j('#cp1').val($j('#fss1').val());
		$j('#cp2').val($j('#fss2').val());
		$j('#cp3').val($j('#fss3').val());
		$j('#contact_title').val($j('#fss_title').val());
		$j('#contact_on').val($j('#fss_on').val());
		$j('#contact_hf').val($j('#fss_hf').val());
		$j('#contact_mo').val($j('#fss_mo').val());
		$j('#contact_fx').val($j('#fss_fx').val());
		$j('#contact_em').val($j('#fss_em').val());
	}
</script>
<div id="paga_content_outside">
    <div id="pagecontent" style="float:none;">
        <div id="left-container">
        	<div id="form_wrapper" style="font-family:'karla'">
                <div id="form_header" style="float:left"> 
                    STALLHOLDERS FOOD - Application Form 
                </div>
                <div style="clear:both;"></div>
                <div id="form_sub_header">
                	ST KILDA FESTIVAL 2012: STALLHOLDERS – FOOD
                </div>
                
                <div style="line-height:15px;">
                	<span class="subheading2_content_page">APPLICATION FOR AN ITINERANT FOOD TRADER</span><br/><br/>
                    We are calling for food vendors who are vibrant, exuberant, stand above average and of course, can contribute some delicious morsels to join our Festival Sunday celebrations!<br/><br/>
                    In 2012, the big day falls on Sunday, 12th of February. With a usual crowd of approximately 300,000 we expect that we will have many hungry mouths to feed!<br/><br/>
                    <span class="subheading2_content_page">APPLICATION INSTRUCTIONS</span><br/><br/>
                    For public health and safety reasons, the Port Phillip City Council manages various special events through its Community Amenity Local Law No. 3. A permit is needed to trade at the St Kilda Festival and to use Council parks and reserves, including the foreshore and roads for a range of activities. <br/><br/>
                    <span class="subheading2_content_page">APPLICATION STATUS NOTIFICATION </span><br/><br/>
                    Whilst we encourage applications from stallholders, spaces are limited. Completing this application process does not guarantee you a site. Notification on the status of your application will be provided in late December. Once your application has been processed, if successful, your site will be confirmed once payment of the issued invoice has been received. St Kilda Festival Management reserves the right to cancel your application at any time and without notice. Failure to pay the issued invoice within the terms of payment may result in a cancellation of your application.<br/><br/>
                    Trader selection and placement is at the absolute discretion of St Kilda Festival Management. <br/><br/>
                    The closing date for all applications is <span style="font-weight:bold">FRIDAY, 02 DECEMBER, 2011. Late applications may not be accepted</span>.<br/><br/>
                    Several pieces of supporting documentation are required to complete your application, including pictures of your stall, and a checklist is provided within this application for your convenience. All supporting documentation must be received by <span>TUESDAY, 06 DECEMBER, 2011</span>, to ensure your application can be processed and considered. <br/><br/>
                    The online application process must be completed in a single session and all information will be lost prior to submission if you close this window before completing. An acknowledgement window will appear once your application has been submitted at the completion of this process. Please ensure you print a copy of your application for your records.<br/><br/>
                    To assist you further we have included some important documents you can download and save relating to safety and trading at the festival. These documents can be found and downloaded from the Additional Downloads page of this website.<br/><br/>
                    If you have any questions please contact:<br/><br/>
                    Angela de Mel<br/>
Trader Liaison<br/>
St Kilda Festival<br/>
T: 03 9209 6266<br/>
M: 0434 316 784<br/>
E: <a href="mailto:ademel@portphillip.vic.gov.au">ademel@portphillip.vic.gov.au</a><br/><br/>
                </div>
                
                <form name="foodForm" id="foodForm" method="post" enctype="multipart/form-data" action="<?=base_url()?>page/form_food_process">
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
                        <div style="float:left"><input type="text" class="form_input" size="32" name="given_name"  id="given_name" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Surname *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="surname" id="surname"/></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Business Name *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="business_name" id="business_name"/></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">ABN</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="abn" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Mailing Address *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="address" id="address"/></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Suburb *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="suburb" id="suburb"/></div>
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
                        <div style="float:left"><input type="text" class="form_input" size="32" name="postcode" id="postcode"/></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Email *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="email" id="email"/></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Confirm Email *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="confirm_email" id="confirm_email"/></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div style="width:auto; margin-bottom:10px;">Do you wish to receive information about the current or future St Kilda Festivals via email?</div>
                        <div style="float:left"><input type="radio" name="receive_information" value="Yes" /> Yes <input type="radio" name="receive_information" value="No" /> No</div>
                    </div>
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
                        <div style="float:left"><input type="text" class="form_input" size="32" name="mobile"  id="mobile"/></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left">Fax (please include state prefix)</div>
                        <div style="float:left">
                            	<input style="float:left;width:60px; margin-right:10px;" type="text" class="form_input" size="4" name="fax_prefix" />
                            	<input style="float:left;width:228px" type="text" class="form_input" size="22" name="fax" />
                        </div>
                        
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Previous participant</div>
                        <div style="float:left"><input type="radio" name="previous_participant" value="Yes" /> Yes <input type="radio" name="previous_participant" value="No" /> No</div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <hr />
                    <div id="form_sub_header" style="margin-bottom:0px; margin-top:10px;">Stall Information</div>
                    <p><br/>Please provide a brief description of your stall including any theme, typical level of product output and previous events you have participated in:</p>
                    <textarea class="form_textarea" style="width:500px; height:50px;" name="stall_brief_description"></textarea>
                    <p style="margin:10px 0 0 0;">So that we can calculate your fees accurately, please ensure you measure your structure or van's dimensions to the nearest centimetre</p>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left;">I will be selling goods from a</div>
                        <div style=" float:left"><input type="radio" name="stall_type" value="Marquee" /> Marquee <input type="radio" name="stall_type" value="Van" /> Van <input type="radio" name="stall_type"  value="Caravan/Trailer" /> Caravan/Trailer </div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>The dimensions of my stall are:<br/></div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Width/Frontage (metres)</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="stall_width" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Depth (metres)</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="stall_depth" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Height (including display signage on top of van) (metres)</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="stall_height" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">My Structure has a towbar</div>
                        <div style="float:left"><input type="radio" name="stall_towbar" value="Yes" /> Yes <input type="radio" name="stall_towbar" value="No" /> No</div>
                       
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                     	<div class="form_label" style="float:left">Towbar length (metres)</div>
                     	<div style="float:left"><input type="text" class="form_input" size="26" name="stall_towbar_length" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Please attach a photo of your food van or stall here<br />(Photo must be 1Mb or less in size)</div>
                        <div style="float:left"><input type="file" class="textfield validate['required']" name="stall_photo" style="width:200px" /></div>
                    </div>
                    
                    <div style="clear:both; height:10px;"></div>
                    <div id="form_sub_header" style="border-top:1px solid #646464; padding-top:15px;">
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
                    <div style="line-height:15px;">
                        Please note: Soft drink and water must be purchased through the St Kilda Festival to ensure sponsorship agreements the Festival has in place with suppliers are best serviced. Only soft drink and water stock purchased through the St Kilda Festival can be sold on Festival Sunday. Further information about the order process, products and a pricelist will become available if your application is successful.
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <hr />
                    <div id="form_sub_header" style="margin-bottom:0px; margin-top:10px;">Product storage</div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        Storage capacity for cool rooms is extremely limited. Cool room sites are subject to availability and charged at a flat rate of $100.00 per cool room site. Sites allocated are at the discretion of St Kilda Festival Management.
                    </div>
                    
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">I wish to bring a cool room </div>
                        <div style="float:left"><input type="radio" name="coolroom" value="Yes" id="cr1" /> Yes <input type="radio" name="coolroom" value="No" id="cr2" /> No</div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Cool room dimensions</div>
                        
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Width (metres)</div>
                        <div style="float:left">
                            <input type="text" class="form_input" size="10" name="coolroom_width" />
                        </div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Depth (metres)</div>
                        <div style="float:left">
                            <input type="text" class="form_input" size="10" name="coolroom_depth" />
                        </div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Towbar length (metres)</div>
                        <div style="float:left">
                            <input type="text" class="form_input" size="10" name="coolroom_length" /> 
                        </div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Please attach a photo of your cool room here<br />(Photo must be jpg 1Mb or less in size)</div>
                        <div style="float:left"><input type="file" id="coolroom_photo" class="form_input" style="width:200px" name="coolroom_photo" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>                    
                    <div id="form_sub_header" style="margin-bottom:0px; margin-top:0px;">Power required for cool room</div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left; width:180px; margin-right:20px;">I required the following provision of power to my site:</div>
                        <div style="float:left">
                        	<select class="form_input" name="power_required_coolroom">
                                <option value="1 x 15 amp outlet - $105.00">1 x 15 amp outlet</option>
                                <option value="2 x 15 amp outlet - $210.00">2 x 15 amp outlet</option>
                                <option value="3 x 15 amp outlet - $315.00">3 x 15 amp outlet</option>
                                <option value="1 x 3 phase outlet(32 amp, 5 pin, 3 phase)" />1 x 3 phase outlet(32 amp, 5 pin, 3 phase)</option>
                            </select>
                        </div>
                    </div>
                    <div style="clear:both; height:10px;"></div>     
                                        
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
                        	<input type="radio" class="validate['required']" name="hire_package" value="3x3m Marquee Package - $245.00 (Includes 3x3 Marquee, 2 chairs, 1 x 8' trestle table)" />
                        </div>
                        <div style="float:left">3x3m Marquee Package - $245.00 includes 3x3 Marquee, 2 chairs, 1 x 8' trestle table</div>    
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left; width:50px;">
                        	<input type="radio" class="validate['required']" name="hire_package" value="6x3m Marquee Package - $470.00 (Includes 6x3 Marquee, 2 chairs, 2 x 8' trestle table)" />
                        </div>
                        <div style="float:left">6x3m Marquee Package - $470.00 includes 6x3 Marquee, 2 chairs, 2 x 8' trestle table</div>    
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left; width:50px;">
                        	<input type="radio" class="validate['required']" name="hire_package" value="I do not required any marquee packages" />
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
                                <option value="1 x 15 amp outlet - $105.00">1 x 15 amp outlet - $105.00</option>
                                <option value="2 x 15 amp outlet - $210.00">2 x 15 amp outlet - $210.00</option>
                                <option value="3 x 15 amp outlet - $315.00">3 x 15 amp outlet - $315.00</option>
                                <option value="1 x 3 phase outlet (32 amp, 5 pin, 3 phase) - $399.00" />1 x 3 phase outlet (32 amp, 5 pin, 3 phase) - $399.00</option>
                                <option value="I do not require power $0" />I do not require power $0</option>
                            </select>
                        </div>    
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <hr />
                    <div style="clear:both; height:10px;"></div>
                    <div id="form_sub_header" style="margin-top:0px; margin-top:0px;">FOOD ACT REGISTRATION</div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        Please select one of the following two options:
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left; width:50px;">
                        	<input type="radio" class="validate['required']" id="hr1" name="health_registration" value="Option 1:Class 4 Traders: I have lodged a Notification Form with my Principal Council (copy enclosed)." />
                        </div>
                        <div style="float:left; width:550px;">Option 1:Class 4 Traders: I have lodged a Notification Form with my Principal Council (copy enclosed).</div>    
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left; width:50px;">
                        	<input type="radio" class="validate['required']" id="hr2" name="health_registration" value="Option 2:Class 2 & 3 Traders: I have registered a Temporary or Mobile Food Premises with my Principal Council and I have enclosed a copy of the Registration Certificate." />
                        </div>
                        <div style="float:left; width:550px">Option 2:Class 2 & 3 Traders: I have registered a Temporary or Mobile Food Premises with my Principal Council and I have enclosed a copy of the Registration Certificate.</div>    
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        If you have selected Option 2, please supply the following information:
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px; font-weight:bold">
                        FOOD SAFETY SUPERVISOR CONTACT DETAILS
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        If the temporary food premises is run by a not-for-profit organisation, please provide the details of the contact person on the day of the event.
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        A food safety supervisor (FSS) is a person who has undergone formal training in the safe handling of food.  The FSS does not have to be present at the event, but he/she has responsibility for ensuring appropriate facilities, food handling methods and food handler training at the event.  All commercial businesses applying for a temporary food event registration must nominate a qualified FSS even if you will be using the Events Template unless Council has indicated that your business is exempt from this requirement.
                    </div>

                    
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Title</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="fss_title" id="fss_title" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">First Name *</div>
                        <div style="float:left"><input type="text" id="fss1" class="form_input" size="32" name="fss_fn"  /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Last Name *</div>
                        <div style="float:left"><input type="text"  id="fss2" class="form_input" size="32" name="fss_ln"  /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Other Names</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="fss_on" id="fss_on" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Work Phone *</div>
                        <div style="float:left"><input type="text"  id="fss3" class="form_input" size="32" name="fss_wf" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Home Phone</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="fss_hf" id="fss_hf" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Mobile</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="fss_mo" id="fss_mo" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Fax</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="fss_fx" id="fss_fx" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Email</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="fss_em" id="fss_em" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        Contact person on day of event:
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        Is the contact person the same as the food safety supervisor?
                    </div>
                                       
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left"><input type="radio" onclick="copy_contact();" id="contact_same1" name="contact_same" value="Yes"  class="validate['required']" /> Yes </div>
                        <div style="float:left"><input  class="validate['required']" onclick="clear_contact();" type="radio" id="contact_same2" name="contact_same" value="No" /> No</div>
                    </div>
                    

                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Title</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="contact_title" id="contact_title" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">First Name *</div>
                        <div style="float:left"><input type="text" id="cp1" class="form_input" size="32"  name="contact_fn" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Last Name *</div>
                        <div style="float:left"><input type="text"  id="cp2" class="form_input" size="32"  name="contact_ln" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Other Names</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="contact_on" id="contact_on" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Work Phone *</div>
                        <div style="float:left"><input type="text" id="cp3" class="form_input" size="32" name="contact_wf" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Home Phone</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="contact_hf" id="contact_hf" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Mobile</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="contact_mo" id="contact_mo" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Fax</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="contact_fx" id="contact_fx" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    	<div>
                        <div class="form_label" style="float:left">Email</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="contact_em" id="contact_em" /></div>
                    </div>
                    
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        AND
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        <input type="checkbox" name="hr3" class="validate['required']" value="All Traders:I have enclosed a Statement of Trade for the City of Port Phillip to enable participation in the St Kilda Festival" />&nbsp;All Traders:I have enclosed a Statement of Trade for the City of Port Phillip to enable participation in the St Kilda Festival
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left; width:180px; margin-right:20px;">Attach your Registration Certificate form here (Class 2 & 3 Traders).</div>
                        <div style="float:left"><input type="file" style="width:400px;" id="mfv_registration1" name="mfv_registration1" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left; width:180px; margin-right:20px;">Attach your Notification Form here (Class 4 Traders).</div>
                        <div style="float:left"><input type="file"  style="width:400px;" id="mfv_registration2" name="mfv_registration2" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left; width:180px; margin-right:20px;">* mandatory all Traders: Attach your completed Statement of Trade form here</div>
                        <div style="float:left"><input type="file" class="validate['required']" style="width:400px;" id="mfv_registration3" name="mfv_registration3" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left; width:180px; margin-right:20px;">Attach your completed Victorian Food Safety Program for events pages 2 & 3 here</div>
                        <div style="float:left"><input type="file" style="width:400px;" id="mfv_registration4" name="mfv_registration4" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        or alternatively post to the address below,  making sure you note your application number.
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        For further information on Temporary Food Premises Permit Information for Mobile Food Vehicles & Temporary Stalls can be downloaded <a href="http://www.stkildafestival.com.au/callforentries/member/uploads/09_St Kilda Festival Health Requirements for Food Vendors - 2012 - 111011.pdf" target="_blank">here</a>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    
                    <hr />
                    <div style="clear:both; height:10px;"></div>
                    <div id="form_sub_header" style="margin-bottom:0px; margin-top:0px">Vehicle Access & Parking</div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        To gain vehicle access to the St Kilda Festival Precinct during Bump In & Bump Out periods on Festival Day, your vehicle needs to be accredited. The following information is required with your application:
                    </div>
                    <div style="clear:both; height:10px;"></div>

                    <div>
                        <div class="form_label" style="float:left; width:50px">
                        	<input type="radio" name="vehicle_parking" value="I will not require vehicle access to the Festival Precinct." />
                        </div>
                        <div style="float:left">I will not require vehicle access to the Festival Precinct.</div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    
                    <div>
                        <div class="form_label" style="float:left; width:50px">
                        	<input type="radio" name="vehicle_parking" value="I require vehicle access to the Festival Precinct" />
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
                        	<input type="radio" name="vehicle_parking" value="I will be hiring a vehicle for the event and do not yet have the appropriate details available" />
                        </div>
                        <div style="float:left">I will be hiring a vehicle for the event and do not yet have the appropriate details available</div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left; width:50px">
                        	<input type="radio" name="vehicle_parking" value="I will require Festival allocated parking for this hire vehicle (not required for actual food vans, only support vehicles)" />
                        </div>
                        <div style="float:left; width:500px;">I will require Festival allocated parking for this vehicle (not required for actual food vans, only support vehicles)</div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <hr />
                    <div style="clear:both; height:10px;"></div>
                    <div id="form_sub_header" style="margin-bottom:0px; margin-top:0px;">Insurance & Idemnity</div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        All itinerant traders must have public liability insurance to the value of $10,000,000 naming <b>CITY OF PORT PHILLIP</b> as an interested party on the Certificate of Currency.
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div class="form_label" style="float:left;">Please attach a copy of your certificate of currency:</div>
                        <div style="float:left"> <input type="file" class="validate['required']" size="15" name="insurance_cert" /></div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        You are also required to indemnify the Council against all losses and claims by agreeing to the following:
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        THIS INDEMNITY is given this <input type="text" class="form_input" size="2" value="23rd" name="idem_date" style="width:40px;"/>
                        day of <input type="text" class="form_input" size="8" value="July" name="idem_month" style="width:50px;"/>, 
                        <input type="text" class="form_input" value="2012" size="3" name="idem_year" style="width:40px;"/> 
                        by <input type="text" class="form_input" size="17" name="idem_name" style="width:220px;"/> 
                        (hereinafter called "the Indemnifier") to the PORT PHILLIP CITY COUNCIL (hereinafter called "the Council").
                        <br /><br />
                    Whereas the Indemnifier has applied to the Council for a permit to use a portion of the road or the footpath or other Council land within the municipal district under the Council's Community Amenity Local Law No. 3 and the Council has granted that authority by way of a permit.<br /><br />
                    By checking the box below the Indemnifier confirms that in consideration of the Council granting a permit the Indemnifier agrees to indemnify and to keep indemnified, and to hold harmless the Council, its servants and agents, and each of them from and against all actions, costs, claims, charges, expenses, penalties, demands and damages whatsoever which may be brought or made or claimed against them, or any of them, arising out of, or in relation to the Indemnifier's performance or purported performance under the permit granted by the Council and is directly related to the negligent acts, errors or omissions of the Indemnifier.<br /><br />
                    The Indemnifier's liability to indemnify the Council shall be reduced proportionally to the extent that any act of omission of the Council, its servants or agents, contributed to the loss or liability.<br /><br />
                    <input type="checkbox" name="idemnity_agree" id="idemnity_agree" class="validate['required']" /> I agree to Indemnify the Council as per the above Indemnity Statement.
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <hr />
                    <div style="clear:both; height:10px;"></div>
                    <div id="form_sub_header">Accessibility</div>
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
                        The Site Permit Fee for all food vendors will be 25% of your gross revenue or the Site Permit Deposit Fee (as calculated by your site area measurement provided), whichever is the greater.  All fees will be invoiced and payable immediately upon receipt by the trader.<br/>
                        SCHEDULE OF UP FRONT FEES AND CHARGES
                    </div>
                    <div style="clear:both; height:10px;"></div>

                    <div>
                        <div style="width:400px; float:left">Application Fee (GST inclusive)</div>
                        <div style="width:auto; float:left">$25.00</div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div style="width:260px; float:left">Site Permit Deposit Fee (GST not applicable)</div>
                        <div style="width:140px; float:left">15m2 or less<br />16m2 or more</div> 
                        <div style="width:auto; float:left">$62.70 per square metre<br />$96.80 per square metre</div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div style="width:400px; float:left">Cool room site permit fee (GST not applicable)</div>
                        <div style="width:auto; float:left">$100.00</div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div style="width:260px; float:left">Hire (GST inclusive)</div>
                        <div style="width:140px; float:left">3mx3m Marquee Package<br />6mx3m Marquee Package</div>
                        <div style="width:auto; float:left">$245.00<br />$470.00</div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div>
                        <div style="width:260px; float:left">Power (GST inclusive)</div>
                        <div style="width:140px; float:left">15 amp outlet<br />3 phase outlet</div>
                        <div style="width:auto; float:left">$105.00 per outlet<br />$399.00 per outlet</div>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <hr />
                    <div style="clear:both; height:10px;"></div>
                    <div id="form_sub_header" style="margin-bottom:0px; margin-top:0px;">Post-event fees and charges</div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        Total revenue/sales figures for trade on the day of the event must be detailed on the <a href="http://www.stkildafestival.com.au/callforentries/member/uploads/10_Trader Revenue Declaration Form - 2012 - 111011.pdf" target="_blank">Trader Revenue Declaration form</a> and submitted by close of business on Wednesday 15th February 2012. Please submit this information by fax or email as per details below.
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        Email: <a href="mailto:ademel@portphillip.vic.gov.au">ademel@portphillip.vic.gov.au</a>
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        Fax: 03 9536 2717
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <div style="line-height:15px;">
                        Your Total Site Fee will then be calculated and if applicable, the balance of 25% of your gross revenue minus your initial Site Permit Deposit Fee plus any additional charges incurred through the course of the event will be invoiced and payable immediately upon receipt by the undersigned.
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
                        You must agree to all terms & conditions of engagement as outlined in the St Kilda Festival General Information - Food Vendors and the General Conditions. Please download here: <br />
                    - <a href="http://www.stkildafestival.com.au/callforentries/member/uploads/08_General Information - Food Vendors - 2012 - 111011.pdf" target="_blank">General Information</a> <br /><br/>- <a href="http://www.stkildafestival.com.au/callforentries/member/uploads/07_General Conditions - 2012 - 111011.pdf" target="_blank">General Conditions</a><br/><br/>
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
                            <li>- Mobile Food Vehicle Registration Certificate OR </li> 
                            <li>- Temporary Food Premises Permit Application Form and Event Food Safety Plan</li>
                        </ul>
                        <br/>
                        Please ensure your application number is noted on all supporting documentation sent in to the St Kilda Festival.<br/><br/>
                        This information must be provided by <b>TUESDAY, 06th DECEMBER 2011</b> or your application may not be considered. Your documentation can be forwarded by the following methods:<br/><br/>
                        By post:<br/>
                        Angela de Mel<br />
                        Trader Liaison<br />
                        St Kilda Festival<br />
                        Private Bag 3, PO St Kilda VIC 3182<br/><br/>
                        In person/By courier:<br/>
                        St Kilda Festival Office<br />
                        Level 1, 232 Carlisle Street<br />
                        St Kilda East
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    <hr />
                    <div style="clear:both; height:10px;"></div>
                    <div id="form_sub_header" style="margin-top:0px; margin-bottom:0px;">DECLARATION</div>
                    <div style="clear:both; height:10px;"></div>
                    
                    <div style="line-height:15px;">
                        I understand that the submission of this application does not guarantee my business a site at the 2012 St Kilda Festival and the acceptance of my application is at the absolute discretion of the event organisers. I understand that I will not be liable for payment until I have been approved as an accredited vendor and invoiced by the City of Port Phillip according to the details I have provided in this application. I understand that I am liable for full payment of fees and charges once my application has been processed and approved by St Kilda Festival Management. I understand I will not receive a full refund under any circumstances once this payment has made to the City of Port Phillip. I guarantee that the information supplied in this application is current and accurate.<br/><br/>
                        <input type="checkbox" name="declaration_agree" id="declaration_agree" class="validate['required']" /> I confirm that I have completed this application honestly and to the best of my knowledge and that I have read and clearly understood all information contained within this application process.<br/><br/>
                        <span style="font-weight:bold">COLLECTION NOTICE</span><br/>
                        The personal information requested on this form is being collected by the council for the St Kilda Festival permits. The personal information will be used solely by the council for that primary purpose or directly related purposes.
                    </div>
                    <div style="clear:both; height:10px;"></div>
                    
                    
                    <p align="center">
                    	<div class="button_div" onclick="validate();">
                        	SUMBIT
                        </div>
                    	<!--<input  type="submit" value="SUBMIT" name="submit" style="background:#000;color:#fff;font-size:16px;"  />-->
                    </p>
                    <div style="line-height:15px;">
                    	<br/>
                        To assist you further we have included some important documents you can download and save relating to safety and trading at the festival. These documents can be found and downloaded from the main Stallholder page of this website. If you have any questions please contact:<br/><br/>
                        Angela de Mel<br />
                        Trader Liaison<br />
                        St Kilda Festival<br />
                        T:03 9209 6266 / 0434 316 784<br/>
                        E:<a href="mailto:ademel@portphillip.vic.gov.au">ademel@portphillip.vic.gov.au</a>
                    </div>
                    </form>
                <div style="clear:both; height:10px;"></div>
            </div> 
             
            
        	<div style="clear:both;"></div>
        </div>
    </div>
</div>

