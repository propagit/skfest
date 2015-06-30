<script src="<?=base_url()?>js/jquery.lightbox-0.5.js" type="text/javascript" /></script>

<link href="<?=base_url()?>css/jquery.lightbox-0.5.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
$(document).ready(function(){
$("#gallery a").lightBox();
});
</script>
<?php
if(isset($page))
{
  if($page['id'] == 58 || $page['id'] == 59 || $page['id'] == 60)
  {
	  if($page['id']==60){?>
      	<style>
			#form_wrapper {
				margin-left:0px;

			}
		</style>
      <? }
	  ?>
      
      <div id="paga_content_outside">
    <div id="pagecontent" style="float:none;">
        <div id="left-container">
        	<div id="page_template_content">
            	<div id="text_content">
                	<?php if(isset($page['content'])) { echo $page['content'];} else { echo 'Page Not Found';}?>
                </div>
            </div>
	        <div style="clear:both;"></div>
        </div>
    </div>
  </div>
<?
  }
  else
  {
	 if(isset($page['content'])) { echo $page['content'];} else { echo 'Page Not Found';}
  }
}
?>



<?php if(count($images) > 0){ ?>        
<div id="gallery" class="gallery"> <!-- #gallery -->
	<?php
    $dir = $path;
	$count = 1;
	#for($i = 0; $i < 11;$i++){
    foreach($images as $photo){
    ?>
    	<a <?=($count % 6 == 0) ? 'class="x-rt-padding"' : ''?> href="<?=$dir . $photo['name'];?>"><img src="<?=$dir . '/thumbnails/' . $photo['name'];?>" ></a>
    <?php
		$count++;
    }
	#}
    ?>
</div>
<?php } ?>
         

         