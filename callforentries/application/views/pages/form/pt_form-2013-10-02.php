<script type="text/javascript" src="<?=base_url()?>js/jquery-1.6.2.js"></script>
<script>
	function validate()
	{
		var valid=true;
		
		if(jQuery('#site_plan').val() == '')
		{
			valid = false;
			jQuery('#site_plan').css('border-color','red');
		}
		if(jQuery('#business_name').val() == '')
		{
			valid = false;
			jQuery('#business_name').css('border-color','red');
		}
		if(jQuery('#contact_name').val() == '')
		{
			valid = false;
			jQuery('#contact_name').css('border-color','red');
		}
		if(jQuery('#business_address').val() == '')
		{
			valid = false;
			jQuery('#business_address').css('border-color','red');
		}
		if(jQuery('#business_city').val() == '')
		{
			valid = false;
			jQuery('#business_city').css('border-color','red');
		}
		if(jQuery('#business_state').val() == '')
		{
			valid = false;
			jQuery('#business_state').css('border-color','red');
		}
		if(jQuery('#business_postcode').val() == '')
		{
			valid = false;
			jQuery('#business_postcode').css('border-color','red');
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
			jQuery('#confirm_email').css('border-color','red');
		}
		if(jQuery('#trading_area_permit1').attr("checked") != 'checked' && jQuery('#trading_area_permit1').attr("checked") != 'checked')
		{
			valid = false;
			jQuery('#trading_area_permit1').css('border-color','red');
			jQuery('#trading_area_permit1').css('border-color','red');
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
                    PERMANENT TRADERS - Application Form
                </div>
                <div style="clear:both;"></div>
                <div id="form_sub_header">
                	ST KILDA FESTIVAL 2013: PERMANENT TRADER
                </div>
                
                <div style="line-height:15px;">
                	<span class="subheading2_content_page">APPLICATION FOR PORT PHILLIP TRADERS - EXTENDED FESTIVAL TRADING</span><br/><br/>
                    <span class="subheading2_content_page">APPLICATION INSTRUCTIONS</span><br/><br/>
                    For public health and safety reasons, the Port Phillip City Council manages various special events through its Community Amenity Local Law No. 3. A permit is needed to trade at the St Kilda Festival and to use Council parks and reserves, including the foreshore and roads for a range of activities.<br/><br/>
                    <span class="subheading2_content_page">APPLICATION STATUS NOTIFICATION</span><br/><br/>
                    Whilst we encourage applications from stallholders, spaces are limited. Completing this application process does not guarantee you a site. Notification on the status of your application will be provided in late December. Once your application has been processed, if successful, your site will be confirmed once payment of the issued invoice has been received. St Kilda Festival Management reserves the right to cancel your application at any time and without notice. Failure to pay the issued invoice within the terms of payment may result in a cancellation of your application.<br/><br/>
                    The closing date for all applications is <span style="font-weight:bold">FRIDAY, 09 NOVEMBER, 2012. Late applications may not be accepted.</span><br/><br/>
                    The online application process must be completed in a single session and all information will be lost prior to submission if you close this window before completing. An acknowledgement window will appear once your application has been submitted at the completion of this process. Please ensure you print a copy of your application for your records.<br/><br/>
                    <span style="font-weight:bold">Before beginning your application contact Angela de Mel for a copy of your Festival extended trading space.</span><br/><br/>
                    If you have any questions please contact:<br/><br/>
                    Angela de Mel<br/>
Trader Liaison<br/>
St Kilda Festival<br/>
T: 03 9209 6266<br/>
M: 0434 316 784<br/>
E: <a href="mailto:skftraders@portphillip.vic.gov.au">skftraders@portphillip.vic.gov.au</a><br/><br/>
                </div>
                
                <!--<form name="foodForm" id="foodForm" method="post" enctype="multipart/form-data" action="<?=base_url()?>page/form_trader_process">-->
                <form name="foodForm" id="foodForm" method="post" enctype="multipart/form-data" action="<?=base_url()?>page/form_trader_process">
                <?php if($this->session->flashdata('form_mes') != '') { echo '<p style="font-size:14px;color:#ff0000">'.$this->session->flashdata('form_mes').'</p>'; } 
				?>
                    <div id="form_sub_header" style="margin-bottom:10px">Application Details</div>
                    <!--<div class="gap"></div>
                    	<div>
                        <div class="form_label" style="float:left">Application Number</div>
                        <div style="float:left"><input type="text" disabled="disabled" class="form_input" size="32"  name="application_number" value="PT" /></div>
                    </div>
                    <div class="gap"></div>
                    	<div>
                        <div class="form_label" style="float:left">Date</div>
                        <div style="float:left"><input type="text"  class="form_input" size="32" value="23-07-2012" name="date" /></div>
                    </div>-->
                    <div class="gap"></div>
                    	<div>
                        <div class="form_label" style="float:left">Business/Company Name *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="business_name" id="business_name" /></div>
                    </div>
                    <div class="gap"></div>
                    	<div>
                        <div class="form_label" style="float:left">Main contact name *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="contact_name" id="contact_name" /></div>
                    </div>
                    <div class="gap"></div>
                    	<div>
                        <div class="form_label" style="float:left">ABN</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="abn"  /></div>
                    </div>
                    <div class="gap"></div>
                    	<div>
                        <div class="form_label" style="float:left">Business Address *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="business_address" id="business_address" /></div>
                    </div>
                    <div class="gap"></div>
                    	<div>
                        <div class="form_label" style="float:left">Business City/Town *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="business_city" id="business_city" /></div>
                    </div>
                    <div class="gap"></div>
                    	<div>
                        <div class="form_label" style="float:left">Business State *</div>
                        <div style="float:left">
                            <select  name="business_state" id="business_state" class="form_input">
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
                    <div class="gap"></div>
                    	<div>
                        <div class="form_label" style="float:left">Business Postcode *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="business_postcode" id="business_postcode" /></div>
                    </div>
                    <div class="gap"></div>
                    	<div>
                        <div class="form_label" style="float:left">Mailing Address (if different to above)</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="mailing_address" /></div>
                    </div>
                    <div class="gap"></div>
                    	<div>
                        <div class="form_label" style="float:left">City/Town</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="city" /></div>
                    </div>
                    <div class="gap"></div>
                    	<div>
                        <div class="form_label" style="float:left">State</div>
                        <div style="float:left">
                            <select  name="state" class="form_input">
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
                    <div class="gap"></div>
                    	<div>
                        <div class="form_label" style="float:left">Postcode</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="postcode" id="postcode"/></div>
                    </div>
                    <div class="gap"></div>
                    	<div>
                        <div class="form_label" style="float:left">Email *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="email" id="email"/></div>
                    </div>
                    <div class="gap"></div>
                    	<div>
                        <div class="form_label" style="float:left">Confirm Email *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="confirm_email" id="confirm_email"/></div>
                    </div>
                    <div class="gap"></div>
                    	<div>
                        <div style="width:auto; margin-bottom:10px;">Do you wish to receive information about the current or future St Kilda Festivals via email?</div>
                        <div style="float:left"><input type="radio" name="receive_information" value="Yes" /> Yes <input type="radio" name="receive_information" value="No" /> No</div>
                    </div>
                    <div class="gap"></div>
                    	<div>
                        <div class="form_label" style="float:left">Telephone (please include state prefix)</div>
                        <div style="float:left">
                            	<input style="float:left;width:60px; margin-right:10px;" type="text" class="form_input" size="4" name="telephone_prefix" />
                            	<input style="float:left;width:228px" type="text" class="form_input" size="22" name="telephone" />
                        </div>
                    </div>
                    <div class="gap"></div>
                    <div>
                        <div class="form_label" style="float:left">Mobile *</div>
                        <div style="float:left"><input type="text" class="form_input" size="32" name="mobile" id="mobile" /></div>
                    </div>
                    <div class="gap"></div>
                    <div>
                        <div class="form_label" style="float:left">Fax (please include state prefix)</div>
                        <div style="float:left">
                            	<input style="float:left;width:60px; margin-right:10px;" type="text" class="form_input" size="4" name="fax_prefix" />
                            	<input style="float:left;width:228px" type="text" class="form_input" size="22" name="fax" />
                        </div>
                        
                    </div>
                    <div class="gap"></div>
                    	<div>
                        <div class="form_label" style="float:left">Previous participant</div>
                        <div style="float:left"><input type="radio" name="previous_participant" value="Yes" /> Yes <input type="radio" name="previous_participant" value="No" /> No</div>
                    </div>
                    <div class="gap"></div>
                    <hr />
                    <div id="form_sub_header" style="margin-bottom:0px;">BY COMPLETING THIS SECTION YOU ARE AGREEING TO APPLY TO EXTENDED/AMENDED TRADING AREA FOR THE ST KILDA FESTIVAL.</div>
                    

                   <!-- <div class="gap"></div>
                    	<div>
                        <div class="form_label" style="float:left;">Please attach your Festival extended trading plan with your desired extended area here</div>
                        <div style=" float:left"><input type="text" class="textfield validate['required']" size="32" name="total_area" id="total_area" /></div>
                    </div>-->
                    <div class="gap"></div>
                    <div style="line-height:15px;">
                    	Please attach your Festival extended trading plan with your desired extended area here <br/>
                        (A festival extended trading plan will be supplied, please highlight and shade the required area.)
                    </div>
                    <div style="margin-top:10px;"><input type="file" class="textfield validate['required']" name="site_plan" id="site_plan" style="width:200px" /></div>
                    <div class="gap"></div>
                    
                    	<div>
                        <div style="line-height:15px;">Total area (in square metres) of occupation proposed as per available space I/we have identified on the attached plan *</div>
                        
                        
      					<div style="float:left; margin-top:10px;"><input type="text" class="textfield validate['required']" size="32" name="total_area" id="total_area" /></div>                  <div class="gap"></div>
                        <!--<div style="line-height:15px;">Please attach your Food Act ‘Notification Form’ here, if you are intending to serve beverages or packaged ice cream in your outdoor extended trading area</div>-->
                        <div style="margin-top:10px;"><input type="file" class="textfield" name="food_act" id="food_act" style="width:200px" /></div>

                        
                    </div>

                    <!--<div class="gap"></div>-->
                    <div id="form_sub_header" style="border-top:1px solid #646464; padding-top:5px;">
                        FEES PAYABLE
                    </div>
                    <div class="gap"></div>
                    <div style="line-height:15px;">
                        Please note that fees are only payable once an invoice has been issued. Do not provide payment until an invoice has been received. <br/><br/>
                        Administration Fee $27.50 (GST inclusive) will apply.<br/><br/>
                        GST is not applied to the following permit fees ie Permit fees are GST free<br/><br/>
                        <span style="font-weight:bold">Extended Trading Area Permit Fee *</span>
                    </div>
                    <div class="gap"></div>
                    <div>
                        <div class="form_label" style="float:left; width:50px">
                        	<input type="radio" class="textfield validate['required']" name="trading_area_permit" id="trading_area_permit1" value="Extended Trading Area Permit with Alcohol Service - $22.50 p/M2 or Minimum of $300.00" />
                        </div>
                        <div style="float:left">Extended Trading Area Permit with Alcohol Service - $22.50 p/M2 or Minimum of $300.00</div>
                    </div>
                    <div class="gap"></div>
                    <div>
                        <div class="form_label" style="float:left; width:50px">
                        	<input type="radio" class="textfield validate['required']" name="trading_area_permit" id="trading_area_permit2" value="Extended Trading Area Permit without Alcohol Service - $8.50 p/M2 or Minimum of $100.00" />
                        </div>
                        <div style="float:left">Extended Trading Area Permit without Alcohol Service - $8.50 p/M2 or Minimum of $100.00</div>
                    </div>
                    <div class="gap"></div>
                    <div style="line-height:15px;">
                        The sale of drinks (including alcohol) from the road or footpath outside your business is permitted on the following conditions:<br/>
                        <ul style="list-style:disc; margin-left:20px;">
                          <li >Your business MUST be a registered food premises with the City of Port Phillip Health Services Unit.  All non-food businesses will NOT be permitted to sell food, which includes drinks.</li>
                          <li >The only food permitted to be sold from the footpath or road outside your business are ice-cream, soft drinks, coffee and alcohol (beer, wine only). Beverages must be served in plastic; no glass is permitted.</li>
                          <li >All other food is NOT TO BE SOLD from the footpath or road areas and only from within your premises, as per usual.  This includes (and not limited to) pre prepared sandwiches, hot food from Bain Maries, all potentially hazardous food, freshly squeezed juices and salads.</li>
                          <li >BBQ's and other cooking or hot holding facilities are NOT permitted on the footpath or road.  This equipment will be requested to be removed on the day.</li>
                          <li >The sale of alcohol from the footpath or road is subject to The Victorian Commission for Gambling and Liquor Regulation licensing approval and will only be permitted from premises currently holding a suitable Liquor License.</li>
                        </ul><br/>
                        <!--I/We will be selling beverages/ice cream from footpath trading zone.-->
                    </div>
                    <div class="gap"></div>
                    <!--<div>
                        <div class="form_label" style="float:left; width:50px">
                        	<input type="radio" name="selling_beverages_icecream" value="NO" />
                        </div>
                        <div style="float:left">NO</div>
                    </div>
                    <div class="gap"></div>
                    <div>
                        <div class="form_label" style="float:left; width:50px">
                        	<input type="radio" name="selling_beverages_icecream" value="YES" />
                        </div>
                        <div style="float:left">YES&nbsp;&nbsp;If you have answered yes, please provide details by answering the following 3 questions</div>
                    </div>
                    <div class="gap"></div>
                    <div>
                        <div class="form_label" style="float:left">1)Food Act Registration Number:</div>
                        <div style="float:left"><input type="text" size="32" name="food_registration_number" id="food_registration_number" class="form_input"/></div>
                    </div>
                    <div class="gap"></div>
                    <div>
                        <div class="form_label" style="float:left">2)List of Food to be sold from Footpath / Road:</div>
                        <div style="float:left"><input type="text" size="32" name="food_list" id="food_list" class="form_input"/></div>
                    </div>
                    <div class="gap"></div>
                    <div>
                        <div class="form_label" style="float:left">3)List of Equipment to be stored on Footpath / Road:</div>
                        <div style="float:left"><input type="text" size="32" name="equipment_list" id="equipment_list" class="form_input"/></div>
                    </div>
                    <div class="gap"></div>-->
                    <div style="line-height:15px;">
                        <span style="font-weight:bold">MAJOR EVENT LICENCE – MULTIPLE APPLICANTS (LIQUOR LICENCE)</span><br/><br/>
                        If you are a current Port Phillip Trader intending to serve or sell alcohol from the extended festival trading area in which you are applying, you must also apply for a Major Event Licence (Liquor Licence) through <a href="http://www.vcglr.vic.gov.au/home/liquor+licences/" target="_blank">the Victorian Commission for Gambling and Liquor Regulation</a> (formerly 'Responsible Alcohol Victoria').<br/><br/>
                        If granted, your licence may require you to provide security guards and/or impose additional conditions to your regular outdoor licensed area. Please complete the form and attach here with payment and the accompanying forms to be considered by The Victorian Commission for Gambling and Liquor Regulation.<br/>
						<br/><input type="file" name="liquor_license" />
						<br/><br/>
                        Or alternatively send in your application and payment(cheques made out to 'Victorian Commission for Gambling and Liquor Regulation') by mail to us.
                    </div>

                    <div class="gap"></div>
                    <hr/>
                    <div class="gap"></div>
                    <div id="form_sub_header" style="margin-bottom:0px; margin-top:0px;">Insurance & Indemnity</div>
                    <div class="gap"></div>
                    <div style="line-height:15px;">
                        All itinerant traders must have public liability insurance to the value of $10,000,000 naming the <b>CITY OF PORT PHILLIP</b> as an interested party on the Certificate of Currency.
                    </div>
                    <div class="gap"></div>
                    <div>
                        <div class="form_label" style="float:left;">Please attach a copy of your certificate of currency:</div>
                        <div style="float:left"> <input type="file" class="validate['required']" size="15" name="insurance_cert" /></div>
                    </div>
                    <div class="gap"></div>
                    <div style="line-height:15px;">
                        You are also required to indemnify the Council against all losses and claims by agreeing to the following:
                    </div>
                    <div class="gap"></div>
                    <div style="line-height:15px;">
                        THIS INDEMNITY is given this <input type="text" class="form_input" size="2" value="<?=date('jS')?>" name="idem_date" style="width:40px;"/>
                        day of <input type="text" class="form_input" size="8" value="<?=date('F')?>" name="idem_month" style="width:50px;"/>, 
                        <input type="text" class="form_input" value="<?=date('Y')?>" size="3" name="idem_year" style="width:40px;"/> 
                        by <input type="text" class="form_input" size="17" name="idem_name" style="width:220px;"/> 
                        (hereinafter called "the Indemnifier") to the PORT PHILLIP CITY COUNCIL (hereinafter called "the Council").
                        <br /><br />
                    Whereas the Indemnifier has applied to the Council for a permit to use a portion of the road or the footpath or other Council land within the municipal district under the Council's Community Amenity Local Law No. 3 and the Council has granted that authority by way of a permit.<br /><br />
                    By checking the box below the Indemnifier confirms that in consideration of the Council granting a permit the Indemnifier agrees to indemnify and to keep indemnified, and to hold harmless the Council, its servants and agents, and each of them from and against all actions, costs, claims, charges, expenses, penalties, demands and damages whatsoever which may be brought or made or claimed against them, or any of them, arising out of, or in relation to the Indemnifier's performance or purported performance under the permit granted by the Council and is directly related to the negligent acts, errors or omissions of the Indemnifier.<br /><br />
                    The Indemnifier's liability to indemnify the Council shall be reduced proportionally to the extent that any act of omission of the Council, its servants or agents, contributed to the loss or liability.<br /><br />
                    <input type="checkbox" name="idemnity_agree" id="idemnity_agree" class="validate['required']"/> I agree to indemnify the Council as per the above Indemnity Statement.
                    </div>
                    <div class="gap"></div>
                    <div style="line-height:15px;">
                        <input type="checkbox" name="fees_agree" id="fees_agree" class="validate['required']" /> I have read and clearly understand the St Kilda Festival Fee Structure.
                    </div>
                    <div class="gap"></div>
                    <div style="line-height:15px; font-weight:bold">
                        PLEASE DO NOT SEND ANY PAYMENTS WITH THIS APPLICATION OR YOUR SUPPORTING DOCUMENTATION. YOU WILL BE INVOICED ONCE YOUR APPLICATION HAS BEEN PROCESSED AND APPROVED.
                    </div>
                    <div class="gap"></div>
                    <hr />
                    <div class="gap"></div>
                    <div id="form_sub_header" style="margin-bottom:0px; margin-top:0px;">TERMS AND CONDITIONS</div>
                    <div class="gap"></div>
                    <div style="line-height:15px;">
                       You must agree to all terms & conditions of engagement as outlined in the St Kilda Festival General Information and the St Kilda Festival General Conditions. Please download here: <br />
