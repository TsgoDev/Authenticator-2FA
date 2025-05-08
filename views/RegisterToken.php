<?php
require_once __DIR__ . '/../ConfigToken.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../views/css/style.css">
    <title>Configurar Token</title>
</head>

<body>
    <form method="POST">
        <h4>Autenticação de dois fatores</h4>
        
        <p for="token">Escaneie o QR Code com o aplicativo de autenticação de sua <strong>preferência</strong> para ativar a autenticação em duas etapas.</p>

        <img src="<?php echo $qrCodeUrl; ?>">

        <p class="token-question">
            <img src="../views/img/circle-question-solid.svg" style="margin: 0px 13px -2px 0px; height: 1em;">
            Já possui um token? <a href="Authenticator.php">Valide seu token</a> ou Cadastre-se se ainda não tiver.
        </p>
    </form>
</body>
</html>