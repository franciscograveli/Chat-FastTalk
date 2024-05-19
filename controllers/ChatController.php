<?php

namespace App\Controllers;

use App\Core\Controller;

class ChatController extends Controller {

    protected $sessionId = null;
    
    public function __construct() {
        if(!isset($_SESSION)) session_start();
        $this->sessionId =  null;
    }
    public function index() {
        if($this->sessionId == null) {
            $startChat = $this->startChat();
            if (property_exists($startChat, 'sessionId')) {
                $this->sessionId = $startChat->sessionId;
                $_SESSION['sessionId'] = $this->sessionId;
                $this->css($startChat);
                return $this->startMessages($startChat);
            } else {
                $this->error($startChat->error);
            }
        }else{
            echo 'Recuperar chat';
            echo $this->sessionId;
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

    public function startMessages($obj) {
        // Lógica para mostrar mensagens iniciais
        $response = null;
        if(isset($obj->messages) && is_array($obj->messages) && count($obj->messages) > 0) {
            $response = array();
            foreach($obj->messages as $message) {
                if ($message->type == 'text') {
                    foreach ($message->content->richText as $richText) {
                        foreach ($richText->children as $children) {
                            $messages[] = $children->text;
                        }
                    }
                }
            }
            $response['messages'] = $messages;
        }
        if(isset($obj->input->type)){
            $type = $obj->input->type;
            if ($type == 'text input') {
                $response['input'] = 'input';
            }
            
        }

        return $response;
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
