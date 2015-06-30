<script>
function addlink()
{
    if ($j('#title').val() == "") {
        alert('Please enter a title for the page');
    } else {
        document.addForm.submit();
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
dl.three input.textfield { width:185px; margin:2px 0;  height:30px;}
dl.three dd select { margin:0 0 2px 0; width:193px; }
.box { padding:15px 25px; clear:both; color:#575757; }
.box-add { float:left; width:300px; }
.box-add dl { padding:4px 0; }
.box-add dl dt input.textfield { width:292px; height:30px;}
.box-add dl dd input.textfield { width:180px; height:30px; }
.box-add dl dd select { width:188px; }
.box-edit { float:right; padding:10px; width:250px; background:#fff; border:1px solid #ccc; }
body{
	color:#B9B2AE;
}
#content_text{
	color:#B9B2AE;
}
.CuteEditorFrameContainer
{
	color:#B9B2AE;
}
</style>
<link href="<?=base_url()?>css/template.css" rel="stylesheet" type="text/css">
<div id="left-content">
    <div class="content-title"><img src="<?=base_url()?>images/admin/title-site-control.png" />        
    </div>
    <div class="bar-title"><div>Manage Page</div></div>    
    
    
    <div class="box"><br />
    <div class="box-add">
        
        
        <form name="addForm" method="post" action="<?=base_url()?>admin/cms/createpage">
        <table>
        <tr>
        	<td> Title  </td>
        </tr>
        <tr>
        	<td> <input type="text" style="width:300px; height:25px;color:#B9B2AE;font-weight:bold; font-size:15px;padding:3px;" name="title" id="title" /> </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
        <td>Content</td>
        </tr>
        
        <tr>
			<td>
       <span id="template" style="color:#646464;">
		<?php
           
			$this->Cute_model->init();	
            $this->Cute_model->ID ="content_text";
            $this->Cute_model->UseHTMLEntities = true;
            $this->Cute_model->EditorWysiwygModeCss = base_url()."css/template.css";			
            $this->Cute_model->setWidth("600px");
            $this->Cute_model->setHeight("425px");			
            $this->Cute_model->Draw();
            $this->Cute_model = null;
        ?>
        </span>
		</td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
        <td>
        Gallery </td>
        </tr>
        <tr>
        <td>
        <select id="galleryopt" name="galleryopt">
            <option value="0">Please select</option>
            <?
            foreach($galleries as $gallery){
                ?>
                <option value=<?=$gallery['id']?>><?=$gallery['title']?></option>
                <?
            }
            ?>
        </select>
        </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        <tr>
        <td>
        <input type="button" class="button rounded" value="Add" onclick="addlink()"  />
        </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        </table>
        </form>
    </div>
    
    
    
</div>
</div>
