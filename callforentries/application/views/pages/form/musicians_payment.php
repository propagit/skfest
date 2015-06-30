<script type="text/javascript" src="<?=base_url()?>js/jquery-1.6.2.js"></script>
<script>
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
					
					function validate_form2()
					{
						var band = $('#Band_name').val();
						var email = $('#Contact_email').val();
						var name = $('#Billing_name').val();
						var addr = $('#Billing_address1').val();
						
						var valid = true;
						if(band == '') 
						{
							valid = false;
							
						}
						if(email == '') 
						{
							valid = false;
						}
						if(name == '') 
						{
							valid = false;
						}
						if(addr == '') 
						{
							valid = false;
						}
						if(!valid)
						{
							alert('Please answer all required questions');
						}
						else
						{
							$.ajax({
							url: '<?=base_url()?>page/add_musicians_payment2/<?=$music_id;?>',
							type: 'POST',
							data: ({band:band,email:email,name:name,addr:addr}),
							dataType: "html",
							success: function(html) {
								$('#UD').submit();
							}
							});
						}
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
                    <p>Thank you for completing the form. Please follow the steps below to make your $33 payment.</p><br/>
                    <?php if($this->session->flashdata('musicians_entry'))
					{
						//echo '<p style="color:#ff0000">'.$this->session->flashdata('musicians_entry').'</p><br/>';
					}
					?>
                    
                    <script type="text/javascript">
						function usePage(frm,nm){
						for (var i_tem = 0, bobs=frm.elements; i_tem < bobs.length; i_tem++)
						if(bobs[i_tem].name==nm&&bobs[i_tem].checked)
						frm.action=bobs[i_tem].value;
						}
					</script>
                <form method="post" onsubmit="usePage(this, 'bob');" NAME="UD" ID="UD">
                	<INPUT TYPE=Hidden NAME=Application_Fee_value    VALUE="33">
                    <INPUT TYPE=Hidden NAME=Application_Fee_qty    VALUE="1">
                    <INPUT TYPE=Hidden   NAME=Application_Fee_subtotal VALUE="33">
                    <INPUT TYPE=Hidden NAME=Application_Fee     VALUE="33" >
                    <INPUT TYPE=Hidden NAME=OrderTotal value=33>
                    <INPUT TYPE=Hidden NAME=information_fields VALUE="Billing_name,Billing_address1,Band_name, Contact_email">
                    <INPUT TYPE=Hidden NAME=suppress_field_names VALUE="">
                    <INPUT TYPE=Hidden NAME=hidden_fields VALUE="Application_Fee_value,Application_Fee_qty,Application_Fee_subtotal,OrderTotal">
                    <INPUT TYPE=Hidden NAME=print_zero_qty VALUE=false>
                    <!--<INPUT TYPE=Hidden NAME=reply_link_url VALUE="http://www.stkildafestival.com.au/callforentries/return.php?id=1112&&payment_number="><p>&nbsp;</p>-->

                   <INPUT TYPE=Hidden NAME=reply_link_url VALUE="http://www.stkildafestival.com.au/callforentries/return.php?id=<?=$music_id;?>&payment_number="><p>&nbsp;</p>
                   <!--
                    <?php
					if(0):
					?>
                    <INPUT TYPE=Hidden NAME=reply_link_url VALUE="<?=base_url()?>page/add_musicians_payment_cc?id=<?=$music_id?>&payment_number="><p>&nbsp;</p>
                    <?php
					endif;
					?>
                   -->

                    <input name="vendor_name" type="hidden" value="portphillip" />
                    <div id="form_content">
                    	<div style="font-weight:bold">Payment Method:
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input name="bob" type="radio" value="<?=base_url()?>page/add_musicians_payment/<?=$music_id?>" /></div>
                            <div style="float:left">Cheque/Money Order</div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left; width:50px;"><input name="bob" type="radio" value="https://vault.safepay.com.au/cgi-bin/make_payment.pl" /></div>
                            <div style="float:left">Credit Card</div>
                        </div>
                        <div class="gap"></div>
                        <div style="font-weight:bold">Payment Information:
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Band Name</div>
                            <div style="float:left"><input class="form_input" type="text" id="Band_name" name="Band_name"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Email Address</div>
                            <div style="float:left"><input class="form_input" type="text" id="Contact_email" name="Contact_email"></div>
                        </div>
                        <div class="gap"></div>
                        <div style="font-weight:bold">Billing Information:
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Name</div>
                            <div style="float:left"><input class="form_input" type="text" id="Billing_name" name="Billing_name"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<div class="form_label" style="float:left">Address</div>
                            <div style="float:left"><input class="form_input" type="text" id="Billing_address1" name="Billing_address1"></div>
                        </div>
                        <div class="gap"></div>
                        <div>
                        	<input class="form_button" type="button" value="Pay Now" onclick="validate_form2();" />
                        </div>
                        <div class="gap"></div>
                        <div style="line-height:15px; font-family:karla">
                        	Your credit card payment will be processed securely by DirectOne Payment Solutions.<br/>
							Please click the DirectOne logo below to find out more about payment security.<br/><br/>
							<a target="_blank" href="http://www.directone.com.au/html/contacts/vendor_link.html">
                           		<img border="0" alt="" src="http://www.directone.com.au/images/safe_link.gif">
                            </a>
                        </div>
                    </div>
                </form>
            </div> 
             
            
        	<div style="clear:both;"></div>
        </div>
    </div>
</div>

