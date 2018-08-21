import Echo from 'laravel-echo';
const laravelAlert = require('../helpers/alert');

window.io = require('socket.io-client');
window.Echo = new Echo({
    broadcaster: 'socket.io',
    host: 'http://localhost:6001'
});
window.Echo.channel('event.operation')
    .listen('Operation', (event) => {
        laravelAlert.show({
            type: event.type,
            message: event.msg
        });
    });
