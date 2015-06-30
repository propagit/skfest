<script type="text/javascript" src="<?=base_url()?>js/popup.js"></script>
<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/popup.css" />

<script>
$j(document).ready(function(){
    $j("#background-popup").click(function(){ disablePopup(); });
    $j(document).keypress(function(e){ if(e.keyCode==27 && popupStatus==1){ disablePopup(); } });
});
function addpage() {
    window.location = '<?=base_url()?>admin/cms/addpage';
}
function deletepage(id) {
    if (confirm('Are you sure you want to delete this page?')) {
        window.location = '<?=base_url()?>admin/cms/deletepage/' + id;
    }
}
</script>

<style>
dl { clear:both; }
dl dt { float:left; }
dl dd { float:right; }
dl.three { line-height:25px; width:350px; }
dl.three dt { width:90px; }
dl.three dd { padding:0 0 0 20px; }
dl.three input.textfield { width:185px; margin:2px 0; }
dl.three dd select { margin:0 0 2px 0; width:193px; }
.box { padding:15px 25px; clear:both; color:#575757; }
.box2 { padding: 15px 25px; clear:both; color:#575757; }    
.box-add { float:left; width:300px; }
.box-add dl { padding:4px 0; }
.box-add dl dt input.textfield { width:292px; }
.box-add dl dd input.textfield { width:180px; }
.box-add dl dd select { width:188px; }
.box-edit { float:right; padding:10px; width:250px; background:#fff; border:1px solid #ccc; }

ul.em { list-style:none; }
ul.em li { display:block; padding:3px 10px; background:#e5e5e5; border:1px solid #999; margin:2px 0; }
ul.em ul { list-style:none; margin:3px 0 0 0; }
ul.em ul li { background:#f5f5f5; }
ul.em li.nochild div, ul.em ul li div { float:right; margin-right:-6px; opacity:0; }
ul.em li.nochild:hover div, ul.em ul li:hover div { opacity:1; }

.row-title { height:36px; line-height:36px; border:1px dotted #63A2D4; background:#fff; font-weight:bold; clear:both; }
.row-item { height:36px; line-height:36px; border:1px dotted #63A2D4; border-top:0; clear:both; }
.row-default { background:#ddd; }
.order-id { float:left; width:70px; text-align:center; }
.order-id2 { float:left; width:50px; text-align:center;  border-right:1px dotted #63A2D4; }
.order-customer { float:left; width:150px; padding:0 10px; border-left:1px dotted #63A2D4; }
.order-date { float:left; width:80px; text-align:center; border-left:1px dotted #63A2D4; }
.order-total { float:left; width:70px; text-align:center; border-left:1px dotted #63A2D4; }
.order-status { float:left; width:80px; text-align:center; border-left:1px dotted #63A2D4; }
.order-func { float:left; border-left:1px dotted #63A2D4; width:49px; text-align:center; }
.order-func img { padding:3px 0; }
.order-func2 { float:left; border-left:1px dotted #63A2D4; width:99px; text-align:center; }
.cust-fname { float:left; padding:0 10px; width:140px; }
.cust-uname { float:left; padding:0 10px; width:150px; border-left:1px dotted #63A2D4; }
.cust-email { float:left; padding:0 24px; border-left:1px dotted #63A2D4; }
.cat-name { float:left; padding:0 10px; }
.cat-name input.textfield { margin:4px 0 0 0; float:left; }
.cat-name input.button { margin:4px 0 0 4px; float:left; }
.quick-func { height:36px; float:right; width:100px; text-align:center; border-left:1px dotted #63A2D4; }
.cat-func { float:right; width:50px; text-align:center; border-left:1px dotted #63A2D4; }
.cat-func2 { float:right; width:80px; text-align:center; border-left:1px dotted #63A2D4; }
.quick-func img { padding:3px 0; }
.cat-func input { }
.cat-func a:focus { outline:none; }
.customer-name { float:left; padding:0 10px; }
.total { float:right; text-align:center; width:60px; border-left:1px dotted #63A2D4; }
.box-1 h3 { }
.box-1 .row-item { height:36px; line-height:36px; }
.box-1 .cat-func img { padding:1px 0; }

</style>

<div id="popup-box">
    <div id="sale-content">
        
    </div>
</div>
<div id="background-popup"></div>

 <div id="left-content">
    <div class="content-title"><img src="<?=base_url()?>images/admin/title-site-control.png" />        
    </div>
    <div class="bar-title"><div>Manage Page</div></div>    

            <div class="box">
                <p>
                    <input type="button" class="button rounded" value="Add new page" onclick="addpage()" />
                    
                </p>
            </div>            
              <!--  
            <div class="box bgw">
                
                <form method="post" action="<?=base_url()?>admin/store/searchproduct">
                <h3>Search Product</h3>
                <dl class="one"><dt>Keyword</dt>
                    <dd><input type="text" class="textfield rounded" name="keyword" /></dd></dl>
                <dl class="one"><dt>Category</dt><dd id="position">
                    <select name="category">
                        <option value="0">All categories</option>
                        <?php foreach($main as $maincat) { ?>
                            <option value="<?=$maincat['id']?>"><?=$maincat['title']?></option>
                        <?php } ?>
                    </select>
                </dd><dd><input type="submit" class="button rounded" value="Search" /></dd></dl>
                <dl></dl>
                </form>
               
            </div>
            
             -->  
            
            <div class="box2">
                <h3 style="float:left;">Pages List</h3>
                <!--
                <?php if($links) { ?>
                <div class="links"><?=$links?> | 10 Pages per page</div>
                <?php } ?>
                -->
                <div class="row-title">
                    <div class="cat-name" >Title Page</div>                    
                    <div class="quick-func">Delete</div>
                    <div class="quick-func">Content</div>
                    
                </div>
                <div id="subcat">
                    <?php foreach($pages as $page) { ?>
                    <div class="row-item">
                        <div class="cat-name" ><a href="<?=base_url()?>page/pages/<?=$page['id']?>" target="_blank" ><?=$page['title']?></a></div>                        
                        <div class="quick-func"><a href="javascript:deletepage(<?=$page['id']?>)" title="Delete this page"><img src="<?=base_url()?>images/admin/icon-delete2.png" /></a></div>
                        <div class="quick-func"><a href="<?=base_url()?>admin/cms/editpage/<?=$page['id']?>" title="Edit this page"><img src="<?=base_url()?>images/admin/editcontent.png" /></a></div>
                     </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        
