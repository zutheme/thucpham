
var initloadyoutube = false;
var index_play1 = 0;
var _play_ready1 = false;
var _api_ready = false;
/*var playlist1 = ['LU4JRq7Pl8Q'];*/
var playlist1 = [];
playlist1.push(htz_config.idvideo);

var index_play2 = 0;
var _play_ready2 = false;
var _api_ready = false;
/*var playlist1 = ['LU4JRq7Pl8'];*/
var playlist2 = [];
playlist2.push(htz_config.idvideo2);
var index_play4 = 0;
var _play_ready4 = false;
var playlist4 = [];
playlist4.push(htz_config.idvideo4);

var initloadyoutube = false;
var index_play5 = 0;
var _play_ready5 = false;
var _api_ready = false;
var countfind = 20;

var _e_video_container;
var player1;
var player2;
var player3;
var player4;
var player5;
var _width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
var _height = (window.innerHeight > 0) ? window.innerHeight : screen.height;
_height = 0.6*_height;
//var team_img = document.getElementsByClassName("team_img")[0];
//var _h_video = team_img.offsetHeight;
//var maxHeightvideo = _height*0.8;
var maxHeightvideo = 425;


//video 2
_e_video_container2 = document.getElementsByClassName("container-video2")[0];
var maxHeightvideo2 = _e_video_container2.offsetHeight;
if(_width < 768){
  maxHeightvideo2 = 360;
}else{
  maxHeightvideo2 = maxHeightvideo2*0.7;
  if(maxHeightvideo2 < 300) {
      maxHeightvideo2 = 310;
  }
}
//end video 2

