<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?=$title?></title>
<link rel="stylesheet" href="<?=base_url()?>css/general.css" />
<script type="text/javascript" src="<?=base_url()?>js/jquery.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/menu.js"></script>
</head>
<body>
<?php $sid = $this->session->userdata('sid'); ?>
<!--<img src="<?=base_url()?>images/logo.jpg" />-->
<?php if (! $sid) { ?>
<h2>Form Creator Tool</h2>
<form name="startForm" method="post" action="<?=base_url()?>admin/formc/do_start">
<table border="0" cellspacing="0" cellpadding="0">
<tr><td>
<input type="text" name="title" value="Form title" id="title" style="color:#cccccc" onClick="enter_field('title','Form title');" onBlur="reset_field('title','Form title');" />
<br/>
<input type="text" name="formto" value="Form email" id="formto" style="color:#cccccc" onClick="enter_field('formto','Form email');" onBlur="reset_field('formto','Form email');" />
</td><td valign="bottom"> &nbsp;<a href="#" onclick="document.startForm.submit()">
Start Form</a></td>
</tr></table>
</form>
<?php } else { ?>
<link rel="stylesheet" href="<?=base_url()?>css/popup.css" />
<script type="text/javascript" src="<?=base_url()?>js/popup.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		theme_advanced_buttons1 : "mybutton,bold,italic,underline,separator,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,undo,redo,link,unlink",
		theme_advanced_buttons2 : "",
		theme_advanced_buttons3 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		editor_selector : "mceEditor",
		editor_deselector : "mceNoEditor"
	});
</script>
<script>
/** Cancel the current survey */
function cancel()
{
	if (confirm('Are you sure to cancel this form?'))
	{
		window.location = '<?=base_url()?>admin/formc/cancel';
	} else {
		return false;
	}
}

function goPreview()
{
	window.location = '<?=base_url()?>admin/formc/preview';
}

/** Edit survey title */
function editSurvey()
{
	$("#editQuestion").fadeOut("fast",function(){
		$("#editOption").fadeOut("fast",function(){
			$("#editMOptions").fadeOut("fast",function(){
				$("#addOptions").fadeOut("fast",function(){
					$("#addQuestion").fadeOut("fast",function(){
						$("#editQuestionTitle").fadeOut("fast",function(){
							$("#editSurvey").fadeIn("fast");
						});
					});
				});
			});
		});
	});
	//centering with css
	centerPopup();
	//load popup
	loadPopup();
}

function addQuestion(n)
{
	document.getElementById("groupQ").value = n;
	$("#editQuestion").fadeOut("fast",function(){
		$("#editOption").fadeOut("fast",function(){
			$("#editMOptions").fadeOut("fast",function(){
				$("#addOptions").fadeOut("fast",function(){
					$("#editSurvey").fadeOut("fast",function(){
						$("#editQuestionTitle").fadeOut("fast",function(){
							$("#addQuestion").fadeIn("fast");
						});
					});
				});
			});
		});
	});
	//centering with css
	centerPopup();
	//load popup
	loadPopup();
}

function addOptions(n)
{
	document.getElementById("groupO").value = n;
	$("#editQuestion").fadeOut("fast",function(){
		$("#editOption").fadeOut("fast",function(){
			$("#editMOptions").fadeOut("fast",function(){
				$("#addQuestion").fadeOut("fast",function(){
					$("#editSurvey").fadeOut("fast",function(){
						$("#editQuestionTitle").fadeOut("fast",function(){
							$("#addOptions").fadeIn("fast");
						});
					});
				});
			});
		});
	});
	//centering with css
	centerPopup();
	//load popup
	loadPopup();
}

var xmlhttp;

function GetXmlHttpObject()
{
	if (window.XMLHttpRequest)
  	{
  		// code for IE7+, Firefox, Chrome, Opera, Safari
  		return new XMLHttpRequest();
  	}
	if (window.ActiveXObject)
  	{
  		// code for IE6, IE5
  		return new ActiveXObject("Microsoft.XMLHTTP");
  	}
	return null;
}

