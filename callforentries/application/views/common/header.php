<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href='http://fonts.googleapis.com/css?family=Karla' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Special+Elite' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?=base_url()?>css/reset.css" />
<link rel="stylesheet" href="<?=base_url()?>css/layout.css" />
<link rel="stylesheet" href="<?=base_url()?>assets/font-awesome/4.3.0/css/font-awesome.min.css">
<!--[if IE 7]>
<link rel='stylesheet' type='text/css' href='<?=base_url()?>css/layout_ie7.css' />
<![endif]-->
<!--[if IE 8]>
<link rel='stylesheet' type='text/css' href='<?=base_url()?>css/layout_ie8.css' />
<![endif]-->
<!--[if IE 9]>
<link rel='stylesheet' type='text/css' href='<?=base_url()?>css/layout_ie9.css' />
<link href='http://fonts.googleapis.com/css?family=Karla' rel='stylesheet' type='text/css'>
<![endif]-->
<script src="<?=base_url()?>js/jquery-1.7.2.min.js"></script>
<script src="<?=base_url()?>js/AC_RunActiveContent.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
function MM_findObj(n, d) { //v4.01
	var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
		d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
	if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
	for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
	if(!x && d.getElementById) x=d.getElementById(n); return x;
}
function MM_preloadImages() { //v3.0
	var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
	var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
	if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
function MM_swapImgRestore() { //v3.0
	var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_swapImage() { //v3.0
	var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
	if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
<meta name="description" content="St Kilda Festival" />
<meta name="keywords" content="St Kilda Festival" />
<title>St Kilda Festival <?php if(isset($page['title'])) { echo ' - '. $page['title'];}?></title>
<script type="text/javascript">
 
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33769230-1']);
  _gaq.push(['_trackPageview']);
 
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
 
</script>
<script src="<?=base_url()?>js/countdown.js"></script>
<?php
		
		$now = time(); // or your date as well
		$your_date = strtotime('31-01-2016 10:00:00');
		$datediff = ($now - $your_date)*-1;
		//$bet = floor($datediff/(60*60*24)) + 1;

    ?>
<script>
$(function(){
	
        //  Initialize auto-hint fields
        $('INPUT.auto-hint, TEXTAREA.auto-hint').focus(function(){
            if($(this).val() == $(this).attr('title')){ 
                $(this).val('');
                $(this).removeClass('auto-hint');
            }
        });
        
        $('INPUT.auto-hint, TEXTAREA.auto-hint').blur(function(){
            if($(this).val() == '' && $(this).attr('title') != ''){ 
                $(this).val($(this).attr('title'));
                $(this).addClass('auto-hint'); 
            }
        });
        
        $('INPUT.auto-hint, TEXTAREA.auto-hint').each(function(){
            if($(this).attr('title') == ''){ return; }
            if($(this).val() == ''){ $(this).val($(this).attr('title')); }
            else { $(this).removeClass('auto-hint'); } 
        });
		var note = $('#timer_st1'),
			//ts = new Date("February 02, 2013 10:00:00"),
			newYear = true;
		
		//if((new Date()) > ts){
			// The new year is here! Count towards something else.
			// Notice the *1000 at the end - time must be in milliseconds
			ts = (new Date()).getTime() + <?=$datediff;?>*1000;
			newYear = false;
		//}
			
		$('#count_st').countdown({
			timestamp	: ts,
			callback	: function(days, hours, minutes, seconds){
				
				var message = "";
				//alert(hours.length);
				var d = days.toString();
				var h = hours.toString();
				var m = minutes.toString();
				var s = seconds.toString();
				if(d.length == 1) {d = "0" + d;}
				if(h.length == 1) {h = "0" + h;}
				if(m.length == 1) {m = "0" + m;}
				if(s.length == 1) {s = '0' + s;}
				
				message += d + " <span style='color: #fff;'>D&nbsp;</span> " + h + " <span style='color: #fff;'>H&nbsp;</span> " + m + " <span style='color: #fff;'>M&nbsp;</span> " + s + " <span style='color: #fff;'>S</span>";
				
				/*message += days + " day" + ( days==1 ? '':'s' ) + ", ";
				message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
				message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
				message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";
				
				if(newYear){
					message += "left until the new year!";
				}
				else {
					message += "left to 10 days from now!";
				}*/
				
				note.html(message);
			}
		});
		
	});
</script>
</head>
<body>
<div id="page_wrapper_outside">
	<div id="page_wrapper">
		<div id="inside_page_wrapper">
  			<div id="header_container"><!--<img src="<?=base_url()?>images/header_placeholder.jpg" alt="" />-->
                <div style="height:69px"></div>
                <div id="countdown_timer" style="margin-left:20px; margin-top:20px; float:left; width:240px;">
                	
                    <!--<img alt="ct" src="<?=base_url()?>images/countdown-clock.png"/>-->
                    <div id="timer_st1" class="festival-countdown">
                    	000 <span>D&nbsp;</span> 00 <span>H&nbsp;</span> 00 <span>M&nbsp;</span> 00 <span>S</span>
                    </div>
                    <div style="height: 8px">&nbsp;</div>
                    <div style="height: 36px; color: #000000; font-size: 12px; font-weight: 600; line-height: 36px; text-align: center;" class="body-bg">UNTIL THE ST KILDA FESTIVAL STARTS</div>
					
                    
                        <!-- <script type="text/javascript">
	if (AC_FL_RunContent == 0) {
		alert("This page requires AC_RunActiveContent.js.");
	} else {
		AC_FL_RunContent(
			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
			'width', '240px',
			'height', '84px',
			'src', '<?=base_url()?>countDownTimer',
			'quality', 'high',
			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
			'align', 'l',
			'play', 'true',
			'loop', 'true',
			'scale', 'showall',
			'wmode', 'transparent',
			'devicefont', 'false',
			'id', 'countDown_Timer',
			'bgcolor', '#fff',
			'name', 'countDown_Timer',
			'menu', 'true',
			'allowFullScreen', 'false',
			'allowScriptAccess','sameDomain',
			'movie', '<?=base_url()?>countDownTimer',
			'salign', ''
			); //end AC code
	}
</script>  -->
       <!-- <noscript>
	<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="240px" height="84px" align="middle">
	<param name="allowScriptAccess" value="sameDomain" />
	<param name="allowFullScreen" value="false" />
   <param name="wmode" value="transparent" />
    <PARAM NAME="bgcolor" VALUE="#FFFFFF">
	<param name="movie" value="<?=base_url()?>img/countDownTimer.swf" /><param name="quality" value="high" /><embed src="<?=base_url()?>img/countDownTimer.swf"  bgcolor="#FFFFFF" width="240px" height="84px" quality="high" name="countDown_Timer" allowScriptAccess="sameDomain" allowFullScreen="false" align="left" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" wmode="transparent" /></embed>
	</object>
</noscript> -->
                    
                    
                    
                </div>
                <div id="home_link" onclick="window.location = '<?=base_url()?>'">
                </div>
                <div id="subscribe" style="float:right; margin-right:20px; margin-top:20px">
                    <div id="header_subscribe">
                        <a class="app-btn block" href="<?=base_url()?>page/subscribe">SUBSCRIBE</a>
                    </div>
                    <div style="margin-top:10px">
                    	<?php if(0){ ?>
                        <!--<div style="float:left; margin-right:32px"><a target="_blank" href="http://www.facebook.com/StKildaFestival"><img alt="fb" src="<?=base_url()?>images/fb-icon.png"/></a></div>
                        <div style="float:left; margin-right:32px"><a target="_blank" href="https://twitter.com/stkildafestival"><img alt="tw" src="<?=base_url()?>images/tw-icon.png"/></a></div>
                        <div style="float:left; margin-right:32px"><a target="_blank" href="https://instagram.com/stkildafestival"><img alt="yt" src="<?=base_url()?>images/instagram-icon.jpg"/></a></div>
                        <div style="float:left"><a href="mailto:stkildafestival@portphillip.vic.gov.au"><img alt="em" src="<?=base_url()?>images/em-icon.png"/></a></div>--> <?php } ?>
                        <div style="float:left; margin-right:32px"><a class="social-icon" target="_blank" href="http://www.facebook.com/StKildaFestival"><i class="fa fa-facebook"></i></a></div>
                        <div style="float:left; margin-right:32px"><a class="social-icon" target="_blank" href="https://twitter.com/stkildafestival"><i class="fa fa-twitter"></i></a></div>
                        <div style="float:left; margin-right:32px"><a class="social-icon" target="_blank" href="https://instagram.com/stkildafestival"><i class="fa fa-instagram"></i></a></div>
                        <div style="float:left"><a class="social-icon" href="mailto:stkildafestival@portphillip.vic.gov.au"><i class="fa fa-envelope"></i></a></div>

                    </div>
                </div>
              </div>
  			<div id="nav_container">
                <ul id="navmenu-h">
                 <?php 
                 $i = 1;
                 $count = count($links);
                 foreach($links as $link)
                 {
                   $url = '';
                   if(is_numeric($link['url']))
                   {
                       $url = base_url().'page/pages/'.$link['url'];
                   }
                   else
                   {
                       $url = $link['url'];
                   }
                   echo '<li id="menu'.$i.'"><a href="'.$url.'">'.$link['name'].'</a>';
				   $i++;
                   $child_links = $this->Menu_model->get_child_links($link['id']);
                   if($child_links != NULL)
                   {
                      
                       echo '<ul class="child_menu">';
                    foreach($child_links as $c)
                    {
                         $url2 = '';
                      if(is_numeric($c['url']))
                      {
                       $url2 = base_url().'page/pages/'.$c['url'];
                      }
                      else
                      {
                       $url2 = $c['url'];
                      }
                       	echo '<li class="child_menu"_item><a class="child_menu_item_a" href="'.$url2.'">'.$c['name'].'</a></li>';
                    }
                      echo '</ul>';
                   }
                   echo '</li>';   
                 }
                 ?>
                </ul>
              </div>
  		</div>
  		<div id="header_background"></div>
    </div>

