function getSelectedText(elementId) {

    var elt = document.getElementById(elementId);

    if (elt.selectedIndex == -1)

        return null;

    return elt.options[elt.selectedIndex].text;

}

var _e_sel_idcat_main = document.getElementsByName("sel_idcat_main")[0];

_e_sel_idcat_main.addEventListener("change", function(){

    var select_idcat = this.options[this.selectedIndex].value;
    if(select_idcat > -1){
      var e_sel_namecate = document.getElementsByName("sel_id_post_type")[0];
      var _sel_namecat = e_sel_namecate.options[e_sel_namecate.selectedIndex].text;
      var _sel_value_cat = e_sel_namecate.options[e_sel_namecate.selectedIndex].value;
	  var namecat = 'post';
	  /*if(_sel_value_cat > 0){
          namecat = _sel_namecat;
      }*/
	  if(_posttype =='custom' || _posttype == 'survey'||_posttype == 'phone'||_posttype == 'consultant'){
		  namecat = 'survey';  
	  }else if(_posttype =='product'){
		  namecat = 'product';
	  }
      console.log(select_idcat,namecat);
	  select_category_filter(select_idcat,namecat);
    }

});

function select_category_filter(select_idcat,namecat){

  var _csrf_token = document.getElementsByName("csrf-token")[0].getAttribute("content");

  var http = new XMLHttpRequest();

  var host = window.location.hostname;

  var url = url_home + "/admin/LstcatebyIdcate/"+namecat+"/"+select_idcat;
 
  var params = JSON.stringify({"sel_idcategory":select_idcat});

  http.open("POST", url, true);

  http.setRequestHeader("X-CSRF-TOKEN", _csrf_token);

  http.setRequestHeader("Accept", "application/json");

  http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  //var load = _e_frm_reg.getElementsByClassName("loading")[0];

  //load.style.display = "block";

  http.onreadystatechange = function() {
      if(http.readyState == 4 && http.status == 200) {
           var myArr = JSON.parse(this.responseText);
           /*console.log(myArr);*/
           var e_sel_dynamic =  document.getElementsByClassName("select_dynamic")[0];
           //var e_ul =  document.getElementsByClassName("list-check")[0];
           var idcat;
           if(e_sel_dynamic){
              while (e_sel_dynamic.firstChild) {
                  e_sel_dynamic.removeChild(e_sel_dynamic.firstChild);
              }
            }
           e_sel_dynamic.innerHTML = myArr;
          //load.style.display = "none";      
      }
  }
  http.send(params);
}
var e_sel_dynamic = document.getElementsByClassName('select_dynamic')[0];
window.addEventListener('click', function(e){
  var e_sel_list = document.getElementsByClassName('sel-list')[0];
  if(!e_sel_list) return false;
  if (e_sel_dynamic.contains(e.target)){
     e_sel_list.style.display = "block";
     e_sel_list.style.overflow = "scroll";
  } else{
     e_sel_list.style.display = "none";
     e_sel_list.style.overflow = "hidden";
  }
});