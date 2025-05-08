<?php
session_start();
require_once __DIR__ . '/../Authenticator/config/verify_csrf.php';


// Gerar token CSRF se ainda não estiver definido
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

include_once('vendor/sonata-project/google-authenticator/src/FixedBitNotation.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php');
include_once('vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php');
require 'vendor/autoload.php';


// Gerar a chave secreta de maneira segura (preferencialmente da variável de ambiente ou banco de dados)
$secret = getenv('GOOGLE_AUTH_SECRET') ?: 'XVG2XZ3ZGK7ZGK7Z';  // Exemplo de fallback

$g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
$qrCodeUrl = \Sonata\GoogleAuthenticator\GoogleQrUrl::generate('School Library', $secret, 'SchoolLibrary');

// Gerar token CSRF
if ($_SERVER['REQUEST_METHOD'] === 'POST' && empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Verificar se o token foi enviado e validar o CSRF
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json'); // Definir o tipo de resposta como JSON

    if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        echo json_encode([
            'type' => 'error',
            'title' => 'Erro',
            'message' => 'Token CSRF inválido'
        ]);
        die();
    }

    $token = $_POST['token'];

    // Validar se o token é numérico
    if (!ctype_digit($token)) {
        $response = [
            'type' => 'error',
            'title' => 'Erro',
            'message' => 'Token inválido'
        ];
    } else if ($g->checkCode($secret, $token)) {
        // Caso o código seja validado com sucesso
        $response = [
            'type' => 'success',
            'title' => 'Autenticação Aprovada!',
            'message' => 'Token validado com sucesso.'
        ];
    } else {
        // Caso o código seja inválido
        $response = [
            'type' => 'error',
            'title' => 'Erro',
            'message' => 'Token inválido'
        ];
    }

    echo json_encode($response);
    die();
}



?>