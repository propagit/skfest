<style>
	.poplarStd
	{
		color:#00e9c9!important;
		size:18px!important;
	}
</style>
<script type="text/javascript" src="<?=base_url()?>js/jquery-1.6.2.js"></script>
<div id="pagecontent" style="float:none;">
   <div id="left-container">
     
     <div style="float:left;margin-top:15px;">
     <?php require_once($_SERVER['DOCUMENT_ROOT'].'/callfor_entries/flashcomponent_jquery/index.php');?>
     <div class="banner" style="height:376px!important; z-index:1;">
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
								<span style="color:#c1c1c1;"><?= $alls['subheading']?></span>
                            </p>
                        </div>

                        <a href="<?=base_url()?>/photos/news_sticker/<?= $alls['image']?>"></a>
 	                                            <a href="<?= $alls['url']?>"></a>
                        <div class="content" style="top:260px; left:0px; width:340px; height:85px;">
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
    
     <div style="clear:both;"></div>
</div>