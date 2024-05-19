<?php
namespace App\Core;

class Controller {
    protected function view($view, $data = []) {
        $viewFile = __DIR__ . "/../views/$view.php";
        if (file_exists($viewFile)) {
            extract($data);
            require $viewFile;
        } else {
            die("Error: View '$view' not found.");
        }
    }
}
