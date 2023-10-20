var Websocket = require('ws')
// console.log(Websocket);
var http = require('http')
 
// var httpServer = http.createServer().listen(8080, function(){
//     console.log('http://127.0.0.1:8080');
// })
var server = new Websocket.Server({
    host: "192.168.60.1",
    port: 8080
});

console.log(Date().toString())
var connectionArr = []
// 服务端向多个客户端群发消息
// wsServer.on('request', function(request){
//     // request.accept()是拿到wsServer链接实例
//     var connection = request.accept()
//     //将所有wsServer链接实例放进数组,即形成链接池
//     connectionArr.push(connection)
//     // 监听到达服务器的消息事件
//     connection.on('message', function(msg){
//         //使用for循环实现链接池中的每一个链接向对应客户端发出消息
//         for(var i = 0;i<connectionArr.length;i++){
//             connectionArr[i].send(msg.utf8Data)
//         }
//     })
// })