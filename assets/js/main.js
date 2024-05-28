function formatRichText(richText) {
    let result = '';
    
    richText.forEach(node => {
        if (node.type === 'p') {
            result += node.children.map(child => child.text).join('');
        } else if (node.type === 'inline-variable') {
            result += formatRichText(node.children);
        }
    });
    
    return result;
}

function insertBotMessage(messages) {
    var p = '';
    messages.forEach(element => {
        let msg = formatRichText(element.content.richText);
        p += `<p class='text'>${msg}</p>`;
    });
    const chat = document.querySelector('#chat');
        html = `
        <div class="message-bot d-flex d-center">
        <div class="avatar">
            <img src="assets/img/avatar/avatar.png" alt="Avatar do FastTalk">
        </div>
            <div class="message flex-1 d-flex flex-column">
            ${p}
            </div>
        </div>`;
        chat.insertAdjacentHTML('beforeend', html);
}


function fetchMessages(response){
    var botMessages = response.messages;

    insertBotMessage(botMessages);
}
function SendReponse(response) {
    const url = 'controllers/ChatApiController.php';

    fetch(url, {
        method: 'POST',
        body: JSON.stringify({ response: response, action: 'sendMessage' }), 
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then((response) => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then((data) => {
        fetchMessages(data.response);
    })
    .catch((error) => {
        console.error('There was a problem with the fetch operation:');
    });
}


function answer(response, type) {
    if(type == 'S'){
        var allInputs = document.querySelectorAll('.input-text');
        let input = allInputs[allInputs.length - 1];
        response = input.value;

        if(response.trim() == ''){
            alert('preencha');
            return;
        }

        if (input.parentElement) {
            html = `
            <div class="message flex-1 d-flex flex-column">
            <p class='text'>${response}</p>
            </div>`;
            input.parentElement.classList.remove('input-text');
            input.parentElement.innerHTML = html;
            input.remove();
        }
    }else{
       console.log(response); 
    }
    
    SendReponse(response);
}
function loader(){
    let loader = document.getElementById('loader');
    if(loader){
        loader.remove();
    }
}
window.onload = function() {
    loader();
}