/** AJAX remove question */
function remove(n)
{
	if (confirm('Are you sure to remove this question?'))
	{
		xmlhttp = GetXmlHttpObject();
		if (xmlhttp == null)
		{
			alert ("Your browser does not support AJAX!");
			return;
		}
		
		var url = "<?=base_url()?>admin/formc/remove/";
		url = url + n;
		url = url + "/" + Math.random();
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 4)
			{
				$("#question-" + n).fadeOut("fast");					
			}
		};
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
		
	} else {
		window.location = '<?=base_url()?>admin/formc';
	}
}

/** AJAX remove option */
function removeOption(n)
{
	if (confirm('Are you sure to remove this option?'))
	{
		xmlhttp = GetXmlHttpObject();
		if (xmlhttp == null)
		{
			alert ("Your browser does not support AJAX!");
			return;
		}
		
		var url = "<?=base_url()?>admin/formc/remove_option/";
		url = url + n;
		url = url + "/" + Math.random();
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 4)
			{
				$("#option-" + n).fadeOut("fast");					
			}
		};
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
	} else {
		window.location = '<?=base_url()?>admin/formc';
	}
}

function removeGroup(n)
{
	if (confirm('Are you sure to remove this option?'))
	{
		xmlhttp = GetXmlHttpObject();
		if (xmlhttp == null)
		{
			alert ("Your browser does not support AJAX!");
			return;
		}
		
		var url = "<?=base_url()?>admin/formc/remove_group/";
		url = url + n;
		url = url + "/" + Math.random();
		xmlhttp.onreadystatechange = function(){
			if (xmlhttp.readyState == 4)
			{
				$("#group-" + n).fadeOut("fast");					
			}
		};
		xmlhttp.open("GET",url,true);
		xmlhttp.send(null);
	} else {
		window.location = '<?=base_url()?>admin/formc';
	}
}

function removeMOptions(n)
{
	if (confirm('Are you sure to remove this option?'))
	{
		window.location = '<?=base_url()?>admin/formc/remove_moption/' + n;
	} else {
		window.location = '<?=base_url()?>admin/formc';
	}
}

function removeQuestion(n)
{
	if (confirm('Are you sure to remove this question?'))
	{
		window.location = '<?=base_url()?>admin/formc/remove_question/' + n;
	} else {
		window.location = '<?=base_url()?>admin/formc';
	}
}

/** AJAX edit question */
function editQuestion(id)
{
	xmlhttp = GetXmlHttpObject();
	if (xmlhttp == null)
  	{
 		alert ("Your browser does not support AJAX!");
  		return;
  	}
	
	var url = "<?=base_url()?>admin/formc/get_question/";
	url = url + id;
	url = url + "/" + Math.random();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4)
		{
			document.getElementById("updateQuestion").value = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
	document.getElementById("updateQid").value = id;
	$("#editSurvey").fadeOut("fast",function(){
		$("#editOption").fadeOut("fast",function(){
			$("#editMOptions").fadeOut("fast",function(){
				$("#addOptions").fadeOut("fast",function(){
					$("#addQuestion").fadeOut("fast",function(){
						$("#editQuestionTitle").fadeOut("fast",function(){
							$("#editQuestion").fadeIn("fast");
						});
					});
				});
			});
		});
	});
	//centering with css
	centerPopup();
	//load popup
	loadPopup();
}

/** AJAX add option */
function addOption(qid,qt)
{
	xmlhttp = GetXmlHttpObject();
	if (xmlhttp == null)
  	{
 		alert ("Your browser does not support AJAX!");
  		return;
  	}
	
	var url = "<?=base_url()?>admin/formc/add_option/";
	url = url + qid + "/" + qt;
	url = url + "/" + Math.random();
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4)
		{
			document.getElementById("anotherOption-" + qid).innerHTML += xmlhttp.responseText;				
		}
	};
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
	$("#anotherOption-" + qid).fadeIn("normal");	
}

