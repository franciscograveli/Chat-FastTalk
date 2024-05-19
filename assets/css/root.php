<?php 
if(!session_start()){
    session_start();
}
if(isset($_SESSION['user-layout'])) {
$css = $_SESSION['user-layout'];


    echo "
    :root {
        --hostBubbles-background: {$css['chat-hostBubbles-backgroundColor']};
        --hostBubbles-color: {$css['chat-hostBubbles-color']};
        --guestBubbles-background: #FFFFFF;
        --guestBubbles-color: #010000;
        --buttons-background: red;
        --buttons-color: #010000;
        --inputs-background: #1B1A1A;
        --inputs-color: #ffffff;
        --inputs-placeholder-color: #9095A0;
        --general-background: {$css['general-background']};
    }";
}
