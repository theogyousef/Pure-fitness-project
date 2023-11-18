<?php
class Router {
    public static function handle($method = 'GET', $path = '/', $filename = '') {
        $currentMethod = $_SERVER['REQUEST_METHOD'];
        $currentUri = $_SERVER['REQUEST_URI'];

        if ($currentMethod !== $method) {
            return false;
        }

        // Ensure the path starts with a slash
        $path = '/' . ltrim($path, '/');

        $root = '/swe/views';
        $pattern = '#^' . $root . $path . '$#siD';
        if (preg_match($pattern, $currentUri)) {
            require $filename;
            exit();
        }
        require '../views/404.php';
        exit();
    }
}


