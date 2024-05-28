<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\ChatController;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rawData = file_get_contents('php://input');
    $postData = json_decode($rawData, true);
    
    if (isset($postData['action']) && $postData['action'] == 'sendMessage') {
        $ChatController = new ChatController();
        $response = $ChatController->sendMessage($postData['response']);
        
        // Ensure the response is in JSON format
        header('Content-Type: application/json');
        echo json_encode(['response' => $response]);
        exit();
    }
}
?>