/** AJAX edit question title */
function editQuestionTitle(id)
{
	xmlhttp = GetXmlHttpObject();
	if (xmlhttp == null)
  	{
 		alert ("Your browser does not support AJAX!");
  		return;
  	}
	
	var url = "<?=base_url()?>admin/formc/get_question_title/";
	url = url + id;
	url = url + "/" + Math.random();
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4)
		{
			document.getElementById("uquestion_title").value = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
	document.getElementById("updategroupQ").value = id;
	$("#editSurvey").fadeOut("fast",function(){
		$("#editQuestion").fadeOut("fast",function(){
			$("#editMOptions").fadeOut("fast",function(){
				$("#addOptions").fadeOut("fast",function(){
					$("#addQuestion").fadeOut("fast",function(){
					    $("#editOption").fadeOut("fast",function(){
							$("#editQuestionTitle").fadeIn("fast");
						});
					});
				});
			});
		});
	});
	//centering with css
	centerPopup();
	//load popup
	loadPopup();
}

/** AJAX edit option */
function editOption(id)
{
	xmlhttp = GetXmlHttpObject();
	if (xmlhttp == null)
  	{
 		alert ("Your browser does not support AJAX!");
  		return;
  	}
	
	var url = "<?=base_url()?>admin/formc/get_option/";
	url = url + id;
	url = url + "/" + Math.random();
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4)
		{
			document.getElementById("updateOption").value = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
	document.getElementById("updateOid").value = id;
	$("#editSurvey").fadeOut("fast",function(){
		$("#editQuestion").fadeOut("fast",function(){
			$("#editMOptions").fadeOut("fast",function(){
				$("#addOptions").fadeOut("fast",function(){
					$("#addQuestion").fadeOut("fast",function(){
					    $("#editQuestionTitle").fadeOut("fast",function(){
							$("#editOption").fadeIn("fast");
						});
					});
				});
			});
		});
	});
	//centering with css
	centerPopup();
	//load popup
	loadPopup();
}

