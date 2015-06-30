<script type="text/javascript" src="<?=base_url()?>js/jquery.ui.js"></script>
<script>
$j(function() {
	// Drag and drop
	$j("#newslist").sortable({ 
		opacity: 0.8, 
		cursor: 'move', 
		update: function() {			
			var order = $j(this).sortable("serialize") + '&update=update'; 
			$j.post("<?=base_url()?>admin/news_sticker/reorder", order, function(html){	
				
			});
		}
	});
	$j('.status').click(function(){
		var id = $j(this).attr('alt');
		$j.ajax({
			url: '<?=base_url()?>admin/news_sticker/switchstatus',
			type: 'POST',
			data: ({id:id}),
			dataType: "html",
			success: function(html) {
				$j('#status-' + id).attr('src',html);
			}
		})
	});
});
function deletenews(id) {
	if(confirm('Are you sure you want to completely delete this news sticker?')) {
		$j.ajax({
			url: '<?=base_url()?>admin/news_sticker/delete',
			type: 'POST',
			data: ({id:id}),
			dataType: "html",
			success: function(html) {
				$j('#news_' + id).fadeOut();
			}
		})		
	}
}

</script>

<style>
dl { clear:both; }
dl dt { float:left; }
dl dd { float:right; }
.box { padding:15px 25px; clear:both; color:#575757; }


ul.em { list-style:none; }
ul.em li { display:block; padding:3px 10px; background:#e5e5e5; border:1px solid #999; margin:2px 0; }
ul.em ul { list-style:none; margin:3px 0 0 0; }
ul.em ul li { background:#f5f5f5; }
ul.em li.nochild div, ul.em ul li div { float:right; margin-right:-6px; opacity:0; }
ul.em li.nochild:hover div, ul.em ul li:hover div { opacity:1; }



.box-news {
    background: none repeat scroll 0 0 #FFFFFF;
    border: 1px solid #CCCCCC;
    margin: 5px 0;
    padding: 0 10px 0 20px;
}
.box-news .brief {
    float: left;
    width: 420px;
}
.box-news .actions {
    float: right;
}
.box-news .actions img {
    cursor: pointer;
    padding: 20px 5px;
}
</style>
 <div id="left-content">
    <div class="content-title"><img src="<?=base_url()?>images/admin/title-site-control.png" />        
    </div>
    <div class="bar-title"><div>Manage News Sticker</div></div>    


<div class="box">
    	<p><a href="<?=base_url()?>admin/news_sticker/add"><input type="button" class="button rounded" value="Add News"/></a></p>
</div>
    	<hr />
<div class="box bgw">
    	<div id="newslist">
    	<?php foreach($news as $article) { ?>
    	<div class="box-news" id="news_<?=$article['id']?>">
    		<div class="brief">
    			<h4><?=$article['heading']?></h4>
    			<p><?=$article['subheading']?></p>
    		</div>
    		<div class="actions">
    			<?php if($article['published']) { ?>
    				<img src="<?=base_url()?>images/icon-published.png" id="status-<?=$article['id']?>" class="status" alt="<?=$article['id']?>" />
    			<?php } else { ?>
    				<img src="<?=base_url()?>images/icon-unpublished.png" id="status-<?=$article['id']?>" class="status" alt="<?=$article['id']?>" />
    			<?php } ?>
    			<a href="<?=base_url()?>admin/news_sticker/edit/<?=$article['id']?>"><img src="<?=base_url()?>images/icon-edit.png" /></a>
    			<a href="javascript:deletenews(<?=$article['id']?>)"><img src="<?=base_url()?>images/icon-delete.png" /></a>
    		</div><dl></dl>
    	</div>
    	<?php } ?>
    	</div>
    </div>
