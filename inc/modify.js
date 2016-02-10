var xmlHttp = false;

function funffdivmain(url, parameters, objfocus) {
	xmlHttp = false;
	if (window.XMLHttpRequest) {
		xmlHttp = new XMLHttpRequest();
		if (xmlHttp.overrideMimeType) { xmlHttp.overrideMimeType('text/html'); }
	} else if (window.ActiveXObject) {
		try { xmlHttp = new ActiveXObject("Msxml2.XMLHTTP"); }
		catch (e) {
			try { xmlHttp = new ActiveXObject("Microsoft.XMLHTTP"); }
			catch (e) {}
		}
	}
	if (!xmlHttp) {
		alert('Cannot create XMLHTTP instance.');
		return false;
	}

	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			result = xmlHttp.responseText;
			document.getElementById("divmain").innerHTML = result;            
			// if (objfocus.length > 0) { document.getElementById(objfocus).focus(); }
		}
		else {
			document.getElementById("divmaininfo").innerHTML = "<img src=\"slices/loading.gif\">";
		}
	}
	xmlHttp.open('POST', url, true);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", parameters.length);
	// xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.send(parameters);
}

function funffdivmainwait(url, parameters) {
	xmlHttp = false;
	if (window.XMLHttpRequest) {
		xmlHttp = new XMLHttpRequest();
		if (xmlHttp.overrideMimeType) { xmlHttp.overrideMimeType('text/html'); }
	} else if (window.ActiveXObject) {
		try { xmlHttp = new ActiveXObject("Msxml2.XMLHTTP"); }
		catch (e) {
			try { xmlHttp = new ActiveXObject("Microsoft.XMLHTTP"); }
			catch (e) {}
		}
	}
	if (!xmlHttp) {
		alert('Cannot create XMLHTTP instance.');
		return false;
	}

	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			result = xmlHttp.responseText;
			document.getElementById("divmain").innerHTML = result;            
		}
		else {
			document.getElementById("divmaininfo").innerHTML = "<img src=\"slices/loading.gif\">";
			for (i=0;i<document.getElementsByTagName("button").length;i++) {
				document.getElementsByTagName("button")[i].disabled=true;
			}
			for (i=0;i<document.getElementsByTagName("input").length;i++) {
				document.getElementsByTagName("input")[i].disabled=true;
			}
			for (i=0;i<document.getElementsByTagName("select").length;i++) {
				document.getElementsByTagName("select")[i].disabled=true;
			}
		}
	}
	xmlHttp.open('POST', url, true);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", parameters.length);
	xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.send(parameters);
}

function funffdivmainsub(url, parameters, objfocus) {
	xmlHttp = false;
	if (window.XMLHttpRequest) {
		xmlHttp = new XMLHttpRequest();
		if (xmlHttp.overrideMimeType) { xmlHttp.overrideMimeType('text/html'); }
	} else if (window.ActiveXObject) {
		try { xmlHttp = new ActiveXObject("Msxml2.XMLHTTP"); }
		catch (e) {
			try { xmlHttp = new ActiveXObject("Microsoft.XMLHTTP"); }
			catch (e) {}
		}
	}
	if (!xmlHttp) {
		alert('Cannot create XMLHTTP instance.');
		return false;
	}

	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			result = xmlHttp.responseText;
			document.getElementById("divmain").innerHTML = result;            
			if (objfocus.length > 0) { document.getElementById(objfocus).focus(); }
		}
		else {
			document.getElementById("divmaininfo").innerHTML = "<img src=\"slices/loading.gif\">";
		}
	}
	xmlHttp.open('POST', url, true);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", parameters.length);
	xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.send(parameters);
}

function funffdivmainsubdatepicker(url, parameters, objfocus, objdp) {
	xmlHttp = false;
	if (window.XMLHttpRequest) {
		xmlHttp = new XMLHttpRequest();
		if (xmlHttp.overrideMimeType) { xmlHttp.overrideMimeType('text/html'); }
	} else if (window.ActiveXObject) {
		try { xmlHttp = new ActiveXObject("Msxml2.XMLHTTP"); }
		catch (e) {
			try { xmlHttp = new ActiveXObject("Microsoft.XMLHTTP"); }
			catch (e) {}
		}
	}
	if (!xmlHttp) {
		alert('Cannot create XMLHTTP instance.');
		return false;
	}

	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			result = xmlHttp.responseText;
			document.getElementById("divmain").innerHTML = result;            
			if (objfocus.length > 0) { document.getElementById(objfocus).focus(); }
			if (objdp.length > 0) {
				var form_elements;
				var x;
				for (x in objdp) {
					if (objdp[x] instanceof Array) {
						try { datePickerController.destroyDatePicker(objdp[x][0]); }
						catch (e) { }

						form_elements = {};
						form_elements[objdp[x][0]] = '%d';
						form_elements[objdp[x][1]] = '%m';
						form_elements[objdp[x][2]] = '%Y';
						
						datePickerController.createDatePicker({ 
							formElements: form_elements
						});
					} else {
						try { datePickerController.destroyDatePicker(objdp[x]); }
						catch (e) { }
			   
						form_elements = {};
						form_elements[objdp[x]] = '%d-%m-%Y';
					   
						datePickerController.createDatePicker({ 
							formElements: form_elements
						});
					}
				}
			}
		}
		else {
			document.getElementById("divmaininfo").innerHTML = "<img src=\"slices/loading.gif\">";
		}
	}
	xmlHttp.open('POST', url, true);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", parameters.length);
	xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.send(parameters);
}

