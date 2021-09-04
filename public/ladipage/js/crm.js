function extractHostname(url) {
    var hostname;
    if (url.indexOf("//") > -1) {
        hostname = url.split('/')[2];
    }
    else {
        hostname = url.split('/')[0];
    }
    //find & remove port number
    hostname = hostname.split(':')[0];
    //find & remove "?"
    hostname = hostname.split('?')[0];
    return hostname;
}
//
function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function reachform(element){
  //var eparent = element.parentElement;
  var countdown = 100;
  var eparent = element;
  var frm = eparent.getElementsByTagName("form")[0];
  while(!frm && countdown > 0){
    eparent = eparent.parentElement;
    frm = eparent.getElementsByTagName("form")[0];
    countdown = countdown -1;
  }
  //setTimeout(function(){ return frm; },10000);
  return frm;
}
var countfind = 60;
var exist_e_newsletter_form = setInterval(function() {
  var e_btn_register = document.getElementsByClassName('btn-register-api');
      if(e_btn_register) {
           for (var i = 0; i < e_btn_register.length; i++) {
            e_btn_register[i].addEventListener("click",regform_api);
            disablebutton(e_btn_register[i]);
          }
          clearInterval(exist_e_newsletter_form);
      }else if(countfind > 0){
         countfind = countfind -1;
      }else{
        clearInterval(exist_e_newsletter_form);
      }  
   }, 100);
//button api
function disablebutton(element){
    var frm = reachform(element);
    if(!frm) return false;
    var ebutton = frm.getElementsByTagName("button");
    for (var i = 0; i < ebutton.length; i++) {
      if(ebutton[i].type == 'submit'){
        ebutton[i].setAttribute("type", "button");
      }
    }
}
function resetform(frm){
  if(!frm) return false;
    var ename = frm.getElementsByTagName("input");
    var _lastname='',_firstname='',_phone='',_email='',_address='';
    if(ename){
      for (var i = 0; i < ename.length; i++) {
        if(ename[i].name == 'lastname'){
            ename[i].value ='';
        }else if(ename[i].name == 'firstname'){
            ename[i].value='';
        }else if(ename[i].name == 'name'){
            ename[i].value='';
        }else if(ename[i].name == 'phone'){
            ename[i].value='';
        }else if(ename[i].name == 'email'){
            ename[i].value='';
        }else if(ename[i].name == 'address'){
            ename[i].value='';
        }else if(ename[i].name == 'date1'){
            ename[i].value = '';
        }else if(ename[i].name == 'date2'){
           ename[i].value = '';
        }
      } 
    }  
    var eselsevice = frm.getElementsByTagName("select");
    var _sel_course='',_sel_nation ='';
    if(eselsevice){
        for (var i = 0; i < eselsevice.length; i++) {
        if(eselsevice[i].name == 'branch'){
           eselsevice[i].value = 0;
        }
         if(eselsevice[i].name == 'sex'){
           eselsevice[i].value = 0;
        }
      }
    } 
    var ecomment = frm.getElementsByTagName("textarea");
    var _comment='';
    if(ecomment){
      for (var i = 0; i < ecomment.length; i++) {
        if(ecomment[i].name == 'note'){
            ecomment[i].value = '';
        }
      }
    } 
}
function validateEmail(email) {
    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
//register API
var checkedValue = '';
function regform_api(){
  var frm = reachform(this);
  if(!frm) return false;
    var ename = frm.getElementsByTagName("input");
    var _lastname = '', _firstname = '', _phone = '', _email = '', _address = '', _spreadsheetid = '', _sex = 0, _date1 = '', _date2 = '';
    if(ename){
      for (var i = 0; i < ename.length; i++) {
        if(ename[i].name == 'lastname'){
            _lastname = ename[i].value;
            if(!_lastname){
                ename[i].style.borderColor = "red";
                //ename[i].innerHTML = "Vui lòng nhập họ tên";
                return false;
            }
        }
        else if(ename[i].name == 'firstname'){
          _firstname = ename[i].value;
          if(!_firstname){
                ename[i].style.borderColor = "red";
                //ename[i].innerHTML = "Vui lòng nhập họ tên";
                return false;
            }
        }else if(ename[i].name == 'name'){
          _firstname = ename[i].value;
          if(!_firstname){
                ename[i].style.borderColor = "red";
                //ename[i].innerHTML = "Vui lòng nhập họ tên";
                return false;
            }
        }else if(ename[i].name == 'phone'){
            _phone = ename[i].value;
              var pattern = /[0-9]{10}$/;
              var _test = pattern.test(_phone);
              if(!_test) {
                alert('Số điện thoại không hợp lệ');
                return false;
              }
 
          }
          else if(ename[i].name == 'email'){
              _email = ename[i].value;
              if(_email){
                var _test = validateEmail(_email);
                 if(!_test){
                     alert('Email không hợp lệ');
                     return false;
                 }
              }
          }else if(ename[i].name == 'address'){
              _address = ename[i].value;
          }
          else if(ename[i].name == 'spreadsheetid'){
            _spreadsheetid = ename[i].value;
          }else if(ename[i].name == 'date1'){
            _date1 = ename[i].value;
          }else if(ename[i].name == 'date2'){
            _date2 = ename[i].value;
          }
      } 
    }  
    var eselsevice = frm.getElementsByTagName("select");
    var _sel_branch = '', _sel_sex = '';
    if(eselsevice){
        for (var i = 0; i < eselsevice.length; i++) {
          if(eselsevice[i].name == 'branch'){
             _sel_branch = eselsevice[i].options[eselsevice[i].selectedIndex].text;
          }
          if(eselsevice[i].name == 'sex'){
             _sel_sex = eselsevice[i].options[eselsevice[i].selectedIndex].text;
          }
      }
    } 
    var ecomment = frm.getElementsByTagName("textarea");
    var _comment='';
    if(ecomment){
      for (var i = 0; i < ecomment.length; i++) {
        if(ecomment[i].name == 'note'){
            _comment = ecomment[i].value;
        }
      }
    }
    _url = document.URL;
    var _host = extractHostname(_url);
    var _ticket_comment = _url + "<br>Nội dung: "+ _comment + "<br>"+"sex:"+_sel_sex+"<br>Đặt lịch ngày: " + _date1 +":" +_date2+'<br>Chi nhánh: '+ _sel_branch;
    var e_popup_processing = document.getElementsByClassName('htz-popup-processing')[0];
    e_popup_processing.style.display ='block';
    e_popup_processing.style.zIndex = "99999999999";
    var xhr = new XMLHttpRequest();
    var params = JSON.stringify({
        "option": {
          "spreadsheetid": _spreadsheetid,
          "formspread": 1,
        },
        "data": {
          "url": _host,
          "time": _date1 +":" +_date2,
          "email":  _email,
          "phone": _phone,
          "sex":  _sel_sex,
          "name": _firstname,
          "branch": _sel_branch,
          "note": _comment
        }
      });
    console.log(params);
    var url = 'https://ticmedi.tech/api/customer/consultants';
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
            resetform(frm);
            setTimeout(function(){
                e_popup_processing.style.display ='none';
              },6000);
          }
    }
    xhr.send(params);
}
//cookie
function isRealValues(obj){
   return obj && obj !== 'null' && obj !== 'undefined';
}