function editMOptions(id)
{
	xmlhttp = GetXmlHttpObject();
	if (xmlhttp == null)
  	{
 		alert ("Your browser does not support AJAX!");
  		return;
  	}
	
	var url = "<?=base_url()?>admin/formc/get_option/";
	url = url + id;
	url = url + "/" + Math.random();
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4)
		{
			document.getElementById("updateMOption").value = xmlhttp.responseText;
		}
	};
	xmlhttp.open("GET",url,true);
	xmlhttp.send(null);
	document.getElementById("updateMOid").value = id;
	$("#editSurvey").fadeOut("fast",function(){
		$("#editQuestion").fadeOut("fast",function(){
			$("#editOption").fadeOut("fast",function(){
				$("#addOptions").fadeOut("fast",function(){
					$("#addQuestion").fadeOut("fast",function(){
						$("#editQuestionTitle").fadeOut("fast",function(){
							$("#editMOptions").fadeIn("fast");
						});
					});
				});
			});
		});
	});
	//centering with css
	centerPopup();
	//load popup
	loadPopup();
}
</script>
<div id="popupBox">
    <div id="editSurvey" style="display:none">
    <h1>Edit Form</h1>
    <form name="esForm" method="post" action="<?=base_url()?>admin/formc/edit_survey_title">
    <p><input type="text" name="title" value="<?php print $survey['title']; ?>" />
    <br/>
    <input type="text" name="formto" value="<?php print $survey['emailTo']; ?>" />
    </p>
    <p>
    	<input type="submit" style="display:none" />
        <a href="#" onclick="document.esForm.submit()"><img src="<?=base_url()?>images/button-update.png" border="0" /></a>
        <a href="#" onclick="disablePopup();"><img src="<?=base_url()?>images/button-cancel.png" border="0" /></a>
    </p>
    </form>
    </div>
    
    <div id="editQuestion" style="display:none">
    <h1>Edit Question</h1>
    <form name="eqForm" method="post" action="<?=base_url()?>admin/formc/edit_question">
    <p><input type="text" name="question" id="updateQuestion" /></p>
    <p>
    	<input type="hidden" name="id" id="updateQid" />
    	<input type="submit" style="display:none" />
        <a href="#" onclick="document.eqForm.submit()"><img src="<?=base_url()?>images/button-update.png" border="0" /></a>
        <a href="#" onclick="disablePopup();"><img src="<?=base_url()?>images/button-cancel.png" border="0" /></a>
    </p>
    </form>
    </div>
    
    <div id="editOption" style="display:none">
    <h1>Edit Option</h1>
    <form name="eoForm" method="post" action="<?=base_url()?>admin/formc/edit_option">
    <p><input type="text" name="option" id="updateOption" /></p>
    <p>
    	<input type="hidden" name="id" id="updateOid" />
    	<input type="submit" style="display:none" />
        <a href="#" onclick="document.eoForm.submit()"><img src="<?=base_url()?>images/button-update.png" border="0" /></a>
        <a href="#" onclick="disablePopup();"><img src="<?=base_url()?>images/button-cancel.png" border="0" /></a>
    </p>
    </form>
    </div>
    
    <div id="editMOptions" style="display:none">
    <h1>Edit Option</h1>
    <form name="emoForm" method="post" action="<?=base_url()?>admin/formc/edit_moption">
    <p><input type="text" name="option" id="updateMOption" /></p>
    <p>
    	<input type="hidden" name="id" id="updateMOid" />
    	<input type="submit" style="display:none" />
        <a href="#" onclick="document.emoForm.submit()"><img src="<?=base_url()?>images/button-update.png" border="0" /></a>
        <a href="#" onclick="disablePopup();"><img src="<?=base_url()?>images/button-cancel.png" border="0" /></a>
    </p>
    </form>
    </div>
    
    <div id="editQuestionTitle" style="display:none">
    <h1>Edit Question Title</h1>
    <form name="emqtForm" method="post" action="<?=base_url()?>admin/formc/edit_mquestion_title">
    <p><input type="text" name="uquestion_title" id="uquestion_title"/></p>
    <p>
    	<input type="hidden" name="group" id="updategroupQ" />
    	<input type="submit" style="display:none" />
        <a href="#" onclick="document.emqtForm.submit()"><img src="<?=base_url()?>images/button-update.png" border="0" /></a>
        <a href="#" onclick="disablePopup();"><img src="<?=base_url()?>images/button-cancel.png" border="0" /></a>
    </p>
    </form>
    </div>
    
    
    <div id="addQuestion" style="display:none">
    <h1>Add Question</h1>
    <form name="aqForm" method="post" action="<?=base_url()?>admin/formc/add_question">
    <p><input type="text" name="question" /></p>
    <p>
    	<input type="hidden" name="group" id="groupQ" />
    	<input type="submit" style="display:none" />
        <a href="#" onclick="document.aqForm.submit()"><img src="<?=base_url()?>images/button-add-question.png" border="0" /></a>
        <a href="#" onclick="disablePopup();"><img src="<?=base_url()?>images/button-cancel.png" border="0" /></a>
    </p>
    </form>
    </div>
    
    <div id="addOptions" style="display:none">
    <h1>Add Options</h1>
    <form name="aoForm" method="post" action="<?=base_url()?>admin/formc/add_options">
    <p><input type="text" name="option" /></p>
    <p>
    	<input type="hidden" name="group" id="groupO" />
    	<input type="submit" style="display:none" />
        <a href="#" onclick="document.aoForm.submit()"><img src="<?=base_url()?>images/button-add-option.png" border="0" /></a>
        <a href="#" onclick="disablePopup();"><img src="<?=base_url()?>images/button-cancel.png" border="0" /></a>
    </p>
    </form>
    </div>
</div>
<div id="backgroundPopup"></div>
<h2>Form: <?php print $survey['title']; ?> <a href="javascript:editSurvey()">Edit</a> <a href="#" onclick="javascript:cancel()">Cancel</a></h2>

<div class="menu">
    <ul>
    <li><a class="top">Add &raquo;</a></li>
    <li><a href="#" onclick="javascript:menu_slide('short_answer')">Short Answer</a></li>
    <li><a href="#" onclick="javascript:menu_slide('long_answer')">Long Answer</a></li>
    <li><a href="#" onclick="javascript:menu_slide('checkbox_menu')">Checkbox Menu</a></li>
    <li><a href="#" onclick="javascript:menu_slide('radio_button_menu')">Radio Button Menu</a></li>
    <li><a href="#" onclick="javascript:menu_slide('drop_down_menu')">Drop Down Menu</a></li>
    <li><a href="#" onclick="javascript:menu_slide('multiple_menu')">Multiple Question</a></li>
    <li><a href="#" onclick="javascript:menu_slide('finish_note')">Finish Note</a></li>
    </ul>
