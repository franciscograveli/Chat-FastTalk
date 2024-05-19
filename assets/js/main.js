function SendReponse(response) {
    const url = 'controllers/HomeController.php';

    fetch(url, {
        method: 'POST',
        body: JSON.stringify({ response }),
        headers: {
            'Content-Type': 'application/json'
        }
    }).then((response) => response.text())
        .then((data) => {
            answer(data, 'S');
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