//video 5
_e_video_container5 = document.getElementsByClassName("container-video5")[0];
var maxHeightvideo5 = _e_video_container5.offsetHeight;
if(_width < 768){
  maxHeightvideo5 = 360;
}else{
  maxHeightvideo5 = maxHeightvideo5*0.55;
  if(maxHeightvideo5 < 300) {
      maxHeightvideo5 = 640;
  }
}
//2. This code loads the IFrame Player API code asynchronously.
function inityoutube(){
      
      var tag = document.createElement('script');
      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
       window.onYouTubeIframeAPIReady = function(events) {
        
        //if(_width > 768){
          player2 = new YT.Player('player2', {

            height: maxHeightvideo2,

            width: '100%',

            //playerVars: { 'autoplay': 2, 'controls': 0 },
            //videoId: htz_config.idvideo,
            
            playerVars: {
              autohide: 1,
              autoplay: 0,
              wmode:'opaque',
              color: 'white', 
              /*origin:'http://localhost/studyabroad/',*/
              rel: 0,

              controls:0,
              fs : 0,
              playsinline : 1,
              
              playlist: playlist2.join(','),

            },

            events: {

              'onReady': onPlayerReady2

              //'onStateChange': onPlayerStateChanges2

            }
          });
        //}
       
        player3 = new YT.Player('player3', {
          height: maxHeightvideo,
          width: '100%',
          playerVars: {
            autohide: 2,
            autoplay: 0,
            wmode:'opaque',
            color: 'white', 
            origin:'*',
            rel: 0,

            controls:0,
            fs : 0,
            playsinline : 2,
            
            playlist: playlist3.join(','),

          },

          events: {

            'onReady': onPlayerReady3

            //'onStateChange': onPlayerStateChanges2

          }
        }); 
          
       

         //video 5
          player5 = new YT.Player('player5', {
          height: maxHeightvideo5,
          width: '100%',
          //playerVars: { 'autoplay': 1, 'controls': 0 },
          // videoId: htz_config.idvideo,
          playerVars: {
            autohide: 1,
            autoplay: 0,
            wmode:'opaque',
            color: 'white', 
            origin:'*',
            rel: 0,
            controls:0,
            fs : 0,
            playsinline : 1,            
            playlist: playlist5.join(','),
          },
          events: {
            'onReady': onPlayerReady5
            //'onStateChange': onPlayerStateChanges1
          }
        });
    }  
}

      var previousIndex1 = 0;


      // 4. The API will call this function when the video player is ready.

      function onPlayerReady1(event) {

        //event.target.playVideo();
        _play_ready1 = true;
        index_play1 = 0;

      }

      // 5. The API calls this function when the player's state changes.

      //    The function indicates that when playing a video (state=1),

      //    the player should play for six seconds and then stop.

      var done = false;

      

      function  onPlayerStateChanges1(event) {

        if (event.data == YT.PlayerState.PLAYING && !done) {

          setTimeout(stopVideo1, 6000);

          done = true;

        }

        if(event.data == -1 || event.data == 0) {

                    // get current video index

                    var index = player1.getplaylistIndex();

                    var le = player1.getplaylist().length-1;

                    // update when playlist1s do not match

                    if(player1.getplaylist().length != playlist1.length) {

                        // update playlist1 and start playing at the proper index

                        player1.loadplaylist(playlist1, previousIndex1+1);

                    }

                    /*

                    keep track of the last index we got

                    if videos are added while the last playlist1 item is playing,

                    the next index will be zero and skip the new videos

                    to make sure we play the proper video, we use "last index + 1"

                    */

                    //console.log(player.getplaylist1().length+","+playlist1.length);

                    previousIndex1 = index;

                }

    }

    function stopVideo1() {

        player1.stopVideo();

    }

    function pauseVideo1(){

      player1.pauseVideo();

    }

 

    function play_index1(index) {
        player1.playVideo();
        //player1.playVideoAt(0);        
    }

 var _e_container_player1 = document.getElementsByClassName("video-player")[0];
 var _stateplay1 = 0;
 var rect1,height=0;
 function scrollplay1(){
        if(!_e_container_player1) return false;
        if(index_play1 < 0 ){
            return false;
        }    
        rect1 = _e_container_player1.getBoundingClientRect();
        if(_play_ready1){
            _stateplay1 = player1.getPlayerState();
            //console.log(_stateplay1);
        }
        
        height = window.innerHeight;
        if(rect1.top < 0 || rect1.bottom > height && initloadyoutube){
             //e_bgimg.style.display = "none";
             
              //if(_stateplay1 > 0){
                  pauseVideo1();
                  //console.log('pause');
                //}
        }else{
            if(!initloadyoutube){
              inityoutube();
              initloadyoutube = true;
            }else{
              //if(_stateplay1 == 1||_stateplay1 == 2){
                  play_index1(index_play1);
                  //console.log('play');
                //}
            }  
        }
}
window.addEventListener("scroll", scrollplay1,false);     
//----------------video 2--------------

 var previousIndex2 = 0;


      // 4. The API will call this function when the video player is ready.

      function onPlayerReady2(event) {

        /*event.target.playVideo();*/
        _play_ready2 = true;
        index_play2 = 0;

      }

      // 5. The API calls this function when the player's state changes.

      //    The function indicates that when playing a video (state=2),

      //    the player should play for six seconds and then stop.

      var done = false;

      

      function  onPlayerStateChanges2(event) {

        if (event.data == YT.PlayerState.PLAYING && !done) {

          setTimeout(stopVideo2, 6000);

          done = true;

        }

        if(event.data == -1 || event.data == 0) {

                    // get current video index

                    var index = player2.getplaylistIndex();

                    var le = player2.getplaylist().length-1;

                    // update when playlist2s do not match

                    if(player2.getplaylist().length != playlist2.length) {

                        // update playlist2 and start playing at the proper index

                        player2.loadplaylist(playlist2, previousIndex2+1);

                    }

                    /*

                    keep track of the last index we got

                    if videos are added while the last playlist2 item is playing,

                    the next index will be zero and skip the new videos

                    to make sure we play the proper video, we use "last index + 2"

                    */

                    //console.log(player.getplaylist2().length+","+playlist2.length);

                    previousIndex2 = index;

                }

    }

    function stopVideo2() {

        player2.stopVideo();

    }

    function pauseVideo2(){

      player2.pauseVideo();

    }

 

    function play_index2(index) {
        player2.playVideo();
        //player.playVideoAt(index);        

    }

 var _e_container_player2 = document.getElementsByClassName("video-player-2")[0];
 
 var _stateplay2 = 0;
 var rect2,height=0;
 function scrollplay2(){
        if(_width < 768) return false;
        if(!_e_container_player2) return false;
        if(index_play2 < 0 ){
            return false;
        }    
        rect2 = _e_container_player2.getBoundingClientRect();
        if(_play_ready2){
            _stateplay2 = player2.getPlayerState();
            //console.log(_stateplay2);
        }
        
        height = window.innerHeight;
        if(rect2.top < 0 || rect2.bottom > height && initloadyoutube){
             //e_bgimg.style.display = "none";
             
              if(_stateplay2 > 0){
                  pauseVideo2();
                  //console.log('pause');
                }
        }else{
            if(!initloadyoutube){
              //console.log('initloadyoutube');
              inityoutube();
              initloadyoutube = true;
            }else{
              //if(_stateplay2 == 2||_stateplay2 == 2){
                  play_index2(index_play2);
                  //console.log('play');
                //}
            }  
        }
}
window.addEventListener("scroll", scrollplay2,false);     
   
//video client

