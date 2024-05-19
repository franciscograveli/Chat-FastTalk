// document.getElementById('send-button').addEventListener('click', function() {
//     var message = document.getElementById('message-input').value;
//     if (message.trim() !== '') {
//         // Enviar mensagem para o servidor
//         // Atualizar a lista de mensagens
//     }
// });
function loader(){
    let loader = document.getElementById('loader');
    if(loader){
        loader.remove();
    }
}
window.onload = function() {
    loader();
}
