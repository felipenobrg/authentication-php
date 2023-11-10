<?php

session_start();

if (isset($_SESSION["user_id"])) {

    $mysqli = require __DIR__ . "/database.php";

    $sql = "SELECT * FROM users WHERE id = {$_SESSION["user_id"]}";

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();
}

if (isset($_SESSION["user_id"])) {
    $mysqli = require __DIR__ . "/database.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST["name"];
        $age = $_POST["age"];
        $weight = $_POST["weight"];
        $height = $_POST["height"];

        $bmi = $weight / (($height / 100) * ($height / 100));

        $sql = "INSERT INTO patientregistration (name, age, weight, height, bmi) VALUES ('$name', $age, $weight, $height, $bmi)";
        $result = $mysqli->query($sql);
        header("Location: patientList.php");
    }

    $sql = "SELECT * FROM users WHERE id = {$_SESSION["user_id"]}";
    $result = $mysqli->query($sql);
    $user = $result->fetch_assoc();
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastro de Pacientes</title>
    <link rel="stylesheet" href="patientStyle.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet" />
</head>

<body>

    <?php if (isset($user)): ?>
        <div class="input-container">
            <div class="registrationContainer">
                <h1>Cadastro de Paciente</h1>
                <div class="navigation-container">
                    <a href="patientRegistration.php">Cadastro de Pacientes |</a>
                    <a href="patientList.php">Lista de pacientes |</a>
                    <a href="logout.php">Log out</a>
                </div>
            </div>

            <form action="patientRegistration.php" class="form-container" id="login-form" method="POST">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <input type="text" placeholder="Digite o nome do Paciente" name="name" class="input-style"
                                required />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <input type="number" placeholder="Digite a idade do Paciente" name="age" class="input-style"
                                required />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <input type="number" placeholder="Digite o peso do Paciente" name="weight" class="input-style"
                                required />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <input type="number" placeholder="Digite a altura do Paciente" name="height" class="input-style"
                                required />
                        </div>
                    </div>
                </div>
                <p id="password-error" class="error-message"></p>

                <button type="submit" class="btn btn-primary">
                    Cadastrar
                </button>
            </form>
        </div>

    <?php else: ?>
        <? header("Location: patientRegistration.php");
        exit;
        ?>
<?php endif; ?>
</body>

</html>