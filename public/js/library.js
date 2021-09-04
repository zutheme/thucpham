function extractHostname(url) {
  var hostname;

  if (url.indexOf("//") > -1) {
    hostname = url.split('/')[2];
  } else {
    hostname = url.split('/')[0];
  } //find & remove port number

  hostname = hostname.split(':')[0]; //find & remove "?"

  hostname = hostname.split('?')[0];
  return hostname;
}
function call(){
	var e_popup_processing = document.getElementsByClassName('htz-popup-calling')[0];
    e_popup_processing.style.display ='block';
    e_popup_processing.style.zIndex = "99999999999";
	var url = 'https://ticmedi.tech/api/middleladicon';
    xhr.open("POST", url, true);
    xhr.withCredentials = true;
    xhr.setRequestHeader("Accept", "application/json");
    xhr.setRequestHeader('Content-Type', 'application/json');
    //xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () { 
        if (xhr.readyState == 4 && xhr.status == 200) {
            var data = JSON.parse(xhr.responseText);
            console.log(data);
            e_popup_processing.getElementsByClassName('result')[0].style.paddingTop = "25%";
            e_popup_processing.getElementsByClassName("loading")[0].style.display ="none";
            e_popup_processing.getElementsByClassName('processing')[0].style.backgroundColor="white"; 
            if(data.result > 0){
                e_popup_processing.getElementsByClassName('result')[0].innerHTML ="Cảm ơn bạn đã đăng ký tư vấn";
                e_popup_processing.getElementsByClassName('checked-img')[0].style.display ="block";
            }else {
                e_popup_processing.getElementsByClassName('result')[0].innerHTML = data.desc;
                e_popup_processing.getElementsByClassName('checked-img')[0].style.display ="none";
            }
            
            setTimeout(function(){
                e_popup_processing.style.display ='none';
              },6000);
          }
    }
    xhr.send(params);
}
var e_phone = document.getElementsByClassName('btn-phone');

for (var i = 0; i < e_phone.length; i++) {
  e_phone[i].addEventListener("click",function(){
	makeAJAXCall(this);
  });
}
function makeAJAXCall(element){
	var _e_parent = element;
	var _idposttype = _e_parent.getAttribute("idposttype");
	var _idparent = _e_parent.getAttribute("idparent");
	var _idcrosstype = _e_parent.getAttribute("idcrosstype");
	var _phone = _e_parent.getAttribute("phone");
	var _sip = _e_parent.getAttribute("sip");
	
	var _csrf_token = document.getElementsByName("csrf-token")[0].getAttribute("content");
    var xhr = new XMLHttpRequest();
    var url = url_home+"/makecall";
    var params = JSON.stringify({"phone":_phone, "sip":_sip, "idposttype":_idposttype, "idparent":_idparent, "idcrosstype":_idcrosstype });
	/*process calling*/
	// let _url_void = "https://dial.voip24h.vn/dial?voip=cd04541cb559605e43dd3477efd4ed71cb210513&secret=0d8b5e9c715a36b66df4fab547712410";
	// _url_void = _url_void + '&sip='+_sip+'&phone='+_phone;
	call( _sip, _phone );
	return false;
	
	/*end calling*/
    xhr.open("POST", url, true);
    xhr.setRequestHeader("X-CSRF-TOKEN", _csrf_token);
    xhr.setRequestHeader("Accept", "application/json");
    xhr.setRequestHeader('Content-Type', 'application/json');
    /*xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");*/
	
	var e_popup_processing = document.getElementsByClassName('htz-popup-calling')[0];
    e_popup_processing.style.display ='block';
    e_popup_processing.style.zIndex = "99999999999";
	
    xhr.onreadystatechange = function() {
        if(xhr.readyState == 4 && xhr.status == 200) {
        	var data = JSON.parse(xhr.responseText);
            console.log(data);
            e_popup_processing.getElementsByClassName('result')[0].style.paddingTop = "25%";
            e_popup_processing.getElementsByClassName("loading")[0].style.display ="none";
            e_popup_processing.getElementsByClassName('processing')[0].style.backgroundColor="white"; 
            if(data.result > 0){
                e_popup_processing.getElementsByClassName('result')[0].innerHTML ="Cảm ơn bạn đã đăng ký tư vấn";
                e_popup_processing.getElementsByClassName('checked-img')[0].style.display ="block";
            }else {
                e_popup_processing.getElementsByClassName('result')[0].innerHTML = data.desc;
                //e_popup_processing.getElementsByClassName('checked-img')[0].style.display ="none";
            }
            
            setTimeout(function(){
                e_popup_processing.style.display ='none';
              },6000);     
        }
    }
    xhr.send(params);
    console.log("request sent to the server");
 }
 function call( _sip, _phone ){   
	var xhr = new XMLHttpRequest();
	//xhr.withCredentials = true;
	xhr.addEventListener("readystatechange", function() {
	  if(this.readyState === 4) {
		var data = JSON.parse(this.responseText);
		console.log(data);
	  }
	});
	//var _sip = '330', _phone = '0967655819';
	var str_phone = "&sip="+_sip+"&phone="+_phone;
	/*console.log(str_phone);*/
	xhr.open("GET", "https://dial.voip24h.vn/dial?voip=eea45972e0819fb383ac282a45dcd1cdba424cb3&secret=e28652d54d5e6621232c7addf4821923"+str_phone, true);
	
	xhr.send();
 }