- <a href="<?=base_url()?>uploads/Doc02.pdf" target="_blank">General Information: Download Here</a><br /><br/>
- <a href="<?=base_url()?>uploads/Doc03.pdf" target="_blank">General Conditions: Download Here</a><br /><br/>
- <a href="<?=base_url()?>uploads/Doc04.pdf" target="_blank">Extended Trading Checklist: Download here</a><br /><br/>
                    <input type="checkbox" name="terms_agree" id="terms_agree" class="validate['required']" /> I have read, clearly understand and agree to all terms and conditions as outlined in the above documents.
                    </div>
                    <div class="gap"></div>

                    <hr />
                    <div class="gap"></div>
                    <div id="form_sub_header" style="margin-bottom:0px; margin-top:0px;">SUPPORTING INFORMATION CHECKLIST</div>
                    <div class="gap"></div>
                    <div style="line-height:15px;">
                        If you have not been able to attach documents electronically to this application where requested you need to provide the following hardcopy information to the Festival to be able to complete and process your application:<br/><br/>
                        <ul style="list-style:disc; margin-left:20px;">
                            <li>Certificate of Currency (public liability)</li>
                            <li>Festival Extended Trading Plan</li>
                            <li>Major Event Licence – Multiple Applicants (Liquor Licence) (if applicable)</li>
                            <li>Food Act Notification Form (if applicable)</li>
                        </ul>
                        <br/>
                        This information must be provided by <b>FRIDAY, 09 NOVEMBER 2012</b> or your application may not be considered. Your documentation can be forwarded by the following methods:<br/><br/>
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
                    <div class="gap"></div>
                    <hr />
                    <div class="gap"></div>
                    <div id="form_sub_header" style="margin-top:0px; margin-bottom:0px;">DECLARATION</div>
                    <div class="gap"></div>
                    
                    <div style="line-height:15px;">
                        I understand that the submission of this application does not guarantee my business a site at the 2013 St Kilda Festival and the acceptance of my application is at the absolute discretion of the event organisers. I understand that I will not be liable for payment until I have been approved as an accredited vendor and invoiced by the City of Port Phillip according to the details I have provided in this application. I understand that I am liable for full payment of fees and charges once my application has been processed and approved by St Kilda Festival Management. I understand I will not receive a full refund under any circumstances once this payment has made to the City of Port Phillip. I guarantee that the information supplied in this application is current and accurate.<br/><br/>
                        <input type="checkbox" name="declaration_agree" id="declaration_agree" class="validate['required']" /> I confirm that I have completed this application honestly and to the best of my knowledge and that I have read and clearly understood all information contained within this application process.<br/><br/>
                        <span style="font-weight:bold">COLLECTION NOTICE</span><br/>
                        The personal information requested on this form is being collected by the council for the St Kilda Festival permits. The personal information will be used solely by the council for that primary purpose or directly related purposes.
                    </div>
                    <div class="gap"></div>
                    
                    
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
                        Trader Liaison<br />
                        St Kilda Festival<br />
                        T:03 9209 6266 / 0434 316 784<br/>
                        E:<a href="mailto:skftraders@portphillip.vic.gov.au">skftraders@portphillip.vic.gov.au</a>
                    </div>
                    </form>
                <div class="gap"></div>
            </div> 
             
            
        	<div style="clear:both;"></div>
        </div>
    </div>
</div>

