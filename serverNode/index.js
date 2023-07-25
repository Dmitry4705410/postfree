// Создание сервера
const server = require('http').createServer();
// Берём API socket.io
const io = require('socket.io')(server,{
  cors: {
    origin: "*",
    //methods: ["GET", "POST"],
    //transports: ['websocket', 'polling'],
   // credentials: true
},
allowEIO3: true
  });
cliendId = {};
// Подключаем клиенты
io.on('connection', (socket) => {
    // Выводим в консоль 'connection'
    console.log('к нам присоеденился:'+socket.id)

//принимаем сообщение и отправляем получателю
    socket.on('massege',(data)=>{
      socket.to(data['id']).emit("private message", data['myid'], data['text']);
    });


      //добавляем в комнату все сесии с одного аккаунта
    socket.on('clientId', (data)=>{
      id = data;
      socket.join(id);
    });


    socket.on('disconnect', () => {
          console.log('отключился:'+socket.id);
  });
  });
  
server.listen(1001,()=>{
  console.log('ЗАПУСК');
});