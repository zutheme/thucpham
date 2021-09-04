$(function() {
	let ip_address = '45.117.168.156';
	let socket_port = '3000';
	/*let socket = io(ip_address + ':' + socket_port);*/
	let socket = io('https://ticmedi.tech');
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