<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="assets/css/root.php" type='text/css'>
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
            <div class="d-flex d-center message-bot">
                <div class="avatar">
                    <img src="assets/img/avatar/avatar.png" alt="Avatar do FastTalk">
                </div>
                <div class="message flex-1">
                    <p class="text">Olá, eu sou o FastTalk. Como posso ajudar?</p>
                </div>

            </div>
            <div class="d-flex d-center message-user">
                <div class="message d-flex wrap d-around">
                    <input type="button" value="Muriaé" class="btn option">
                    <input type="button" value="Itamuri" class="btn option">
                    <input type="button" value="Muriaé" class="btn option">
                    <input type="button" value="Itamuri" class="btn option">
                </div>

            </div>
            <div class="d-flex d-center message-bot">
                <div class="avatar">
                    <img src="assets/img/avatar/avatar.png" alt="Avatar do FastTalk">
                </div>
                <div class="message flex-1">
                    <p class="text">Olá, eu sou o FastTalk. Como posso ajudar?</p>
                </div>

            </div>
            <div class="d-flex d-center message-user">
                <div class="message d-flex wrap d-around">
                    <input type="button" value="Muriaé" class="btn option">
                    <input type="button" value="Itamuri" class="btn option">
                    <input type="button" value="Muriaé" class="btn option">
                    <input type="button" value="Itamuri" class="btn option">
                </div>

            </div>
            <div class="d-flex d-center message-bot">
                <div class="avatar">
                    <img src="assets/img/avatar/avatar.png" alt="Avatar do FastTalk">
                </div>
                <div class="message flex-1">
                    <p class="text">Olá, eu sou o FastTalk. Como posso ajudar?</p>
                </div>

            </div>
            <div class="d-flex d-center message-user">
                <div class="message d-flex wrap d-around">
                    <input type="button" value="Muriaé" class="btn option">
                    <input type="button" value="Itamuri" class="btn option">
                    <input type="button" value="Muriaé" class="btn option">
                    <input type="button" value="Itamuri" class="btn option">
                </div>

            </div>
            <div class="d-flex d-center message-bot">
                <div class="avatar">
                    <img src="assets/img/avatar/avatar.png" alt="Avatar do FastTalk">
                </div>
                <div class="message flex-1">
                    <p class="text">Olá, eu sou o FastTalk. Como posso ajudar?</p>
                </div>

            </div>
            <div class="d-flex d-center message-user">
                <div class="message d-flex wrap d-around">
                    <input type="button" value="Muriaé" class="btn option">
                    <input type="button" value="Itamuri" class="btn option">
                    <input type="button" value="Muriaé" class="btn option">
                    <input type="button" value="Itamuri" class="btn option">
                </div>

            </div>
            <div class="d-flex d-center message-bot">
                <div class="avatar">
                    <img src="assets/img/avatar/avatar.png" alt="Avatar do FastTalk">
                </div>
                <div class="message flex-1">
                    <p class="text">Olá, eu sou o FastTalk. Como posso ajudar?</p>
                </div>

            </div>
            <div class="d-flex d-center message-user">
                <div class="message d-flex wrap d-around">
                    <input type="button" value="Muriaé" class="btn option">
                    <input type="button" value="Itamuri" class="btn option">
                    <input type="button" value="Muriaé" class="btn option">
                    <input type="button" value="Itamuri" class="btn option">
                </div>

            </div>
            <div class="d-flex d-center message-bot">
                <div class="avatar">
                    <img src="assets/img/avatar/avatar.png" alt="Avatar do FastTalk">
                </div>
                <div class="message flex-1">
                    <p class="text">Olá, eu sou o FastTalk. Como posso ajudar?</p>
                </div>

            </div>
            <div class="d-flex d-center message-user">
                <div class="message d-flex wrap d-around">
                    <input type="button" value="Muriaé" class="btn option">
                    <input type="button" value="Itamuri" class="btn option">
                    <input type="button" value="Muriaé" class="btn option">
                    <input type="button" value="Itamuri" class="btn option">
                </div>

            </div>
            <div class="d-flex d-center message-bot">
                <div class="avatar">
                    <img src="assets/img/avatar/avatar.png" alt="Avatar do FastTalk">
                </div>
                <div class="message flex-1">
                    <p class="text">Olá, eu sou o FastTalk. Como posso ajudar?</p>
                </div>

            </div>
            <div class="d-flex d-center message-user">
                <div class="message d-flex wrap d-around">
                    <input type="button" value="Muriaé" class="btn option">
                    <input type="button" value="Itamuri" class="btn option">
                    <input type="button" value="Muriaé" class="btn option">
                    <input type="button" value="Itamuri" class="btn option">
                </div>

            </div>
            <div class="d-flex d-center message-bot">
                <div class="avatar">
                    <img src="assets/img/avatar/avatar.png" alt="Avatar do FastTalk">
                </div>
                <div class="message flex-1">
                    <p class="text">Olá, eu sou o FastTalk. Como posso ajudar?</p>
                </div>

            </div>
            <div class="d-flex d-center message-user">
                <div class="message d-flex wrap d-around">
                    <input type="button" value="Muriaé" class="btn option">
                    <input type="button" value="Itamuri" class="btn option">
                    <input type="button" value="Muriaé" class="btn option">
                    <input type="button" value="Itamuri" class="btn option">
                </div>

            </div>

            
        </div>
    </div>
    <footer class="d-flex d-center">
        <p>Copyright <?php echo date('Y'); ?> - <a href="#" target="_blank">FastTalk</a></p>
    </footer>
<script src="assets/js/main.js"></script>

</body>
</html>