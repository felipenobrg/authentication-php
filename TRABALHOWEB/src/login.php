<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="input-container">
      <h1 class="login-h1">Login</h1>
      <p class="login-p">Digite suas informações para acessar sua conta</p>

      <form action="login.php" id="login-form" method="POST" novalidate>
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="bi bi-person icon"></i>
              </span>
              <input
                type="email"
                class="form-control"
                id="input-email"
                aria-describedby="emailHelp"
                placeholder="Email"
                name="email"
                required
              />
            </div>
          </div>
        </div>
        <p id="email-error" class="error-message"></p>

        <div class="form-group">
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">
                <i class="bi bi-lock icon"></i>
              </span>
              <input
                type="password"
                class="form-control"
                id="input-password"
                placeholder="Senha"
                name="password"
                required
              />
            </div>
          </div>
        </div>
        <p id="password-error" class="error-message"></p>

        <button type="submit" class="btn btn-primary" id="submit-button">
          Login in
        </button>

        <div class="create-account">
          <p>Não tem uma conta?</p>
          <a href="registration.php">Cadastre agora</a>
        </div>
      </form>
    </div>

    <script src="validatingLoginForm.js"></script>
  </body>
</html>