//----------------video 3--------------
var previousIndex3 = 0;
var index_play3 = 0;
var _play_ready3 = 0;
      // 4. The API will call this function when the video player is ready.

      function onPlayerReady3(event) {

        /*event.target.playVideo();*/
        _play_ready3 = true;
        index_play3 = 0;

      }

      // 5. The API calls this function when the player's state changes.

      //    The function indicates that when playing a video (state=2),

      //    the player should play for six seconds and then stop.

      var done = false;

      

      function  onPlayerStateChanges3(event) {

        if (event.data == YT.PlayerState.PLAYING && !done) {

          setTimeout(stopVideo3, 6000);

          done = true;

        }

        if(event.data == -1 || event.data == 0) {

                    // get current video index

                    var index = player3.getplaylistIndex();

                    var le = player3.getplaylist().length-1;

                    // update when playlist3s do not match

                    if(player3.getplaylist().length != playlist3.length) {

                        // update playlist3 and start playing at the proper index

                        player3.loadplaylist(playlist3, previousIndex3+1);

                    }

                    /*

                    keep track of the last index we got

                    if videos are added while the last playlist3 item is playing,

                    the next index will be zero and skip the new videos

                    to make sure we play the proper video, we use "last index + 2"

                    */

                    //console.log(player.getplaylist3().length+","+playlist3.length);

                    previousIndex3 = index;

                }

    }

    function stopVideo3() {

        player3.stopVideo();

    }

    function pauseVideo3(){

      player3.pauseVideo();

    }

 

    function play_Index3(index) {
        player3.playVideo();
        //player.playVideoAt(index);        

    }
 
 var _e_container_player3 = document.getElementsByClassName("video-player-3")[0];
 
 var _stateplay3 = 0;
 var rect3,height=0;
 function scrollplay3(){
        if(!_e_container_player3) return false;
        if(index_play3 < 0 ){
            return false;
        }    
        rect3 = _e_container_player3.getBoundingClientRect();
        if(_play_ready3){
            _stateplay3 = player3.getPlayerState();
            //console.log(_stateplay3);
        }
        
        height = window.innerHeight;
        if(rect3.top < 0 || rect3.bottom > height && initloadyoutube){
             //e_bgimg.style.display = "none";
             
              if(_stateplay3 > 0){
                  //pauseVideo3();
                  //console.log('pause');
                }
        }else{
            if(!initloadyoutube){
              //console.log('initloadyoutube3');
              inityoutube();
              initloadyoutube = true;
            }else{
              //if(_stateplay3 == 2||_stateplay3 == 2){
                  play_Index3(index_play3);
                  //console.log('play');
                //}
            }  
        }
}
window.addEventListener("scroll", scrollplay3,false);
//video 4
      var previousIndex4 = 0;
      // 4. The API will call this function when the video player is ready.

      function onPlayerReady4(event) {

        //event.target.playVideo();
        _play_ready4 = true;
        index_play4 = 0;

      }

      // 5. The API calls this function when the player's state changes.

      //    The function indicates that when playing a video (state=4),

      //    the player should play for six seconds and then stop.

      var done = false;
      function  onPlayerStateChanges4(event) {

        if (event.data == YT.PlayerState.PLAYING && !done) {

          setTimeout(stopVideo4, 6000);

          done = true;

        }

        if(event.data == -1 || event.data == 0) {

                    // get current video index

                    var index = player4.getplaylistIndex();

                    var le = player4.getplaylist().length-1;

                    // update when playlist4s do not match

                    if(player4.getplaylist().length != playlist4.length) {

                        // update playlist4 and start playing at the proper index

                        player4.loadplaylist(playlist4, previousIndex4+1);

                    }

                    /*

                    keep track of the last index we got

                    if videos are added while the last playlist4 item is playing,

                    the next index will be zero and skip the new videos

                    to make sure we play the proper video, we use "last index + 4"

                    */

                    //console.log(player.getplaylist4().length+","+playlist4.length);

                    previousIndex4 = index;

                }

    }

    function stopVideo4() {

        player4.stopVideo();

    }

    function pauseVideo4(){

      player4.pauseVideo();

    }

 

    function play_index4(index) {
        player4.playVideo();
        //player4.playVideoAt(0);        
    }

 var _e_container_player4 = document.getElementsByClassName("video-player-4")[0];
 var _stateplay4 = 0;
 var rect4,height=0;
 function scrollplay4(){
        if(!_e_container_player4) return false;
        if(index_play4 < 0 ){
            return false;
        }    
        rect4 = _e_container_player4.getBoundingClientRect();
        if(_play_ready4){
            _stateplay4 = player4.getPlayerState();
            //console.log(_stateplay4);
        }
        
        height = window.innerHeight;
        if(rect4.top < 0 || rect4.bottom > height && initloadyoutube){
             //e_bgimg.style.display = "none";
             
              if(_stateplay4 > 0){
                  pauseVideo4();
                  //console.log('pause');
                }
        }else{
            if(!initloadyoutube){
              //console.log('initloadyoutube');
              inityoutube();
              initloadyoutube = true;
            }else{
              //if(_stateplay4 == 4||_stateplay4 == 2){
                  play_index4(index_play4);
                  //console.log('play');
                //}
            }  
        }
        console.log(maxHeightvideo4);
}
window.addEventListener("scroll", scrollplay4,false);  
//end video 4
//play index video

