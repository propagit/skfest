var OxO3e67=["stringSearch","stringReplace","MatchWholeWord","MatchCase","document","checked","length","value","Nothing to search.\x0APlease enter some text in the field labeled Find what:","selection","body","type","Control","text","Finished Searching the document. Would you like to start again from the top?","","textedit"," : ","Please use replace funtion."];var editwin=Window_GetDialogArguments(window);var stringSearch=Window_GetElement(window,OxO3e67[0x0],true);var stringReplace=Window_GetElement(window,OxO3e67[0x1],true);var MatchWholeWord=Window_GetElement(window,OxO3e67[0x2],true);var MatchCase=Window_GetElement(window,OxO3e67[0x3],true);var editdoc=editwin[OxO3e67[0x4]]; function get_ie_matchtype(){var Ox22f=0x0;var Ox230=0x0;var Ox231=0x0;if(MatchCase[OxO3e67[0x5]]){ Ox230=0x4 ;} ;if(MatchWholeWord[OxO3e67[0x5]]){ Ox231=0x2 ;} ; Ox22f=Ox230+Ox231 ;return (Ox22f);}  ; function checkInputString(){if(stringSearch[OxO3e67[0x7]][OxO3e67[0x6]]<0x1){ alert(OxO3e67[0x8]) ;return false;} else {return true;} ;}  ; function IsMatchSearchValue(Oxe){if(!Oxe){return false;} ;if(stringSearch[OxO3e67[0x7]]==Oxe){return true;} ;if(MatchCase[OxO3e67[0x5]]){return false;} ;return stringSearch[OxO3e67[0x7]].toLowerCase()==Oxe.toLowerCase();}  ;var _ie_range=null; function IE_Restore(){ editwin.focus() ;if(_ie_range!=null){ _ie_range.select() ;} ;}  ; function IE_Save(){ editwin.focus() ; _ie_range=editdoc[OxO3e67[0x9]].createRange() ;}  ; function MoveToBodyStart(){if(Browser_UseIESelection()){ range=document[OxO3e67[0xa]].createTextRange() ; range.collapse(true) ; range.select() ; IE_Save() ;} else { editwin.getSelection().collapse(editdoc.body,0x0) ;} ;}  ; function DoFind(){if(Browser_UseIESelection()){ IE_Restore() ;var Oxc3=editdoc[OxO3e67[0x9]];if(Oxc3[OxO3e67[0xb]]==OxO3e67[0xc]){ MoveToBodyStart() ;} ;var Ox13d=Oxc3.createRange(); Ox13d.collapse(false) ;if(Ox13d.findText(stringSearch[OxO3e67[0x7]],0x3b9aca00,get_ie_matchtype())){ Ox13d.select() ; IE_Save() ;return true;} ;} else {var Ox13d=editwin.getSelection().getRangeAt(0x0);if(editwin.find(stringSearch[OxO3e67[0x7]],MatchCase[OxO3e67[0x5]],false,false,MatchWholeWord.checked,false,false)){return true;} ;} ;}  ; function DoReplace(){if(Browser_UseIESelection()){ IE_Restore() ;var Oxc3=editdoc[OxO3e67[0x9]];if(Oxc3[OxO3e67[0xb]]!=OxO3e67[0xc]){var Ox13d=Oxc3.createRange();if(IsMatchSearchValue(Ox13d.text)){ Ox13d[OxO3e67[0xd]]=stringReplace[OxO3e67[0x7]] ; Ox13d.collapse(false) ; IE_Save() ;return true;} ;} ;} else {var Oxc3=editwin.getSelection();if(IsMatchSearchValue(Oxc3.toString())){ Oxc3.deleteFromDocument() ; Oxc3.getRangeAt(0x0).insertNode(editdoc.createTextNode(stringReplace.value)) ; Oxc3.getRangeAt(0x0).collapse(false) ;return true;} ;} ;return false;}  ; function FindTxt(){if(!checkInputString()){return false;} ;while(true){if(DoFind()){return ;} ;if(!confirm(OxO3e67[0xe])){return ;} ; MoveToBodyStart() ;} ;}  ; function ReplaceTxt(){if(!checkInputString()){return ;} ; DoReplace() ; FindTxt() ;}  ; function ReplaceAllTxt(){if(!checkInputString()){return ;} ;var Ox23d=0x0;var msg=OxO3e67[0xf]; MoveToBodyStart() ;if(Browser_UseIESelection()){var Oxc3=editdoc[OxO3e67[0x9]];if(Oxc3[OxO3e67[0xb]]==OxO3e67[0xc]){ MoveToBodyStart() ;} ;var Ox23e=Oxc3.createRange();var Ox23d=0x0;var msg=OxO3e67[0xf]; Ox23e.expand(OxO3e67[0x10]) ; Ox23e.collapse() ; Ox23e.select() ;while(Ox23e.findText(stringSearch[OxO3e67[0x7]],0x3b9aca00,get_ie_matchtype())){ Ox23e.select() ; Ox23e[OxO3e67[0xd]]=stringReplace[OxO3e67[0x7]] ; Ox23d++ ;} ;if(Ox23d==0x0){ msg=WordNotFound ;} else { msg=WordReplaced+OxO3e67[0x11]+Ox23d ;} ; alert(msg) ;} else {if((stringReplace[OxO3e67[0x7]]).indexOf(stringSearch.value)==-0x1){ DoFind() ;while(DoReplace()){ Ox23d++ ; DoFind() ; FindTxt() ;} ;if(Ox23d==0x0){ msg=WordNotFound ;} else { msg=WordReplaced+OxO3e67[0x11]+Ox23d ;} ; alert(msg) ;} else { FindTxt() ; alert(OxO3e67[0x12]) ;} ;} ;}  ;