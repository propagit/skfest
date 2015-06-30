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