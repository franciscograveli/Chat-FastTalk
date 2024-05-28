<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="assets/css/root.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <?php
if(isset($_SESSION['user-layout'])) {
    $css = $_SESSION['user-layout'];
        echo "
        <style>
        :root {
            --hostBubbles-background: {$css['chat-hostBubbles-backgroundColor']};
            --hostBubbles-color: {$css['chat-hostBubbles-color']};
            --guestBubbles-background: {$css['chat-guestBubbles-backgroundColor']};
            --guestBubbles-color: {$css['chat-guestBubbles-color']};
            --buttons-background: {$css['chat-buttons-backgroundColor']};
            --buttons-color: {$css['chat-buttons-color']};
            --inputs-background: {$css['chat-inputs-backgroundColor']};
            --inputs-color: {$css['chat-inputs-color']};
            --inputs-placeholder-color: {$css['chat-inputs-placeholderColor']};
            --general-background: {$css['general-background']};
        }
        </style>";
}
    
    ?>
    <title>FastTalk</title>
</head>
<body>
    <div id="loader" class="loader d-flex- flex-column">
        <div class="spinner"></div>
    </div>
    <div class="container d-flex flex-column">
        <div id="chat" class="d-flex flex-column">
        <?php
        if(isset($startMessages['messages'])){
            echo'
            <div class="d-flex d-center message-bot">
            <div class="avatar">
                <img src="assets/img/avatar/avatar.png" alt="Avatar do FastTalk">
            </div>
            <div class="message flex-1 d-flex flex-column">';
            foreach($startMessages['messages'] as $message){
                echo "<p class='text'>{$message}</p>";
            }
            echo "</div>

            </div>";
        }

            if(isset($startMessages['input']) && $startMessages['input'] == 'input'){
                echo '<div class="d-flex d-center message-user">
               
                <div class="message d-flex wrap d-around input-text p-0">
                    <input class="input-text" type="text" placeholder="Type your answer...">
                    <button class="button btn-text" type="button" title="Enviar Resposta" onclick="answer(this.value, \'S\')" keydown="answer(this.value, \'S\')">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="19px" color="white" class="send-icon flex ">
                            <path d="M476.59 227.05l-.16-.07L49.35 49.84A23.56 23.56 0 0027.14 52 24.65 24.65 0 0016 72.59v113.29a24 24 0 0019.52 23.57l232.93 43.07a4 4 0 010 7.86L35.53 303.45A24 24 0 0016 327v113.31A23.57 23.57 0 0026.59 460a23.94 23.94 0 0013.22 4 24.55 24.55 0 009.52-1.93L476.4 285.94l.19-.09a32 32 0 000-58.8z"></path>
                        </svg>
                    </button>
                    </div>
                </div>';
            }
        ?>
          
           

            
        </div>
    </div>
    <footer class="d-flex d-center">
        <p>Copyright <?php echo date('Y'); ?> - <a href="#" target="_blank">FastTalk</a></p>
    </footer>
<script src="assets/js/main.js"></script>

</body>
</html>