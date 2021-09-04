/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/custom-echo.js ***!
  \*************************************/
window.Echo.channel('DemoChannel').listen('WebsocketDemoEvent', function (e) {
  console.log(e);
});
/******/ })()
;