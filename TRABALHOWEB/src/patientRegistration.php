<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de paciente</title>
</head>

<body>

    <?php if (isset($user)): ?>
    <p>Voce esta logado</p>
    <a href="logout.php">Log out</a>
    <?php else: ?>
    <? header("Location: patientRegistration.php");
       exit;
    ?>
<?php endif; ?>
</body>

</html>