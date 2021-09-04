
var initloadyoutube = false;
var index_play1 = 0;
var _play_ready1 = false;
var _api_ready = false;
/*var playlist1 = ['LU4JRq7Pl8'];*/
// var playlist1 = [];
// playlist1.push('0uBgbRJ42ss');
//console.log(playlist1);
var _api_ready = false;
var countfind = 20;

var _e_video_container;
var player1;
var player1;
var player3;
var player4;
var player5;
var _width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
var _height = (window.innerHeight > 0) ? window.innerHeight : screen.height;
//_height = 0.6*_height;
//var team_img = document.getElementsByClassName("team_img")[0];
//var _h_video = team_img.offsetHeight;
//var maxHeightvideo = _height*0.8;
var maxHeightvideo = 425;
var maxHeightvideo1 = 425;

//video 2
//_e_video_container1 = document.getElementsByClassName("container-video1")[0];
//var maxHeightvideo1 = _e_video_container1.offsetHeight;

if(_width < 991){
  maxHeightvideo1 = 360;
}else{
  maxHeightvideo1 = _height*0.78;
  if(maxHeightvideo1 < 300) {
      maxHeightvideo1 = 310;
  }
}
//end video 2

//2. This code loads the IFrame Player API code asynchronously.
function inityoutube(){
      //console.log(maxHeightvideo1);
      var tag = document.createElement('script');
      tag.src = "https://www.youtube.com/iframe_api";
      var firstScriptTag = document.getElementsByTagName('script')[0];
      firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
       window.onYouTubeIframeAPIReady = function(events) {
          player1 = new YT.Player('player1', {
            height: maxHeightvideo1,
            width: '100%',
            //playerVars: { 'autoplay': 2, 'controls': 0 },
            //videoId: ,
            playerVars: {
              autohide: 1,
              autoplay: 1,
              wmode:'opaque',
              color: 'white', 
              /*origin:'http://localhost/studyabroad/',*/
              rel: 0,
              controls:0,
              fs : 0,
              playsinline : 1,
              playlist: playlist1.join(','),
            },
            events: {
              'onReady': onPlayerReady1
              //'onStateChange': onPlayerStateChanges1
            }
          });
    }  
}

      
//----------------video 2--------------

 var previousIndex1 = 0;


      // 4. The API will call this function when the video player is ready.

      function onPlayerReady1(event) {

        /*event.target.playVideo();*/
        _play_ready1 = true;
        index_play1 = 0;

      }

      // 5. The API calls this function when the player's state changes.

      //    The function indicates that when playing a video (state=2),

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

                    to make sure we play the proper video, we use "last index + 2"

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

 

    function play_Index1(index) {
      //if(_play_ready1){
         player1.playVideo();
         //player.playVideoAt(index);
      //}
              

    }
 var _e_container_player1 = document.getElementById("canvas");
var _e_player1 = document.getElementsByClassName("single-youtube")[0];
 //var _e_container_player1 = document.getElementsByClassName("video-player-1")[0];
 var _stateplay1 = 0;
 var rect1, rect_player1 ,height=0;
 
 rect1 = _e_container_player1.getBoundingClientRect();
 if(!initloadyoutube && rect1.top <= 0){
        inityoutube();
        initloadyoutube = true; 
}
 function scrollplay1(){
        if(!_e_container_player1) return false;
         rect1 = _e_container_player1.getBoundingClientRect();
        if(_play_ready1){
            _stateplay1 = player1.getPlayerState();
        }
        height = window.innerHeight;
        rect_player1 = _e_player1.getBoundingClientRect();
        console.log(rect_player1.bottom, rect_player1.top, height);
        if(rect_player1.top < -100 && initloadyoutube){
             //e_bgimg.style.display = "none";
             
              //if(_stateplay1 > 0){
                  pauseVideo1();
                  
                //}
        }
        if(initloadyoutube && rect_player1.top > 0){
              player1.playVideo(); 
        }
}
window.addEventListener("scroll", scrollplay1,false);       
//video client
var _e_btn_play = document.getElementsByClassName('btn-play');
for (var i = 0; i < _e_btn_play.length; i++) {
  _e_btn_play[i].addEventListener("click",function(){
    var _idyoutube = parseInt(this.getAttribute("idyoutube"));
    //console.log(_idyoutube, playlist1[_idyoutube]);
    player1.playVideoAt(_idyoutube);
    e_video_popup.style.display = "block";
    
  });
}
// var _e_btn_play = document.getElementsByClassName('btn-play')[0];
// _e_btn_play.addEventListener("click",function(){
//     show_popup();
// });
var e_video_popup = document.getElementsByClassName("video-popup")[0];
function show_popup(){
  e_video_popup.style.display = "block";
  player1.playVideo();
}
var _e_btn_close = document.getElementsByClassName('video-close')[0];
_e_btn_close.addEventListener("click",function(){
    e_video_popup.style.display = "none";
    player1.pauseVideo();
});