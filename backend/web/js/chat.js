$(document).ready(function () {
    var websocketPort = wsPort ? wsPort : 8181;
    var conn = new WebSocket('ws://localhost:' + websocketPort);
    conn.onopen = function(e) {
        console.log("Connection established!");
    };
    conn.onerror = function(e) {
        console.log("Connection fail!");
    };

    conn.onmessage = function(e) {
        $('.chat-wrapper').append(`
            <div class="chat-content">
                <img class="pull-right img-circle chat-img " src="/img/user-img.jpg" alt="" />
                <div class="chat-bubble pull-right right">
                <p class="m-b-0">${e.data}</p>
                </div>
             </div>
        `)
     };

    $('#chat-from').on('submit', function (e) {
        e.preventDefault();
        let message = $('.input-chat-send');
        if (message.val().length !== 0) {
            conn.send(message.val());
            message.val('');
        }
    })
})