</div>

<div id="short_answer" class="question">
<form name="saForm" method="post" action="<?=base_url()?>admin/formc/create_short_question">
<table border="0" cellpadding="0" cellspacing="0" >
<tr>
	<td></td>
    <td><p>Short answer: for brief text response</p></td>
</tr>
<tr>
	<td width="100">Question</td>
    <td><input type="text" name="question" value="Type in your question" id="short_question" style="color:#cccccc" onclick="enter_field('short_question','Type in your question');" onblur="reset_field('short_question','Type in your question');" /> <input type="checkbox" name="required" style="width:auto" /> Required</td>    
</tr>
<tr>
	<td></td>
    <td>
    	<p><input type="text" disabled="disabled" /></p>
    </td>
</tr>
<tr>
	<td></td>
    <td>
    	<a href="#" onclick="document.saForm.submit()"><img src="<?=base_url()?>images/button-create.png" border="0" /></a>
        <input type="submit" style="display:none" />
    </td>
</tr>
</table>
</form>
</div>

<div id="long_answer" class="question">
<form name="laForm" method="post" action="<?=base_url()?>admin/formc/create_long_question">
<table border="0" cellpadding="0" cellspacing="0" >
<tr>
	<td></td>
    <td><p>Long answer: for expanded comments</p></td>
</tr>
<tr>
	<td width="100">Question</td>
    <td><input type="text" name="question" value="Type in your question" id="long_question" style="color:#cccccc" onclick="enter_field('long_question','Type in your question');" onblur="reset_field('long_question','Type in your question');" /> <input type="checkbox" name="required" style="width:auto" /> Required</td>
</tr>
<tr>
	<td></td>
    <td>
    	<p><textarea disabled="disabled" style="width:303px; height:50px"></textarea></p>
    	<p>
        	<a href="#" onclick="document.laForm.submit()"><img src="<?=base_url()?>images/button-create.png" border="0" /></a>
        	<input type="submit" style="display:none" />
        </p>
    </td>
</tr>
</table>
</form>
</div>

<div id="checkbox_menu" class="question">
<form name="cmForm" method="post" action="<?=base_url()?>admin/formc/create_checkbox_question">
<table border="0" cellpadding="0" cellspacing="0" >
<tr>
	<td></td>
    <td><p>Checkbox Menu: for selecting one or more</p></td>
</tr>
<tr>
	<td width="100">Question</td>
    <td><input type="text" name="question" value="Type in your question" id="checkbox_question" style="color:#cccccc" onclick="enter_field('checkbox_question','Type in your question');" onblur="reset_field('checkbox_question','Type in your question');" /> <input type="checkbox" name="required" style="width:auto" /> Required</td>
</tr>
<tr>
	<td></td>
    <td>
    	<p>
    	<div id="all_checkbox_options">
            <div id="checkbox_1"><input type="checkbox" disabled="disabled" style="width:auto" /> 
            <input type="text" class="short" value="Type in option" name="checkbox_option_1" id="checkbox_option_1" style="color:#cccccc" onclick="enter_field('checkbox_option_1','Type in option');" onblur="reset_field('checkbox_option_1','Type in option');" />  
            </div>
        </div>
        </p>
    	<p>
        	<span id="checkbox_button">
            	<a href="#" onclick="add_checkbox_option(1)"><img src="<?=base_url()?>images/button-add-option.png" border="0" /></a>
            </span>
        	<a href="#" onclick="document.cmForm.submit()"><img src="<?=base_url()?>images/button-create.png" border="0" /></a>
        	<input type="submit" style="display:none" />
        </p>
    </td>
</tr>
</table>
</form>
</div>

<div id="radio_button_menu" class="question">
<form name="rbForm" method="post" action="<?=base_url()?>admin/formc/create_radio_question">
<table border="0" cellpadding="0" cellspacing="0" >
<tr>
	<td></td>
    <td><p>Radio Button Menu: for selecting just one</p></td>