function funffdivmainlilbox(url, parameters, objfocus) {
	xmlHttp = false;
	if (window.XMLHttpRequest) {
		xmlHttp = new XMLHttpRequest();
		if (xmlHttp.overrideMimeType) { xmlHttp.overrideMimeType('text/html'); }
	} else if (window.ActiveXObject) {
		try { xmlHttp = new ActiveXObject("Msxml2.XMLHTTP"); }
		catch (e) {
			try { xmlHttp = new ActiveXObject("Microsoft.XMLHTTP"); }
			catch (e) {}
		}
	}
	if (!xmlHttp) {
		alert('Cannot create XMLHTTP instance.');
		return false;
	}

	xmlHttp.onreadystatechange = function() {
		if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
			result = xmlHttp.responseText;
			document.getElementById("divmainlilbox").innerHTML = result;            
			var A = document.getElementById("divmainlilbox");
			var C = window.innerWidth;
			var D = window.innerHeight;
			A.style.display = 'block';
			A.style.position = 'absolute';
			if (A.style.opacity < 1) { funfadedinlilbox(0); }
			var elementWidth = A.clientWidth;
			var elementHeight = A.clientHeight;
			if (elementHeight < D) { A.style.position = 'fixed'; A.style.top = String(Math.round((D-elementHeight)/2))+"px"; }
			else { A.style.position = 'absolute'; A.style.top = String(Math.round((elementHeight-D)/2))+"px"; }
			A.style.left = String(Math.round((C-elementWidth)/2))+"px";
			if (objfocus.length > 0) { document.getElementById(objfocus).focus(); }
}
		else {
			document.getElementById("divmaininfo").innerHTML = "<img src=\"slices/loading.gif\">";
		}
	}
	xmlHttp.open('POST', url, true);
	xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlHttp.setRequestHeader("Content-length", parameters.length);
	xmlHttp.setRequestHeader("Connection", "close");
	xmlHttp.send(parameters);
}

function funconfirmdelete(url, parameters, info) {
	xmlHttp = false;
	if (window.XMLHttpRequest) {
		xmlHttp = new XMLHttpRequest();
		if (xmlHttp.overrideMimeType) { xmlHttp.overrideMimeType('text/html'); }
	} else if (window.ActiveXObject) {
		try { xmlHttp = new ActiveXObject("Msxml2.XMLHTTP"); }
		catch (e) {
			try { xmlHttp = new ActiveXObject("Microsoft.XMLHTTP"); }
			catch (e) {}
		}
	}
	if (!xmlHttp) {
		alert('Cannot create XMLHTTP instance.');
		return false;
	}

	var confirmdelete=confirm(info);
	if (confirmdelete) {
		xmlHttp.onreadystatechange = function() {
			if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
				result = xmlHttp.responseText;
				document.getElementById("divmain").innerHTML = result;            
			}
			else {
				document.getElementById("divmaininfo").innerHTML = "<img src=\"slices/loading.gif\">";
			}
		}
		xmlHttp.open('POST', url, true);
		xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlHttp.setRequestHeader("Content-length", parameters.length);
		xmlHttp.setRequestHeader("Connection", "close");
		xmlHttp.send(parameters);
	}
}

function funredirect(pagename) {
	document.location.href=pagename;
}

function funconfirmsubmit(name,info) {
	document.getElementById("divmaininfo").innerHTML='<img src=\'slices/loading.gif\'>'; 
	var confirmsubmit=confirm(info);
	if (confirmsubmit) { return true; }
	else { document.getElementById("divmaininfo").innerHTML=null; return false; }
}


function funfadedinlilbox(op) {
	var ele = document.getElementById("divmainlilbox");
	fadein_opacity = op+0.2;
	op=fadein_opacity;
	ele.style.opacity = fadein_opacity;
	if (op>=1) { clearTimeout(0); }
	else { setTimeout("funfadedinlilbox("+op+")", 1); }
}

function funfadedoutlilbox(op) {
	var ele = document.getElementById("divmainlilbox");
	fadeout_opacity = op-0.2;
	op=fadeout_opacity;
	ele.style.opacity = fadeout_opacity;
	if (op<=0) { clearTimeout(0); }
	else { setTimeout("funfadedoutlilbox("+op+")", 1); }
}


var isCtrl = false; var isAlt = false;
document.onkeyup=function(e) {
	if(e.which == 17) isCtrl=false;
	if(e.which == 18) isAlt=false;
}
document.onkeydown=function(e) {
	if (e.which == 17) isCtrl=true;
	if (e.which == 18) isAlt=true;
	if (e.which == 13 && isCtrl == true) {
		document.getElementsByTagName("form")[0].submit();
		return false;
	}
	if (e.which == 27) {
		document.getElementById("divkembali").click();
		return false;
	}
	if (e.which == 80 && isCtrl == true && isAlt == true) {
		if (document.getElementById('namtdrightpanel').style.display==''||document.getElementById('namtdrightpanel').style.display=='block') {
			document.getElementById('namtdrightpanel').style.display='none';
		}
		else {
			document.getElementById('namtdrightpanel').style.display='block';
		}
		return false;
	}
}

function funwowwindow(wowurl,wowtujuan) 
{ 
     window.open(wowurl,wowtujuan,"width=750","height=1200","scrollbars=yes"); 
} 

function funjangkarkamera(objjangkar) { 
	document.getElementById(objjangkar).focus();
}
