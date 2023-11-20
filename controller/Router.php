<?php
class Routere {
    public static function handle( $path = '/') {
        /* for just testing
        $currentMethod = $_SERVER['REQUEST_METHOD'];
        $currentUri = $_SERVER['REQUEST_URI'];
         echo $currentUri;*/


        // Ensure the path starts with a slash
        $path = '/' . ltrim($path, '/');
        $root = '/swe/views/';

        

       
        if ($path===$root) {
            
         require '../views/index.php';
            exit();
        }elseif($path==='/swe/views/products')
        {
        require '../views/product.php';
            exit();

        }else{

        require '../views/404.php';
        exit();
        }
    }
}