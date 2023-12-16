<?php
ob_start();

$response = '';

if (isset($_POST['message'])) {
    $userInput = escapeshellarg($_POST['message']);
    $command = "python3 ../chatbot_python/chat.py " . $userInput . " 2>&1";
    $output = shell_exec($command);
    $response = $output ?: 'Error: Command execution failed.';
}

ob_end_clean();

echo $response;
?>