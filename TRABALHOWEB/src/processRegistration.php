<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email)) {
        die("Email não pode ser vazio.");
    }

    $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $mysqli = require __DIR__ . "/database.php";

    $sql = "INSERT INTO users (email, password_hash) VALUES (?, ?)";

    $stmt = $mysqli->stmt_init();

    if (!$stmt->prepare($sql)) {
        die("Erro no SQL" . $mysqli->error);
    }

    $stmt->bind_param("ss", $email, $password_hash);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit;

    } else {

        if ($mysqli->errno === 1062) {
            die("Erro: Email já em uso");
        } else {
            die($mysqli->error . " " . $mysqli->errno);
        }
    }
}
?>