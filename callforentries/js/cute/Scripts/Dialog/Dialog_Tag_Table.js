var OxOd63b=["","removeNode","parentNode","firstChild","nodeName","TABLE","length","Can\x27t Get The Position ?","Map","RowCount","ColCount","rows","cells","Unknown Error , pos ",":"," already have cell","rowSpan","colSpan","Unknown Error , Unable to find bestpos","inp_cellspacing","inp_cellpadding","inp_id","inp_border","inp_bgcolor","inp_bordercolor","sel_rules","inp_collapse","inp_summary","btn_editcaption","btn_delcaption","btn_insthead","btn_instfoot","inp_class","inp_width","sel_width_unit","inp_height","sel_height_unit","sel_align","sel_textalign","sel_float","inp_tooltip","onclick","tHead","tFoot","caption","innerHTML","innerText","Unable to delete the caption. Please remove it in HTML source.","display","style","none","disabled","cellSpacing","value","cellPadding","id","border","borderColor","backgroundColor","bgColor","borderCollapse","checked","collapse","rules","summary","className","width","options","selectedIndex","height","align","styleFloat","cssFloat","textAlign","title","bordercolor","0","%","class","CaptionTable"]; function ParseFloatToString(Oxe){var Ox3a9=parseFloat(Oxe);if(isNaN(Ox3a9)){return OxOd63b[0x0];} ;return Ox3a9+OxOd63b[0x0];}  ; function Element_RemoveNode(element,Ox40f){if(element[OxOd63b[0x1]]){ element.removeNode(Ox40f) ;return ;} ;var p=element[OxOd63b[0x2]];if(!p){return ;} ;if(Ox40f){ p.removeChild(element) ;return ;} ;while(true){var Ox15e=element[OxOd63b[0x3]];if(!Ox15e){break ;} ; p.insertBefore(Ox15e,element) ;} ; p.removeChild(element) ;}  ; function Table_GetTable(Oxdc){for(;Oxdc!=null;Oxdc=Oxdc[OxOd63b[0x2]]){if(Oxdc[OxOd63b[0x4]]==OxOd63b[0x5]){return Oxdc;} ;} ;return null;}  ; function Table_GetCellPositionFromMap(Ox409,Oxa){for(var Ox1f0=0x0;Ox1f0<Ox409[OxOd63b[0x6]];Ox1f0++){var Ox40c=Ox409[Ox1f0];for(var Ox11b=0x0;Ox11b<Ox40c[OxOd63b[0x6]];Ox11b++){if(Ox40c[Ox11b]==Oxa){return {rowIndex:Ox1f0,cellIndex:Ox11b};} ;} ;} ;throw ( new Error(-0x1,OxOd63b[0x7]));}  ; function Table_GetCellMap(Ox7){return Table_CalculateTableInfo(Ox7)[OxOd63b[0x8]];}  ; function Table_GetRowCount(Oxdc){return Table_CalculateTableInfo(Oxdc)[OxOd63b[0x9]];}  ; function Table_GetColCount(Oxdc){return Table_CalculateTableInfo(Oxdc)[OxOd63b[0xa]];}  ; function Table_CalculateTableInfo(Oxdc){var Ox7=Table_GetTable(Oxdc);var Ox41c=Ox7[OxOd63b[0xb]];for(var Ox29=Ox41c[OxOd63b[0x6]]-0x1;Ox29>=0x0;Ox29--){var Ox41d=Ox41c.item(Ox29);if(Ox41d[OxOd63b[0xc]][OxOd63b[0x6]]==0x0){ Element_RemoveNode(Ox41d,true) ;continue ;} ;} ;var Ox41e=Ox41c[OxOd63b[0x6]];var Ox41f=0x0;var Ox420= new Array(Ox41c.length);for(var Ox421=0x0;Ox421<Ox41e;Ox421++){ Ox420[Ox421]=[] ;} ; function Ox422(Ox29,Ox15e,Oxa){while(Ox29>=Ox41e){ Ox420[Ox41e]=[] ; Ox41e++ ;} ;var Ox423=Ox420[Ox29];if(Ox15e>=Ox41f){ Ox41f=Ox15e+0x1 ;} ;if(Ox423[Ox15e]!=null){throw ( new Error(-0x1,OxOd63b[0xd]+Ox29+OxOd63b[0xe]+Ox15e+OxOd63b[0xf]));} ; Ox423[Ox15e]=Oxa ;}  ; function Ox424(Ox29,Ox15e){var Ox423=Ox420[Ox29];if(Ox423){return Ox423[Ox15e];} ;}  ;for(var Ox421=0x0;Ox421<Ox41c[OxOd63b[0x6]];Ox421++){var Ox41d=Ox41c.item(Ox421);var Ox425=Ox41d[OxOd63b[0xc]];for(var Ox14=0x0;Ox14<Ox425[OxOd63b[0x6]];Ox14++){var Oxa=Ox425.item(Ox14);var Ox426=Oxa[OxOd63b[0x10]];var Ox427=Oxa[OxOd63b[0x11]];var Ox423=Ox420[Ox421];var Ox428=-0x1;for(var Ox429=0x0;Ox429<Ox41f+Ox427+0x1;Ox429++){if(Ox426==0x1&&Ox427==0x1){if(Ox423[Ox429]==null){ Ox428=Ox429 ;break ;} ;} else {var Ox42a=true;for(var Ox42b=0x0;Ox42b<Ox426;Ox42b++){for(var Ox42c=0x0;Ox42c<Ox427;Ox42c++){if(Ox424(Ox421+Ox42b,Ox429+Ox42c)!=null){ Ox42a=false ;break ;} ;} ;} ;if(Ox42a){ Ox428=Ox429 ;break ;} ;} ;} ;if(Ox428==-0x1){throw ( new Error(-0x1,OxOd63b[0x12]));} ;if(Ox426==0x1&&Ox427==0x1){ Ox422(Ox421,Ox428,Oxa) ;} else {for(var Ox42b=0x0;Ox42b<Ox426;Ox42b++){for(var Ox42c=0x0;Ox42c<Ox427;Ox42c++){ Ox422(Ox421+Ox42b,Ox428+Ox42c,Oxa) ;} ;} ;} ;} ;} ;var Oxca={}; Oxca[OxOd63b[0x9]]=Ox41e ; Oxca[OxOd63b[0xa]]=Ox41f ; Oxca[OxOd63b[0x8]]=Ox420 ;for(var Ox29=0x0;Ox29<Ox41e;Ox29++){var Ox423=Ox420[Ox29];for(var Ox15e=0x0;Ox15e<Ox41f;Ox15e++){} ;} ;return Oxca;}  ;var inp_cellspacing=Window_GetElement(window,OxOd63b[0x13],true);var inp_cellpadding=Window_GetElement(window,OxOd63b[0x14],true);var inp_id=Window_GetElement(window,OxOd63b[0x15],true);var inp_border=Window_GetElement(window,OxOd63b[0x16],true);var inp_bgcolor=Window_GetElement(window,OxOd63b[0x17],true);var inp_bordercolor=Window_GetElement(window,OxOd63b[0x18],true);var sel_rules=Window_GetElement(window,OxOd63b[0x19],true);var inp_collapse=Window_GetElement(window,OxOd63b[0x1a],true);var inp_summary=Window_GetElement(window,OxOd63b[0x1b],true);var btn_editcaption=Window_GetElement(window,OxOd63b[0x1c],true);var btn_delcaption=Window_GetElement(window,OxOd63b[0x1d],true);var btn_insthead=Window_GetElement(window,OxOd63b[0x1e],true);var btn_instfoot=Window_GetElement(window,OxOd63b[0x1f],true);var inp_class=Window_GetElement(window,OxOd63b[0x20],true);var inp_width=Window_GetElement(window,OxOd63b[0x21],true);var sel_width_unit=Window_GetElement(window,OxOd63b[0x22],true);var inp_height=Window_GetElement(window,OxOd63b[0x23],true);var sel_height_unit=Window_GetElement(window,OxOd63b[0x24],true);var sel_align=Window_GetElement(window,OxOd63b[0x25],true);var sel_textalign=Window_GetElement(window,OxOd63b[0x26],true);var sel_float=Window_GetElement(window,OxOd63b[0x27],true);var inp_tooltip=Window_GetElement(window,OxOd63b[0x28],true); function insertOneRow(Ox521,Ox306){var Ox41d=Ox521.insertRow(-0x1);for(var i=0x0;i<Ox306;i++){ Ox41d.insertCell() ;} ;}  ; btn_insthead[OxOd63b[0x29]]=function btn_insthead_onclick(){if(element[OxOd63b[0x2a]]){ element.deleteTHead() ;} else {var Ox523=Table_GetColCount(element);var Ox524=element.createTHead(); insertOneRow(Ox524,Ox523) ;} ;}  ; btn_instfoot[OxOd63b[0x29]]=function btn_instfoot_onclick(){if(element[OxOd63b[0x2b]]){ element.deleteTFoot() ;} else {var Ox523=Table_GetColCount(element);var Ox526=element.createTFoot(); insertOneRow(Ox526,Ox523) ;} ;}  ; btn_editcaption[OxOd63b[0x29]]=function btn_editcaption_onclick(){var Ox528=element[OxOd63b[0x2c]];if(Ox528!=null){var Ox19e=editor.EditInWindow(Ox528.innerHTML,window);if(Ox19e!=null&&Ox19e!==false){ Ox528[OxOd63b[0x2d]]=Ox19e ;} ;} else {var Ox528=element.createCaption();if(Browser_IsGecko()){ Ox528[OxOd63b[0x2d]]=Caption ;} else { Ox528[OxOd63b[0x2e]]=Caption ;} ;} ;}  ; btn_delcaption[OxOd63b[0x29]]=function btn_delcaption_onclick(){if(element[OxOd63b[0x2c]]!=null){ alert(OxOd63b[0x2f]) ;} ;}  ; UpdateState=function UpdateState_Table(){if(Browser_IsGecko()){ btn_insthead[OxOd63b[0x2d]]=element[OxOd63b[0x2a]]?Delete:Insert ; btn_instfoot[OxOd63b[0x2d]]=element[OxOd63b[0x2b]]?Delete:Insert ;} else { btn_insthead[OxOd63b[0x2e]]=element[OxOd63b[0x2a]]?Delete:Insert ; btn_instfoot[OxOd63b[0x2e]]=element[OxOd63b[0x2b]]?Delete:Insert ;} ;if(element[OxOd63b[0x2c]]!=null){if(Browser_IsGecko()){ btn_editcaption[OxOd63b[0x2d]]=Edit ;} else { btn_editcaption[OxOd63b[0x2e]]=Edit ;} ; btn_editcaption[OxOd63b[0x31]][OxOd63b[0x30]]=OxOd63b[0x32] ; btn_delcaption[OxOd63b[0x33]]=false ;} else {if(Browser_IsGecko()){ btn_editcaption[OxOd63b[0x2d]]=Insert ;} else { btn_editcaption[OxOd63b[0x2e]]=Insert ;} ; btn_delcaption[OxOd63b[0x33]]=true ;} ;}  ;var t_inp_width=OxOd63b[0x0];var t_inp_height=OxOd63b[0x0]; SyncToView=function SyncToView_Table(){ inp_cellspacing[OxOd63b[0x35]]=element.getAttribute(OxOd63b[0x34]) ; inp_cellpadding[OxOd63b[0x35]]=element.getAttribute(OxOd63b[0x36]) ; inp_id[OxOd63b[0x35]]=element.getAttribute(OxOd63b[0x37]) ; inp_border[OxOd63b[0x35]]=element.getAttribute(OxOd63b[0x38]) ; inp_bordercolor[OxOd63b[0x35]]=element.getAttribute(OxOd63b[0x39]) ; inp_bordercolor[OxOd63b[0x31]][OxOd63b[0x3a]]=inp_bordercolor[OxOd63b[0x35]] ; inp_bgcolor[OxOd63b[0x35]]=element.getAttribute(OxOd63b[0x3b])||element[OxOd63b[0x31]][OxOd63b[0x3a]] ; inp_bgcolor[OxOd63b[0x31]][OxOd63b[0x3a]]=inp_bgcolor[OxOd63b[0x35]] ; inp_collapse[OxOd63b[0x3d]]=element[OxOd63b[0x31]][OxOd63b[0x3c]]==OxOd63b[0x3e] ; sel_rules[OxOd63b[0x35]]=element.getAttribute(OxOd63b[0x3f]) ; inp_summary[OxOd63b[0x35]]=element.getAttribute(OxOd63b[0x40]) ; inp_class[OxOd63b[0x35]]=element[OxOd63b[0x41]] ;if(element.getAttribute(OxOd63b[0x42])){ t_inp_width=element.getAttribute(OxOd63b[0x42]) ;} else {if(element[OxOd63b[0x31]][OxOd63b[0x42]]){ t_inp_width=element[OxOd63b[0x31]][OxOd63b[0x42]] ;} ;} ;if(t_inp_width){ inp_width[OxOd63b[0x35]]=ParseFloatToString(t_inp_width) ;for(var i=0x0;i<sel_width_unit[OxOd63b[0x43]][OxOd63b[0x6]];i++){var Oxce=sel_width_unit[OxOd63b[0x43]][i][OxOd63b[0x35]];if(Oxce&&t_inp_width.indexOf(Oxce)!=-0x1){ sel_width_unit[OxOd63b[0x44]]=i ;break ;} ;} ;} ;if(element.getAttribute(OxOd63b[0x45])){ t_inp_height=element.getAttribute(OxOd63b[0x45]) ;} else {if(element[OxOd63b[0x31]][OxOd63b[0x45]]){ t_inp_height=element[OxOd63b[0x31]][OxOd63b[0x45]] ;} ;} ;if(t_inp_height){ inp_height[OxOd63b[0x35]]=ParseFloatToString(t_inp_height) ;for(var i=0x0;i<sel_height_unit[OxOd63b[0x43]][OxOd63b[0x6]];i++){var Oxce=sel_height_unit[OxOd63b[0x43]][i][OxOd63b[0x35]];if(Oxce&&t_inp_height.indexOf(Oxce)!=-0x1){ sel_height_unit[OxOd63b[0x44]]=i ;break ;} ;} ;} ; sel_align[OxOd63b[0x35]]=element[OxOd63b[0x46]] ;if(Browser_IsWinIE()){ sel_float[OxOd63b[0x35]]=element[OxOd63b[0x31]][OxOd63b[0x47]] ;} else { sel_float[OxOd63b[0x35]]=element[OxOd63b[0x31]][OxOd63b[0x48]] ;} ; sel_textalign[OxOd63b[0x35]]=element[OxOd63b[0x31]][OxOd63b[0x49]] ; inp_tooltip[OxOd63b[0x35]]=element[OxOd63b[0x4a]] ;}  ; SyncTo=function SyncTo_Table(element){if(Browser_IsWinIE()){ element[OxOd63b[0x39]]=inp_bordercolor[OxOd63b[0x35]] ;} else { element.setAttribute(OxOd63b[0x4b],inp_bordercolor.value) ;} ;if(inp_bgcolor[OxOd63b[0x35]]){if(element[OxOd63b[0x31]][OxOd63b[0x3a]]){ element[OxOd63b[0x31]][OxOd63b[0x3a]]=inp_bgcolor[OxOd63b[0x35]] ;} else { element[OxOd63b[0x3b]]=inp_bgcolor[OxOd63b[0x35]] ;} ;} else { element.removeAttribute(OxOd63b[0x3b]) ;} ; element[OxOd63b[0x31]][OxOd63b[0x3c]]=inp_collapse[OxOd63b[0x3d]]?OxOd63b[0x3e]:OxOd63b[0x0] ; element[OxOd63b[0x3f]]=sel_rules[OxOd63b[0x35]]||OxOd63b[0x0] ; element[OxOd63b[0x40]]=inp_summary[OxOd63b[0x35]] ; element[OxOd63b[0x41]]=inp_class[OxOd63b[0x35]] ; element[OxOd63b[0x34]]=inp_cellspacing[OxOd63b[0x35]] ; element[OxOd63b[0x36]]=inp_cellpadding[OxOd63b[0x35]] ;var Ox296=/[^a-z\d]/i;if(Ox296.test(inp_id.value)){ alert(ValidID) ;return ;} ; element[OxOd63b[0x37]]=inp_id[OxOd63b[0x35]] ;if(inp_border[OxOd63b[0x35]]==OxOd63b[0x0]){ element[OxOd63b[0x38]]=OxOd63b[0x4c] ;} else { element[OxOd63b[0x38]]=inp_border[OxOd63b[0x35]] ;} ;if(inp_width[OxOd63b[0x35]]==OxOd63b[0x0]){ element.removeAttribute(OxOd63b[0x42]) ; element[OxOd63b[0x31]][OxOd63b[0x42]]=OxOd63b[0x0] ;} else {try{ t_inp_width=inp_width[OxOd63b[0x35]] ;if(sel_width_unit[OxOd63b[0x35]]==OxOd63b[0x4d]){ t_inp_width=inp_width[OxOd63b[0x35]]+sel_width_unit[OxOd63b[0x35]] ;} ;if(element[OxOd63b[0x31]][OxOd63b[0x42]]&&element[OxOd63b[0x42]]){ element[OxOd63b[0x31]][OxOd63b[0x42]]=t_inp_width ; element[OxOd63b[0x42]]=t_inp_width ;} else {if(element[OxOd63b[0x31]][OxOd63b[0x42]]){ element[OxOd63b[0x31]][OxOd63b[0x42]]=t_inp_width ;} else { element[OxOd63b[0x42]]=t_inp_width ;} ;} ;} catch(x){} ;} ;if(inp_height[OxOd63b[0x35]]==OxOd63b[0x0]){ element.removeAttribute(OxOd63b[0x45]) ; element[OxOd63b[0x31]][OxOd63b[0x45]]=OxOd63b[0x0] ;} else {try{ t_inp_height=inp_height[OxOd63b[0x35]] ;if(sel_height_unit[OxOd63b[0x35]]==OxOd63b[0x4d]){ t_inp_height=inp_height[OxOd63b[0x35]]+sel_height_unit[OxOd63b[0x35]] ;} ; t_inp_height=inp_height[OxOd63b[0x35]]+sel_height_unit[OxOd63b[0x35]] ;if(element[OxOd63b[0x31]][OxOd63b[0x45]]&&element[OxOd63b[0x45]]){ element[OxOd63b[0x31]][OxOd63b[0x45]]=t_inp_height ; element[OxOd63b[0x45]]=t_inp_height ;} else {if(element[OxOd63b[0x31]][OxOd63b[0x45]]){ element[OxOd63b[0x31]][OxOd63b[0x45]]=t_inp_height ;} else { element[OxOd63b[0x45]]=t_inp_height ;} ;} ;} catch(x){} ;} ; element[OxOd63b[0x46]]=sel_align[OxOd63b[0x35]] ;if(Browser_IsWinIE()){ element[OxOd63b[0x31]][OxOd63b[0x47]]=sel_float[OxOd63b[0x35]] ;} else { element[OxOd63b[0x31]][OxOd63b[0x48]]=sel_float[OxOd63b[0x35]] ;} ; element[OxOd63b[0x31]][OxOd63b[0x49]]=sel_textalign[OxOd63b[0x35]] ; element[OxOd63b[0x4a]]=inp_tooltip[OxOd63b[0x35]] ;if(element[OxOd63b[0x4a]]==OxOd63b[0x0]){ element.removeAttribute(OxOd63b[0x4a]) ;} ;if(element[OxOd63b[0x40]]==OxOd63b[0x0]){ element.removeAttribute(OxOd63b[0x40]) ;} ;if(element[OxOd63b[0x41]]==OxOd63b[0x0]){ element.removeAttribute(OxOd63b[0x41]) ;} ;if(element[OxOd63b[0x41]]==OxOd63b[0x0]){ element.removeAttribute(OxOd63b[0x4e]) ;} ;if(element[OxOd63b[0x37]]==OxOd63b[0x0]){ element.removeAttribute(OxOd63b[0x37]) ;} ;if(element[OxOd63b[0x46]]==OxOd63b[0x0]){ element.removeAttribute(OxOd63b[0x46]) ;} ;if(element[OxOd63b[0x3f]]==OxOd63b[0x0]){ element.removeAttribute(OxOd63b[0x3f]) ;} ;}  ; inp_bgcolor[OxOd63b[0x29]]=function inp_bgcolor_onclick(){ SelectColor(inp_bgcolor) ;}  ; inp_bordercolor[OxOd63b[0x29]]=function inp_bordercolor_onclick(){ SelectColor(inp_bordercolor) ;}  ;if(!Browser_IsWinIE()){ Window_GetElement(window,OxOd63b[0x4f],true)[OxOd63b[0x31]][OxOd63b[0x30]]=OxOd63b[0x32] ;} ;