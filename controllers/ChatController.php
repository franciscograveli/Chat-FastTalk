<?php
class ChatController extends Controller {
    public function index() {
        $this->view('chat/index');
    }

    public function sendMessage() {
        // Lógica para enviar mensagem
    }

    public function fetchMessages() {
        // Lógica para buscar mensagens
    }
}
