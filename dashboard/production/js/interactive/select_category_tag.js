function getSelectedText(elementId) {

    var elt = document.getElementById(elementId);

    if (elt.selectedIndex == -1)

        return null;

    return elt.options[elt.selectedIndex].text;

}

var _e_sel_idcat_main_tag = document.getElementsByName("sel_idcat_main_tag")[0];

_e_sel_idcat_main_tag.addEventListener("change", function(){

    var select_idcat = this.options[this.selectedIndex].value;
    //console.log(select_idcat);
    if(select_idcat > -1){
      select_category_tag(select_idcat);

    }else{
      //location.reload();
    }

});

function select_category_tag(select_idcat){

  var _csrf_token = document.getElementsByName("csrf-token")[0].getAttribute("content");

  var http = new XMLHttpRequest();

  var host = window.location.hostname;

  _idproduct = 0;
  console.log(_posttype);
  if(_posttype=='survey'||_posttype=='phone'||_posttype=='consultant'||_posttype=='custom'){
    var url = url_home + "/admin/product/categorybyid/tag/"+select_idcat+"/"+_idproduct;
  }else{
    var url = url_home + "/admin/product/categorybyid/"+_posttype+"/"+select_idcat+"/"+_idproduct;
  }
  console.log(url);
  /*var url = url_home + "/admin/ListCateByTypeId/"+_posttype+"/"+select_idcat;*/
  
  /*var params = JSON.stringify({"sel_idcategory":select_idcat});*/

  http.open("POST", url, true);

  http.setRequestHeader("X-CSRF-TOKEN", _csrf_token);

  http.setRequestHeader("Accept", "application/json");

  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  //var load = _e_frm_reg.getElementsByClassName("loading")[0];

  //load.style.display = "block";

  http.onreadystatechange = function() {
      if(http.readyState == 4 && http.status == 200) {
           var myArr = JSON.parse(this.responseText);
           var e_sel_dynamic =  document.getElementsByClassName("select_dynamic_tag")[0];
           //var e_ul =  document.getElementsByClassName("list-check")[0];
           var idcat;
           if(e_sel_dynamic){
              while (e_sel_dynamic.firstChild) {
                  e_sel_dynamic.removeChild(e_sel_dynamic.firstChild);
              }
            }
           //console.log(myArr);
           e_sel_dynamic.innerHTML = myArr;
          //load.style.display = "none";      
      }
  }
  http.send();
}