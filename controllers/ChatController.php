<?php

namespace App\Controllers;

use App\Core\Controller;

class ChatController extends Controller {

    protected $sessionid = null;
    
    public function __construct() {
        if(!isset($_SESSION)) session_start();
        $this->sessionid =  null;
    }
    public function index() {
        if($this->sessionid == null) {
            $startChat = $this->startChat();
            if (property_exists($startChat, 'sessionId')) {
                $this->sessionid = $startChat->sessionId;
                $_SESSION['sessionid'] = $this->sessionid;
                $this->css($startChat);
            } else {
                $this->error($startChat->error);
            }
        }else{
            echo 'Recuperar chat';
            echo $this->sessionid;
        }
    }

    public function startChat(): ?object {
        $url = URL_START_CHAT;
    
        $data = array();
    
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        $response = curl_exec($ch);
    
        if ($response === false) {
            // Tratamento de erro
            echo curl_error($ch);
            return null;
        }
    
        curl_close($ch);
    
        // Decodifica a resposta JSON
        $responseData = (object) json_decode($response);
    
       return $responseData;
    }
    
    public function sendMessage() {
        // Lógica para enviar mensagem
    }

    public function fetchMessages() {
        // Lógica para buscar mensagens
    }

    public function css($obj) {
        if(isset($_SESSION['sessionid'])) {
            if(isset($obj->typebot->theme)){
                $css = $obj->typebot->theme;
                $general = $css->general;
                $chat = $css->chat;
                $_SESSION['user-layout'] = array(
                    'general-background' => $general->background->content,
                    'chat-hostBubbles-backgroundColor' => $chat->hostBubbles->backgroundColor,
                    'chat-hostBubbles-color' => $chat->hostBubbles->color,
                    'chat-guestBubbles-backgroundColor' => $chat->guestBubbles->backgroundColor,
                    'chat-guestBubbles-color' => $chat->guestBubbles->color,
                    'chat-buttons-backgroundColor' => $chat->buttons->backgroundColor,
                    'chat-buttons-color' => $chat->buttons->color,
                    'chat-inputs-backgroundColor' => $chat->inputs->backgroundColor,
                    'chat-inputs-color' => $chat->inputs->color,
                    'chat-inputs-placeholderColor' => $chat->inputs->placeholderColor
                );
            }
        }
    }

    public function error() {
        // Lógica para lidar com erros
    }
}
