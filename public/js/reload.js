(function()
{	var fLoad = localStorage.getItem("Load");
  	console.log(fLoad);
    if(!fLoad)
    {
      localStorage.setItem("Load", "false");
      location.reload();
      console.log("reload");
    }  
    else {
      localStorage.removeItem('Load');
    }
})();