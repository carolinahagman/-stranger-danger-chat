const { default: axios } = require('axios');

require('./bootstrap');

const sendMessage = document.querySelector("#send-message");
const message = document.querySelector("#message");

if(sendMessage){
sendMessage.addEventListener('submit', (e) =>{
    e.preventDefault();
    const chatId = document.querySelector("meta[name='chat-id']").getAttribute('content');
    const userId = document.querySelector("meta[name='user-id']").getAttribute('content');

    const options = {
        method:'post',
        url: `/home/chats/${chatId}/${userId}`,
        data: {
            message: message.value
        }
    }

    axios(options);
   
    });
    
    window.Echo.channel('stranger-danger-chat')
     .listen('.message', (e) => {
         console.log(e);
 }); 

}

