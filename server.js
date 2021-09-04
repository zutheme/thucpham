const express = require('express');

const app = express();

app.get('/',(req,res) => res.send('hello from node.js'));
app.listen(3000,()=>console.log('app is listening port 3000'));
/*const server = require('http').createServer(app);


const io = require('socket.io')(server, {
    cors: { origin: "*"}
});


io.on('connection', (socket) => {
    console.log('connection');

    socket.on('sendChatToServer', (message) => {
        console.log(message);

        io.sockets.emit('sendChatToClient', message);
        //socket.broadcast.emit('sendChatToClient', message);
    });

    socket.on('disconnect', (socket) => {
        console.log('Disconnect');
    });
});

server.listen(3000, () => {
    console.log('Server is running');
});*/