// JavaScript Document

function add_checkbox_option(n)
{
	for (var i=1;i<=n;i++)
	{
		value = document.getElementById("checkbox_option_" + i).value;
		document.getElementById("checkbox_" + i).innerHTML = '<input type="checkbox" disabled="disabled" style="width:auto" /> <input type="text" class="short" value="' + value + '" name="checkbox_option_' + i + '" id="checkbox_option_' + i + '" />';
	}
	n = n + 1;
	document.getElementById("all_checkbox_options").innerHTML += '<div id="checkbox_' + n + '"><input type="checkbox" disabled="disabled" style="width:auto" /> <input type="text" class="short" value="Type in option" name="checkbox_option_' + n + '" id="checkbox_option_' + n + '" style="color:#cccccc" onclick="enter_field(\'checkbox_option_' + n + '\',\'Type in option\');" onblur="reset_field(\'checkbox_option_' + n + '\',\'Type in option\');" /> <input type="button" class="button" value="X" onClick="delete_checkbox_option(' + n + ')" /></div>';
	
	
	document.getElementById("checkbox_button").innerHTML = '<a href="#" onclick="add_checkbox_option(' + n + ')"><img src="images/button-add-option.png" border="0" /></a>';	
}
function delete_checkbox_option(n)
{
	parent = document.getElementById("all_checkbox_options");
	child = document.getElementById("checkbox_" + n);
	parent.removeChild(child);
	n = n - 1;
	document.getElementById("checkbox_button").innerHTML = '<a href="#" onclick="add_checkbox_option(' + n + ')"><img src="images/button-add-option.png" border="0" /></a>';
	if ( n > 1) {
		value = document.getElementById("checkbox_option_" + n).value;
		document.getElementById("checkbox_" + n).innerHTML = '<input type="checkbox" disabled="disabled" style="width:auto" /> <input type="text" class="short" value="' + value + '" name="checkbox_option_' + n + '" id="checkbox_option_' + n + '" /> <input type="button" class="button" value="X" onClick="delete_checkbox_option(' + n + ')" />';
	}
}

function add_radio_option(n)
{
	for (var i=1;i<=n;i++)
	{
		value = document.getElementById("radio_option_" + i).value;
		document.getElementById("radio_" + i).innerHTML = '<input type="radio" disabled="disabled" style="width:auto" /> <input type="text" class="short" value="' + value + '" name="radio_option_' + i + '" id="radio_option_' + i + '" />';
	}
	n = n + 1;
	document.getElementById("all_radio_options").innerHTML += '<div id="radio_' + n + '"><input type="radio" disabled="disabled" style="width:auto" /> <input type="text" class="short" value="Type in option" name="radio_option_' + n + '" id="radio_option_' + n + '" style="color:#cccccc" onclick="enter_field(\'radio_option_' + n + '\',\'Type in option\');" onblur="reset_field(\'radio_option_' + n + '\',\'Type in option\');" /> <input type="button" class="button" value="X" onClick="delete_radio_option(' + n + ')" /></div>';
	
	
	document.getElementById("radio_button").innerHTML = '<a href="#" onclick="add_radio_option(' + n + ')"><img src="images/button-add-option.png" border="0" /></a>';
	
}
function delete_radio_option(n)
{
	parent = document.getElementById("all_radio_options");
	child = document.getElementById("radio_" + n);
	parent.removeChild(child);
	n = n - 1;
	document.getElementById("radio_button").innerHTML = '<a href="#" onclick="add_radio_option(' + n + ')"><img src="images/button-add-option.png" border="0" /></a>';
	if ( n > 1) {
		value = document.getElementById("radio_option_" + n).value;
		document.getElementById("radio_" + n).innerHTML = '<input type="radio" disabled="disabled" style="width:auto" /> <input type="text" class="short" value="' + value + '" name="radio_option_' + n + '" id="radio_option_' + n + '" /> <input type="button" class="button" value="X" onClick="delete_radio_option(' + n + ')" />';
	}
}

function add_dropdown_option(n)
{
	for (var i=1;i<=n;i++)
	{
		value = document.getElementById("dropdown_option_" + i).value;
		document.getElementById("dropdown_" + i).innerHTML = '<input type="text" class="short" value="' + value + '" name="dropdown_option_' + i + '" id="dropdown_option_' + i + '" />';
	}
	n = n + 1;
	document.getElementById("all_dropdown_options").innerHTML += '<div id="dropdown_' + n + '"><input type="text" class="short" value="Type in option" name="dropdown_option_' + n + '" id="dropdown_option_' + n + '" style="color:#cccccc" onclick="enter_field(\'dropdown_option_' + n + '\',\'Type in option\');" onblur="reset_field(\'dropdown_option_' + n + '\',\'Type in option\');" /> <input type="button" class="button" value="X" onClick="delete_dropdown_option(' + n + ')" /></div>';
	
	
	document.getElementById("dropdown_button").innerHTML = '<a href="#" onclick="add_dropdown_option(' + n + ')"><img src="images/button-add-option.png" border="0" /></a>';	
}
function delete_dropdown_option(n)
{
	parent = document.getElementById("all_dropdown_options");
	child = document.getElementById("dropdown_" + n);
	parent.removeChild(child);
	n = n - 1;
	document.getElementById("dropdown_button").innerHTML = '<a href="#" onclick="add_dropdown_option(' + n + ')"><img src="images/button-add-option.png" border="0" /></a>';
	if ( n > 1) {
		value = document.getElementById("dropdown_option_" + n).value;
		document.getElementById("dropdown_" + n).innerHTML = '<input type="text" class="short" value="' + value + '" name="dropdown_option_' + n + '" id="dropdown_option_' + n + '" /> <input type="button" class="button" value="X" onClick="delete_dropdown_option(' + n + ')" />';
	}
}

