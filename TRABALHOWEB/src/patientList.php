<?php
session_start();

$mysqli = require __DIR__ . "/database.php";

if (isset($_SESSION["user_id"])) {
    $sql = "SELECT * FROM patientregistration";
    $result = $mysqli->query($sql);

    $user = null;

    if ($result) {
        $patients = $result->fetch_all(MYSQLI_ASSOC);
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
    <title>Lista de pacientes</title>
    <link rel="stylesheet" href="patientListStyle.css" />
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
    <div class="patientListContainer">
        <h1>Lista de Pacientes</h1>
        <div class="navigation-container">
            <a href="patientRegistration.php">Cadastro de Pacientes |</a>
            <a href="">Listar pacientes |</a>
            <a href="logout.php">Log out</a>
        </div>

        <?php if ($user): ?>
            <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Idade</th>
                        <th scope="col">Peso</th>
                        <th scope="col">Altura</th>
                        <th scope="col">IMC</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($patients as $patient): ?>
                        <tr>
                            <td>
                                <?php echo $patient["name"]; ?>
                            </td>
                            <td>
                                <?php echo $patient["age"]; ?>
                            </td>
                            <td>
                                <?php echo $patient["weight"]; ?>
                            </td>
                            <td>
                                <?php echo $patient["height"]; ?>
                            </td>
                            <td>
                                <?php echo $patient["bmi"]; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <?php header("Location: patientRegistration.php");
            exit; ?>
<?php endif; ?>
    </div>
    </div>
</body>

</html>