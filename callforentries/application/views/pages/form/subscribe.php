<script type="text/javascript" src="<?=base_url()?>js/jquery-1.6.2.js"></script>
<div id="paga_content_outside">
    <div id="pagecontent" style="float:none;">
        <div id="left-container">
        	<div id="form_wrapper">
                <div id="form_header" style="float:left"> 
                    St Kilda Festival Newsletter
                </div>
                <div style="clear:both;"></div>
                <script>
					<?php 
						if($this->session->flashdata('success'))
						{?>
							alert('<?=$this->session->flashdata('success')?>');
						<?php }
					?>
					function validateEmail() 
					{ 
						var email = $('#email').val();
						var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    					return filter.test(email);
					}
				</script>
                <div style="clear:both; height:20px;"></div>
                <form action="<?=base_url()?>page/add_subscribe" method="post" onsubmit="return validateEmail();">
                    <div id="form_content">
                    	<div style="font-family:'karla'; line-height:14px;">Sign up here to receive email updates, stage line ups and all the latest news and <br/>information from the St Kilda Festival team.</div>
                        <div class="gap"></div><br/><br/>
                    	<div>
                        	<div class="form_label" style="float:left">Email</div>
                            <div style="float:left"><input class="form_input" type="text" value="" id="email" name="email"></div>
                        </div>
                       <div class="gap"></div><br/><br/>
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