</tr>
<tr>
	<td width="100">Question</td>
    <td><input type="text" name="question" value="Type in your question" id="radio_question" style="color:#cccccc" onclick="enter_field('radio_question','Type in your question');" onblur="reset_field('radio_question','Type in your question');" /> <input type="checkbox" name="required" style="width:auto" /> Required</td>
</tr>
<tr>
	<td></td>
    <td>
    	<p>
    	<div id="all_radio_options">
            <div id="radio_1"><input type="radio" disabled="disabled" style="width:auto" /> 
            <input type="text" class="short" value="Type in option" name="radio_option_1" id="radio_option_1" style="color:#cccccc" onclick="enter_field('radio_option_1','Type in option');" onblur="reset_field('radio_option_1','Type in option');" />  
            </div>
        </div>
        </p>
    	<p>
        	<span id="radio_button">
            	<a href="#" onclick="add_radio_option(1)"><img src="<?=base_url()?>images/button-add-option.png" border="0" /></a>
            </span>
        	<a href="#" onclick="document.rbForm.submit()"><img src="<?=base_url()?>images/button-create.png" border="0" /></a>
        	<input type="submit" style="display:none" />
        </p>
    </td>
</tr>
</table>
</form>
</div>

<div id="drop_down_menu" class="question">
<form name="dmForm" method="post" action="<?=base_url()?>admin/formc/create_dropdown_question">
<table border="0" cellpadding="0" cellspacing="0" >
<tr>
	<td></td>
    <td><p>Drop Down Menu: for selecting just one</p></td>
</tr>
<tr>
	<td width="100">Question</td>
    <td><input type="text" name="question" value="Type in your question" id="dropdown_question" style="color:#cccccc" onclick="enter_field('dropdown_question','Type in your question');" onblur="reset_field('dropdown_question','Type in your question');" /> <input type="checkbox" name="required" style="width:auto" /> Required</td>
</tr>
<tr>
	<td></td>
    <td>
    	<p>
    	<select disabled="disabled">
        	<option>Select an answer </option>           
        </select>
        </p>
        <p>
    	<div id="all_dropdown_options">
            <div id="dropdown_1"><input type="text" class="short" value="Type in option" name="dropdown_option_1" id="dropdown_option_1" style="color:#cccccc" onclick="enter_field('dropdown_option_1','Type in option');" onblur="reset_field('dropdown_option_1','Type in option');" />  
            </div>
        </div>
        </p>
    	<p>
        	<span id="dropdown_button">
            	<a href="#" onclick="add_dropdown_option(1)"><img src="<?=base_url()?>images/button-add-option.png" border="0" /></a>
            </span>
        	<a href="#" onclick="document.dmForm.submit()"><img src="<?=base_url()?>images/button-create.png" border="0" /></a>
        	<input type="submit" style="display:none" />
        </p>
    </td>
</tr>
</table>
</form>
</div>


<div id="multiple_menu" class="question">
<form name="mmForm" method="post" action="<?=base_url()?>admin/formc/create_multiple_question">
<table border="0" cellpadding="0" cellspacing="0" >
<tr>
	<td><input type="hidden" name="number_of_question" id="number_of_question" value="1" /></td>
    <td><p>Multiple Question: radio button for multiple questions</p></td>
</tr>
<tr>
<td>Title of Question:</td>
<td><input type="text" name="question_title" value="Type in your question title" id="question_title" style="color:#cccccc" onclick="enter_field('question_title','Type in your question title');" onblur="reset_field('question_title','Type in your question title');" /></td>
</tr>
<tr valign="top">
	<td width="100">Question</td>
    <td>
    	<div id="all_question_options">
            <div id="question_1"><input type="text" name="question_1" value="Type in your question" id="multiple_question_1" style="color:#cccccc" onclick="enter_field('multiple_question_1','Type in your question');" onblur="reset_field('multiple_question_1','Type in your question');" /> <input type="checkbox" name="required_1" id="required_1" style="width:auto" /> Required</div>
        </div>
    </td>
