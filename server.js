import express from 'express';
import { createServer } from 'node:http';
import { fileURLToPath } from 'node:url';
import { dirname, join } from 'node:path';
import { Server } from 'socket.io';

const app = express();
const server = createServer(app);
const io = new Server(server, {
    cors: { origin: "*" }
})




io.on('connection', (socket) => {
    console.log('a user connected');
    socket.on('disconnect', (socket) => {
        console.log('Disconnect')
    })
});

server.listen(3000, () => {
    console.log('server running at http://localhost:3000');
});