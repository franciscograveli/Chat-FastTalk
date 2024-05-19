<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Controllers\ChatController as Chat;

class HomeController extends Controller {
    public function index() {

        $chatController = new Chat();

        $chatController->index();

        $this->view('chat/index');
    }
}
