<?php

namespace App\Controllers;

use App\Core\Controller;

class ChatController extends Controller {

    protected $sessionId = null;
    
    public function __construct() {
        if(!isset($_SESSION)) session_start();
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
    
    public function sendMessage($msg) {
        if (!isset($this->sessionId) && !isset($_SESSION['sessionId'])) {
            $this->error('Session ID not found');
            return; 
        }
    
        include('./../config/config.php');
    
        $sessionId = isset($this->sessionId) ? $this->sessionId : $_SESSION['sessionId'];
        $url = URL_FETCH_CHAT . $sessionId . '/continueChat';
    
        // error_log("Constructed URL: " . $url);
    
        $data = array(
            'message' => $msg
        );
    
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
    
        $response = curl_exec($ch);
    
        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        } else {
            $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            error_log("HTTP Status Code: " . $http_status);
    
            if ($http_status >= 400) {
                echo 'HTTP error: ' . $http_status;
            } else {
                $responseData = (object) json_decode($response);
    
                return $responseData;
            }
        }
    
        // Close cURL session
        curl_close($ch);
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