function findindex(_idvideo,arr){
    if(!arr) return false;
    for (var i = 0; i < arr.length; i++) {
      if(arr[i]===_idvideo) {
        //console.log(arr[i],i);
        return i;
      }
    }
}
// var e_zoom_popup = document.getElementsByClassName("zoom_popup-video");
// var e_video_popup = document.getElementsByClassName("video-popup")[0];
//     for (var i = 0; i < e_zoom_popup.length; i++) {                                                                             
//        e_zoom_popup[i].addEventListener('click',function(){
//               var _top = _height/2 - maxHeightvideo/2;
//               console.log(_top);
//               e_video_popup.style.display = 'block';
//               e_video_popup.style.marginLeft = "auto";
//               e_video_popup.style.marginRight = "auto";
//               e_video_popup.style.marginTop = "0%";
//               e_video_popup.style.paddingTop = _top+'px';
//               var _idvideo = this.getElementsByClassName('idvideo')[0].value;
//               var _index = findindex(_idvideo, playlist3);
//               player3.playVideoAt(_index);
//               return false;
//         });
//     }    
//     var e_close = e_video_popup.getElementsByClassName("close")[0];
//           e_close.addEventListener('click',function(){
//           e_video_popup.style.display = 'none';
//           player3.stopVideo();
//           return false;
//     });
//video 5
var e_container_video5 = document.getElementById("container-video5");
var _e_video_slider_wrapper = e_container_video5.getElementsByClassName("video_slider_wrapper")[0];
var _e_play = _e_video_slider_wrapper.getElementsByClassName("play");
for (var i = 0; i < _e_play.length; i++) {
  _e_play[i].addEventListener("click",func_play);
}
function func_play(){
  var idvideo = this.getAttribute("attributeid");
  //var _index = findindexvideo(idvideo, playlist);
  index_play5 = findindex(idvideo, playlist5);
  player5.playVideoAt(index_play5);
}
 var previousIndex5 = 0;
      // 4. The API will call this function when the video player is ready.

      function onPlayerReady5(event) {

        //event.target.playVideo();
        _play_ready5 = true;
        index_play5 = 0;

      }

      // 5. The API calls this function when the player's state changes.

      //    The function indicates that when playing a video (state=5),

      //    the player should play for six seconds and then stop.

      var done = false;

      

      function  onPlayerStateChanges5(event) {

        if (event.data == YT.PlayerState.PLAYING && !done) {

          setTimeout(stopVideo5, 6000);

          done = true;

        }

        if(event.data == -1 || event.data == 0) {

                    // get current video index

                    var index = player5.getplaylistIndex();

                    var le = player5.getplaylist().length-1;

                    // update when playlist5s do not match

                    if(player5.getplaylist().length != playlist5.length) {

                        // update playlist5 and start playing at the proper index

                        player5.loadplaylist(playlist5, previousIndex5+1);

                    }

                    /*

                    keep track of the last index we got

                    if videos are added while the last playlist5 item is playing,

                    the next index will be zero and skip the new videos

                    to make sure we play the proper video, we use "last index + 5"

                    */

                    //console.log(player.getplaylist5().length+","+playlist5.length);

                    previousIndex5 = index;

                }

    }

    function stopVideo5() {

        player5.stopVideo();

    }

    function pauseVideo5(){

      player5.pauseVideo();

    }

 

    function play_index5() {
        //player5.playVideo();
        player5.playVideoAt(index_play5);        
    }

 var _e_container_player5 = document.getElementsByClassName("video-player-5")[0];
 var _stateplay5 = 0;
 var rect5,height=0;
 function scrollplay5(){
        if(!_e_container_player5) return false;
        if(index_play5 < 0 ){
            return false;
        }    
        rect5 = _e_container_player5.getBoundingClientRect();
        if(_play_ready5){
            _stateplay5 = player5.getPlayerState();
            //console.log(_stateplay5);
        }
        
        height = window.innerHeight;
        if(rect5.top < 0 || rect5.bottom > height && initloadyoutube){
             //e_bgimg.style.display = "none";
             
              //if(_stateplay5 > 0){
                  pauseVideo5();
                  //console.log('pause');
                //}
        }else{
            if(!initloadyoutube){
              //console.log('initloadyoutube');
              inityoutube();
              initloadyoutube = true;
            }else{
              //if(_stateplay5 == 5||_stateplay5 == 2){
                  play_index5(index_play5);
                //}
            }  
        }
}
window.addEventListener("scroll", scrollplay5, false);
