<script>
function addNews() {
	var title = $j('#heading').val();
	if (title == '') {
		alert('Please enter a heading for this news sticker');
	} else {
		document.addForm.submit();
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
    <div class="bar-title"><div>Add New News</div></div>    
<div class="box bgw">
    	<form name="addForm" method="post" enctype="multipart/form-data" action="<?=base_url()?>admin/news_sticker/adding">
    	<dl class="news"><dt>Heading</dt><dd><input type="text" class="medium" name="heading" id="heading" /></dd></dl>
        <div style="clear:both"></div>
        <dl class="news"><dt>Sub Heading</dt><dd><input type="text" class="medium" name="subheading" id="subheading" /></dd></dl><div style="clear:both"></div>
    	<dl class="news"><dt>Description</dt>
    		<dd><textarea name="description" rows="6" style="width:250px" ></textarea></dd>
    	</dl>
        <div style="clear:both"></div>
        <dl class="news"><dt>Link to</dt><dd><input type="text" class="medium" name="url" id="url" /></dd></dl>
        <div style="clear:both"></div>
    	<dl class="news"><dt>Publish</dt><dd><input type="checkbox" name="published" /></dd></dl></dl>
    	<dl class="news"><dt>Preview Image</dt><dd><input type="file" name="userfile" /> <i><strong>(940px x 376px)</strong></i></dd></dl>
    	<dl></dl>
    	
		</form>
    	<input class="button rounded" type="button" value="Create News Sticker" onclick="javascript:addNews()">
   
</div>
</div>