function add_question_option(n)
{
	for (var i=1;i<=n;i++)
	{
		value = document.getElementById("multiple_question_" + i).value;
		if (document.getElementById("required_" + i).checked)
		{
			document.getElementById("question_" + i).innerHTML = '<input type="text" name="question_' + i + '" value="' + value + '" id="multiple_question_' + i + '" /> <input type="checkbox" name="required_' + i + '" id="required_' + i + '" style="width:auto" checked="checked" /> Required';
		}
		else 
		{
			document.getElementById("question_" + i).innerHTML = '<input type="text" name="question_' + i + '" value="' + value + '" id="multiple_question_' + i + '" /> <input type="checkbox" name="required_' + i + '" id="required_' + i + '" style="width:auto" /> Required';
		}
		
	}
	n = n + 1;
	document.getElementById("all_question_options").innerHTML += '<div id="question_' + n + '"><input type="text" name="question_' + n + '" value="Type in your question" id="multiple_question_' + n + '" style="color:#cccccc" onclick="enter_field(\'multiple_question_' + n + '\',\'Type in your question\');" onblur="reset_field(\'multiple_question_' + n + '\',\'Type in your question\');" /> <input type="checkbox" name="required_' + n + '" id="required_' + n + '" style="width:auto" /> Required &nbsp;  <input type="button" class="button" value="X" onClick="delete_question_option(' + n + ')" /></div>';
	document.getElementById("question_button").innerHTML = '<a href="#" onclick="add_question_option(' + n + ')"><img src="images/button-add-question.png" border="0" /></a>';
	document.getElementById("number_of_question").value = parseInt(document.getElementById("number_of_question").value) + 1;
}

function delete_question_option(n)
{
	parent = document.getElementById("all_question_options");
	child = document.getElementById("question_" + n);
	parent.removeChild(child);
	n = n - 1;
	document.getElementById("question_button").innerHTML = '<a href="#" onclick="add_question_option(' + n + ')"><img src="images/button-add-question.png" border="0" /></a>';
	if (n > 1)
	{
		value = document.getElementById("multiple_question_" + n).value;
		if (document.getElementById("required_" + n).checked)
		{
			document.getElementById("question_" + n).innerHTML = '<input type="text" name="question_' + n + '" value="' + value + '" id="multiple_question_' + n + '" /> <input type="checkbox" name="required_' + n + '" id="required_' + n + '" style="width:auto" checked="checked" /> Required &nbsp;  <input type="button" class="button" value="X" onClick="delete_question_option(' + n + ')" />';
		}
		else 
		{
			document.getElementById("question_" + n).innerHTML = '<input type="text" name="question_' + n + '" value="' + value + '" id="multiple_question_' + n + '" /> <input type="checkbox" name="required_' + n + '" id="required_' + n + '" style="width:auto" /> Required &nbsp;  <input type="button" class="button" value="X" onClick="delete_question_option(' + n + ')" />';
		}
	}
	document.getElementById("number_of_question").value = parseInt(document.getElementById("number_of_question").value) - 1;
}

function add_multiple_option(n)
{
	for (var i=1;i<=n;i++)
	{
		value = document.getElementById("multiple_option_" + i).value;
		document.getElementById("multiple_" + i).innerHTML = '<input type="radio" disabled="disabled" style="width:auto" /> <input type="text" class="short" value="' + value + '" name="multiple_option_' + i + '" id="multiple_option_' + i + '" />';
	}
	n = n + 1;
	document.getElementById("all_multiple_options").innerHTML += '<div id="multiple_' + n + '"><input type="radio" disabled="disabled" style="width:auto" /> <input type="text" class="short" value="Type in option" name="multiple_option_' + n + '" id="multiple_option_' + n + '" style="color:#cccccc" onclick="enter_field(\'multiple_option_' + n + '\',\'Type in option\');" onblur="reset_field(\'multiple_option_' + n + '\',\'Type in option\');" /> <input type="button" class="button" value="X" onClick="delete_multiple_option(' + n + ')" /></div>';
	
	
	document.getElementById("multiple_button").innerHTML = '<a href="#" onclick="add_multiple_option(' + n + ')"><img src="images/button-add-option.png" border="0" /></a>';
	
}
function delete_multiple_option(n)
{
	parent = document.getElementById("all_multiple_options");
	child = document.getElementById("multiple_" + n);
	parent.removeChild(child);
	n = n - 1;
	document.getElementById("multiple_button").innerHTML = '<a href="#" onclick="add_multiple_option(' + n + ')"><img src="images/button-add-option.png" border="0" /></a>';
	if ( n > 1) {
		value = document.getElementById("multiple_option_" + n).value;
		document.getElementById("multiple_" + n).innerHTML = '<input type="radio" disabled="disabled" style="width:auto" /> <input type="text" class="short" value="' + value + '" name="multiple_option_' + n + '" id="multiple_option_' + n + '" /> <input type="button" class="button" value="X" onClick="delete_multiple_option(' + n + ')" />';
	}
}


function enter_field(x,text)
{
	if (document.getElementById(x).value == text)
	{
		document.getElementById(x).value = '';
		document.getElementById(x).style.color = '#000000';
	}	
}

function reset_field(x,text)
{
	if (document.getElementById(x).value == '')
	{
		document.getElementById(x).value = text;
		document.getElementById(x).style.color = '#cccccc';
	}
}

function menu_slide(name)
{
	var arr = Array('short_answer','long_answer','checkbox_menu','radio_button_menu','drop_down_menu','multiple_menu','finish_note');
	for(var i=0;i<7;i++)
	{
		$("#" + arr[i]).slideUp("fast");
	}
	$("#" + name).slideDown("normal");
}