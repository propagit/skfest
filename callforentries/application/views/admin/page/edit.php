<script>
function updatepage()
{
 
        document.updateForm.submit();
   
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
.box-add { float:left; width:300px; }
.box-add dl { padding:4px 0; }
.box-add dl dt input.textfield { width:292px; }
.box-add dl dd input.textfield { width:180px; }
.box-add dl dd select { width:188px; }
.box-edit { float:right; padding:10px; width:250px; background:#fff; border:1px solid #ccc; }


</style>
<link href="<?=base_url()?>css/template.css" rel="stylesheet" type="text/css">
<div id="left-content">
    <div class="content-title"><img src="<?=base_url()?>images/admin/title-site-control.png" />        
    </div>
    <div class="bar-title"><div>Manage Home Page</div></div>    
    
    
    <div class="box"><br />
    <div class="box-add">
        
        
        <form name="updateForm" method="post" action="<?=base_url()?>admin/cms/updatepage">
        <input type="hidden" id="id" name="id" value="<?=$pages['id']?>">
        <table>
        
        
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
            $this->Cute_model->Text = $pages['content'];			
            $this->Cute_model->Draw();
            $this->Cute_model = null;
        ?>
        </span>
		</td>
        </tr>
        <tr><td>&nbsp;</td></tr>
      
        
       
        <tr>
        <td>
        <input type="button" class="button rounded" value="Update" onclick="updatepage()"  />
        </td>
        </tr>
        <tr><td>&nbsp;</td></tr>
        </table>                                       
        </form>
    </div>
    
    
    
</div>
</div>
