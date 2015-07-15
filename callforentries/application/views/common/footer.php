<script type="text/javascript" src="<?=base_url()?>js/jquery.cycle.js"></script>
<script>
$(document).ready(function() {
    $('#advertisment').cycle({
		fx: 'fade', // choose your transition type, ex: fade, scrollUp, shuffle, etc...
		timeout: 8000
	});
});
</script>
<div id="wrapper_footer">
  <div id="footer">
 
    <div id="port_philip_sponsor">
    	<div>
        	PROUDLY PRODUCED <br/>AND PRESENTED BY
        </div>
        <a href="http://www.portphillip.vic.gov.au" target="_blank"><img style="margin-top:24px; margin-left:10px;" src="<?=base_url()?>images/port_phillip_logo.png" alt="pp_logo"/></a>
    </div>
    <div class="contact-info">
         <ul>
         	<li>
            	<strong>ST KILDA FESTIVAL</strong><br>
                Private Bag 3<br>
                PO St Kilda<br>
                VIC 3182<br>
                T: (03) 9209 6490<br>
                E: <a href="mailto:stkildafestival@portphillip.vic.gov.au">stkildafestival@portphillip.vic.gov.au</a><br><br>
                
                City of Port Phillip ASSIST<br>
                T: (03) 9209 6777<br>
            </li>
            
            <li>
                <strong>MEDIA ENQUIRIES</strong><br>
                Wrights PR<br>
                T: (03) 9690 9911<br>
                E: <a href="mailto:sfarnum@wrights.com.au">sfarnum@wrights.com.au</a><br>
                W: <a target="_blank" href="http://wrights.com.au">wrights.com.au</a><br>
            </li>
            <li>
                <strong>SPONSORSHIP ENQUIRIES</strong><br>
                Meagan Scott<br>
                E: <a href="mailto:mscott@portphillip.vic.gov.au">mscott@portphillip.vic.gov.au</a><br>
                T: 0403 844 266 <br><br>
                <?php if(0){ ?>
                Brad Elliott<br>
                E: <a href="mailto:belliott@portphillip.vic.gov.au">belliott@portphillip.vic.gov.au</a><br>
                T: 0478 487 719	<br><?php } ?>
            </li>
        </ul>
    </div>
    <?php if(0){ 
		# reason for keeping this as a comment is they might want it back again later on
	?>
    <!--<div id="advertisment">
        <div><a href="http://www.stkildafilmfestival.com.au/callforentries/" target="_blank"><img src="<?=base_url()?>images/FooterAd-240x140-FILMFESTIVAL.jpg" /></a></div>
        <div><a href="http://www.portphillip.vic.gov.au/no_cuts_no_butts.htm" target="_blank"><img src="<?=base_url()?>images/FooterAd-240x140-NOCUTSNOBUTTS.jpg" /></a></div>
    </div>-->
    <?php } ?>
 </div>
</div> 	
</div> 
<!-- end of page_wrapper-->

</body>
</html>