</tr>
<tr>
	<td></td>
    <td>
    	<p>
        <div id="all_multiple_options">
    	<div id="multiple_1"><input type="radio" disabled="disabled" style="width:auto" /> 
        <input type="text" class="short" value="Type in option" name="multiple_option_1" id="multiple_option_1" style="color:#cccccc" onclick="enter_field('multiple_option_1','Type in option');" onblur="reset_field('multiple_option_1','Type in option');" />  
        </div>
        </div>
        </p>
        
    	<p>
        	<span id="question_button">
            	<a href="#" onclick="add_question_option(1)"><img src="<?=base_url()?>images/button-add-question.png" border="0" /></a>
            </span>
        	<span id="multiple_button">
            	<a href="#" onclick="add_multiple_option(1)"><img src="<?=base_url()?>images/button-add-option.png" border="0" /></a>
            </span>
        	<a href="#" onclick="document.mmForm.submit()"><img src="<?=base_url()?>images/button-create.png" border="0" /></a>
        	<input type="submit" style="display:none" />
        </p>
    </td>
</tr>
</table>
</form>
</div>

<div id="finish_note" class="question">
<form name="fnForm" method="post" action="<?=base_url()?>admin/formc/update_finish_note">
<table border="0" cellpadding="0" cellspacing="0" >
<tr>
	<td><p>Message after completing the form</p></td>
</tr>
<tr>
	<td>
		<textarea name="finish_note" class="mceEditor" style="width:800px;height:200px"><?php print $survey['finish_note']; ?></textarea>
    </td>
</tr>
<tr>
	<td>
    	<p>
        <a href="#" onclick="document.fnForm.submit()"><img src="<?=base_url()?>images/button-update.png" border="0" /></a>
        <input type="submit" style="display:none" />
        </p>
    </td>
</tr>
</table>
</form>
</div>

