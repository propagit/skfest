<!--<script type="text/javascript" src="<?=base_url()?>js/jquery-1.6.2.js"></script>-->
<div id="paga_content_outside">
    <!--
    <div id="page_content">
      <img src="<?=base_url()?>images/news_sticker_placeholder.jpg" alt="" />
    </div>
    -->
    <div id="pagecontent" style="float:none;">
   		<div id="left-container">
     
     <div style="float:left;margin-top:15px;">
     <?php #require_once($_SERVER['DOCUMENT_ROOT'].'/callforentries/flashcomponent_jquery/index.php');?>
     <?php require_once($_SERVER['DOCUMENT_ROOT'].'/skfest/callforentries/flashcomponent_jquery/index.php');?>
     <div class="banner" style="height:376px!important; z-index:1; margin-left:20px">
            <div class="screen" style="height:376px;">
                <noscript>
                    <!--Placeholder Image When Javascript is Off-->
                    <img src="<?=base_url()?>/photos/news_sticker/<?= $all[0]['image']?>" alt=""/>
                </noscript>
            </div>
            <div class="items" >
                <ul>
                <?php foreach($all as $alls)
                {
                    ?>
                    <li>
                      <div class="button">
                            <p>
                            	<span style="font-size:13px"><?= $alls['heading']?></span>
                                <br />                                
								<span class="button_subheading"><?= $alls['subheading']?></span>
                            </p>
                        </div>

                        <a href="<?=base_url()?>/photos/news_sticker/<?= $alls['image']?>"></a>
 	                                            <a href="<?= $alls['url']?>"></a>
                        <div class="content" style="top:291px; left:0px; width:700px; height:85px;">
                            <h1 class="poplarStd" style="text-transform:normal;"><?= $alls['heading']?></h1>
                            <h2 class="subheading" style="text-transform:normal;"><?= $alls['subheading']?></h2>
                           <!-- <div style="margin-top:10px;text-transform:none!important;" class="DidactGothic"><?= $alls['description']?></div>-->
                        </div>                   
                       
                    </li>
                 <?
                 }
                 ?>
                </ul>
             </div>
     </div>
     </div>
     
     <?
     #$home = $this->Menu_model->getpage(50); 
	 #echo $home['content'];
	 ?>

     <!-- <div id="calling_button">
        	<div id="event_button">
            	<div style="">
            		<a style="color: #fff; display: block" href="<?=base_url()?>page/pages/44">EVENTS</a>
                </div>
            </div>
            <div id="musicians_button">
            	<a style="color: #fff; display: block" href="<?=base_url()?>page/pages/36">MUSICIANS</a>
            </div>
            <div id="kids_button">
            	<div style="">
            		<a style="color: #fff; display: block" href="<?=base_url()?>page/pages/33">TRADERS</a>
                </div>
            </div>
     </div> -->

   
     <div style="clear:both;"></div>
</div>
	</div>
</div>

