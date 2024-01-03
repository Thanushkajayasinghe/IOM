const { Client } = require('pg');
const express = require('express');
const app = express();
const server = require('http').createServer(app);
const io = require('socket.io')(server, { cors: { origin: "*" } });

const client = new Client({
    user: 'postgres',
    host: 'localhost',
    database: 'iomn',
    password: '123456',
    port: 5432,
});

const channelHandlers = {
    'token_noty_reg': (payload) => {
        const { token_no, counter, floor } = payload;
        io.sockets.emit('sendTokenStatToClientRegistration', { token: token_no, counter: counter, floor: floor });
    },
    'token_noty_vital': (payload) => {
        const { token_no, counter, floor } = payload;
        io.sockets.emit('sendTokenStatToClientVital', { token: token_no, counter: counter, floor: floor });
    },
    'token_noty_phlebotomy': (payload) => {
        const { token_no, counter, floor } = payload;
        io.sockets.emit('sendTokenStatToClientPhlebotomy', { token: token_no, counter: counter, floor: floor });
    },
    'token_noty_cxr': (payload) => {
        const { token_no, counter, floor } = payload;
        io.sockets.emit('sendTokenStatToClientCxr', { token: token_no, counter: counter, floor: floor });
    },
    'token_noty_doctor': (payload) => {
        const { token_no, counter, floor } = payload;
        io.sockets.emit('sendTokenStatToClientDoctor', { token: token_no, counter: counter, floor: floor });
    },
};

connectAndListen();

async function connectAndListen() {
    try {
        await client.connect();
        console.log('Connected to PostgreSQL database');

        const channels = Object.keys(channelHandlers);
        console.log(channels);
        channels.forEach(async (channel) => {
            await client.query(`LISTEN ${channel}`);
        });

        client.on('notification', async (msg) => {
            const { channel, payload } = msg;
            if (channel in channelHandlers) {
                const handler = channelHandlers[channel];
                const parsedPayload = JSON.parse(payload);
                console.log(parsedPayload);
                handler(parsedPayload);
            }
        });
    } catch (error) {
        console.error('Error connecting to PostgreSQL:', error);
    }
}

const port = 3000;

server.listen(port, () => {
    console.log('Server is running. Port: ' + port);
});
