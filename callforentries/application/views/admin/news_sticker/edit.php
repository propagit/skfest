<script>
function updateNews() {
	var title = $j('#title').val();
	if (title == '') {
		alert('Please enter a title for this news article');
	} else {
		document.updateForm.submit();
	}
}
</script>
<style>
dl { clear:both; height:20px!important; }
dl dt { float:left; width:90px;}
dl dd { float:left; }
.box { padding:15px 25px; clear:both; color:#575757; }
</style>
<div id="left-content">
    <div class="content-title"><img src="<?=base_url()?>images/admin/title-site-control.png" />        
    </div>
    <div class="bar-title"><div>Edit News</div></div> 
<div class="box bgw">
    	<form name="updateForm" method="post" enctype="multipart/form-data" action="<?=base_url()?>admin/news_sticker/update">
    	<input type="hidden" name="news_id" value="<?=$news['id']?>" />
    	<dl class="news"><dt>Heading</dt><dd><input type="text" class="medium" name="heading" id="heading" value="<?=$news['heading']?>" /></dd></dl>
         <div style="clear:both"></div>
          <dl class="news"><dt>Sub Heading</dt><dd><input type="text" class="medium" name="subheading" id="subheading" value="<?=$news['subheading']?>" /></dd></dl><div style="clear:both"></div>
    	<dl class="news"><dt>Description</dt>
    		<dd><textarea name="description" rows="6"><?=$news['description']?></textarea></dd>
    	</dl><div style="clear:both"></div>
        <dl class="news"><dt>Link to</dt><dd><input type="text" class="medium" name="url" id="url" value="<?=$news['url']?>" /></dd></dl>
        <div style="clear:both"></div>
    	<dl class="news"><dt>Publish</dt><dd><input type="checkbox" name="published"<?php if($news['published']) print ' checked="checked"'; ?> /></dd></dl></dl>
    	<dl class="news"><dt>Preview Image</dt><dd><input type="file" name="userfile" /><i><strong>(940px x 376px)</strong></i></dd></dl>
        <div style="clear:both"></div>
    	<dl class="news"><dt>&nbsp;</dt><dd><img src="<?=base_url()?>photos/news_sticker/thumbnails/<?=$news['image']?>" />
    	</dd></dl>
    	<dl></dl>
    	
		</form>
    	<p>
    		<input class="button rounded" type="button" value="Update News" onclick="javascript:updateNews()"> &nbsp; 
    		<a href="<?=base_url()?>admin/news_sticker"><input class="button rounded" type="button" value="Back to News"></a>
    	</p>
</div>