<div class="preview">Questions</div>
<div class="survey">
<?php
$n = count($questions);
if ($n == 0) {
print "<p>There is no question yet! Please add questions by clicking one of the above buttons.</p>";
}
else
for($i=0;$i<$n;$i++)
{
	if ($questions[$i]['type'] != 6)
	{
		print "<div id=\"question-".$questions[$i]['id']."\"><fieldset><legend>".$questions[$i]['question'];
		if ($questions[$i]['required'] == 1)
		{
			print " <span class=\"required\">*</span>";
		}
		print " ( <a href=\"#\" onClick=\"javascript:editQuestion(".$questions[$i]['id'].")\">Edit</a> | ";
		if ($questions[$i]['required'] == 0)
		{
			print "<a href=\"".base_url()."admin/formc/required/".$questions[$i]['id']."/1\">Mark as required</a> | ";
		}
		else if ($questions[$i]['required'] == 1)
		{
			print "<a href=\"".base_url()."admin/formc/required/".$questions[$i]['id']."/0\">Remove required</a> | ";
		}
		
		if ($questions[$i]['type'] == 3 || $questions[$i]['type'] == 4 || $questions[$i]['type'] == 5)
		{
			print "<a href=\"javascript:addOption(".$questions[$i]['id'].",".$questions[$i]['type'].")\">Add option</a> | ";
		}
		print "<a href=\"javascript:remove(".$questions[$i]['id'].")\">Remove</a> )</legend><p>";
		switch($questions[$i]['type'])
		{
			case 1: print "<input class=\"answer\" type=\"text\" />";
				break;
			case 2: print "<textarea style=\"height:80px; width:50%\"></textarea>";
				break;
			case 3:
				foreach($options[$questions[$i]['id']] as $o)
				{
					print "<div id=\"option-".$o['id']."\" class=\"box-checkbox\"><input type=\"checkbox\" class=\"no-style\" /> ".$o['value']." ( <a href=\"#\" onClick=\"javascript:editOption(".$o['id'].")\">Edit</a> | <a href=\"javascript:removeOption(".$o['id'].")\">Remove</a> )</div>";
				}
				print "<div id=\"anotherOption-".$questions[$i]['id']."\" style=\"display:none\"></div>";		
				print "<br />";
				break;
			case 4: 
				foreach($options[$questions[$i]['id']] as $o)
				{
					print "<div id=\"option-".$o['id']."\" class=\"box-radio\"><input type=\"radio\" name=\"".$o['qid']."\" class=\"no-style\" /> ".$o['value']." ( <a href=\"#\" onClick=\"javascript:editOption(".$o['id'].")\">Edit</a> | <a href=\"javascript:removeOption(".$o['id'].")\">Remove</a> )</div>";
				}
				print "<div id=\"anotherOption-".$questions[$i]['id']."\" style=\"display:none\"></div>";	
				print "<br />";
				break;
			case 5: 
				print "<select>";
				foreach($options[$questions[$i]['id']] as $o)
				{
					print "<option> ".$o['value']."</option>";
				}
				print "</select><br />";
				foreach($options[$questions[$i]['id']] as $o)
				{
					print "<div id=\"option-".$o['id']."\" class=\"box-select\">".$o['value']." ( <a href=\"#\" onClick=\"javascript:editOption(".$o['id'].")\">Edit</a> | <a href=\"javascript:removeOption(".$o['id'].")\">Remove</a> )</div>";
				}
				print "<div id=\"anotherOption-".$questions[$i]['id']."\" style=\"display:none\"></div>";	
				print "<br />";
				break;
			case 6: 
				break;
		}
		print "</p></fieldset><br /></div>";
	}
	
}
for($i=0;$i<$group;$i++)
if ($mquestions[$i] != NULL)
{
	$title = $mquestions[$i][0]['title'];
	print "<div id=\"group-".($i+1)."\"><fieldset><br />";
	print "<table border=\"0\" cellspacing=\"0\" cellpadding=\"10\" width=\"100%\">";
	print "<tr><td style=\"border-bottom:1px dotted #cccccc\"><b>".$title ."</b>
	(  <a href=\"#\" onClick=\"javascript:editQuestionTitle(".($i+1).")\">Edit</a> | <a href=\"javascript:removeGroup(".($i+1).")\">Remove</a> | <a href=\"#\" onClick=\"javascript:addQuestion(".($i+1).")\">Add question</a> | <a href=\"#\" onClick=\"javascript:addOptions(".($i+1).")\">Add option</a> )</td>";
	foreach($moptions[$i] as $option)
	{
		print "<td width=\"10%\" style=\"border-bottom:1px dotted #cccccc; border-left: 1px dotted #cccccc\" align=\"center\">".$option['value']."<br />( <a href=\"#\" onClick=\"javascript:editMOptions(".$option['id'].")\">Edit</a> | <a href=\"#\" onClick=\"javascript:removeMOptions(".$option['id'].")\">Remove</a> )</td>";
	}
	print "</tr>";
	foreach($mquestions[$i] as $question)
	{
		print "<tr>";
		print "<td style=\"border-bottom:1px dotted #cccccc\">".$question['question']." ( <a href=\"#\" onClick=\"javascript:editQuestion(".$question['id'].")\">Edit</a> | <a href=\"#\" onClick=\"removeQuestion(".$question['id'].")\">Remove</a> )</td>";
		for($j=0;$j<count($moptions[$i]);$j++)
		{
			print "<td style=\"border-bottom:1px dotted #cccccc; border-left:1px dotted #ccc\" align=\"center\"><input type=\"radio\" name=\"".$question['id']."\" class=\"no-style\" /></td>";
		}
		print "</tr>";
	}
	
	print "</table>";
	print "<br /></fieldset><br /></div>";
}

if ($survey['finish_note'] != "") { 
	print "<br /><fieldset><legend><b><u>Finish note</u></b> ( <a href=\"#\" onclick=\"javascript:menu_slide('finish_note')\">Edit</a> )</legend>";
	print $survey['finish_note'];
	print "</fieldset>";
} ?>

<p style="padding-right:2px; text-align:right"><a href="#" onclick="goPreview()"><img src="<?=base_url()?>images/button-save-preview.png" border="0" /></a></p>
</div>
<div id="bar-rb"></div>

<?php } ?>

<div class="footer">Page rendered in {elapsed_time} seconds &nbsp;|&nbsp; Powered by Propagate &copy; 2009 &nbsp;|&nbsp; Version 1.0</div>

</body>
</html>