function deleteCookie(cookiename){
      var d = new Date();
      d.setDate(d.getDate() - 1);
      var expires = ";expires="+d;
      var name=cookiename;
      //alert(name);
      var value="";
      document.cookie = name + "=" + value + expires + "; path=/";                    
  }
function setCookie(cname,cvalue,exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function setCookieHours(cname,cvalue,hours) {
    var d = new Date();
    d.setTime(d.getTime() + (hours*60*60*1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function countdown(){
  var initdate = new Date().getTime();
  var countDownDate = new Date(initdate + 3*60000);
  
  // Update the count down every 1 second
  var x = setInterval(function() {
    // Get todays date and time
    var now = new Date().getTime();
    // Find the distance between now and the count down date
    var distance = countDownDate - now;
    if (distance < 0) {
      clearInterval(x);
      _e_modal_consultant.style.display = "none";
      setCookieHours('popup_promo',1,0.84);
    }
  }, 1000);
}
//end cookie

function hasClass(element, className) {
    return (' ' + element.className + ' ').indexOf(' ' + className+ ' ') > -1;
}
var countfind = 60;
var exist_btn_popup = setInterval(function() {
  var e_btn_popup = document.getElementsByClassName('btn-popup');
      if(e_btn_popup) {
          //console.log(e_btn_popup);
           for (var i = 0; i < e_btn_popup.length; i++) {
            e_btn_popup[i].addEventListener("click",function(){
                 var e_modal_consult = document.getElementsByClassName('htz-popup-api')[0];
                 e_modal_consult.style.display = "block";
                 console.log(this);
            });
          }
          clearInterval(exist_btn_popup);
      }else if(countfind > 0){
         countfind = countfind -1;
      }else{
        clearInterval(exist_btn_popup);
      }  
   }, 100);
// var e_btn_popup = document.getElementsByClassName('btn-popup');
// if (typeof(e_btn_popup) != 'undefined' && e_btn_popup != null){
//   for (var i = 0; i < e_btn_popup.length; i++) {
//     e_btn_popup[i].addEventListener("click", function(){
       
//       var e_modal_consult = document.getElementsByClassName('htz-popup-api')[0];
//       e_modal_consult.style.display = "block";
//     });
//   }
// }
function popupform(){
  var e_modal_consult = document.getElementsByClassName('htz-popup-api')[0];
  e_modal_consult.style.display = "block";
}

var e_btn_close = document.getElementsByClassName('close');
if (typeof(e_btn_close) != 'undefined' && e_btn_close != null){
  for (var i = 0; i < e_btn_close.length; i++) {
    e_btn_close[i].addEventListener("click",closeform);
  }
}
function closeform(){
  var e_modal_consult = document.getElementsByClassName('htz-popup-api')[0];
  e_modal_consult.style.display = "none";
}