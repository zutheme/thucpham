$(function() {
	let ip_address = '127.0.0.1';
	let socket_port = '8001';
	let socket = io(ip_address + ':' + socket_port);
	socket.on('connection');
	
	/*let chatInput = $('#chatInput');

	chatInput.keypress(function(e) {
		let message = $(this).html();
		console.log(message);
		if(e.which === 13 && !e.shiftKey) {
			socket.emit('sendChatToServer', message);
			chatInput.html('');
			return false;
		}
	});

	socket.on('sendChatToClient', (message) => {
		$('.chat-content ul').append(`<li>${message}</li>`);
	});*/
});
/*window.Echo.channel('DemoChannel')
.listen('WebsocketDemoEvent', (e) => {
    console.log(e);
});*/