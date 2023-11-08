const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
const passwordRegex = /^.{8,}$/;

document
  .getElementById("registration-form")
  .addEventListener("submit", function (event) {
    const emailInput = document.getElementById("input-email");
    const passwordInput1 = document.getElementById("input-password");
    const passwordInput2 = document.getElementById("input-confirm-password");
    const emailError = document.getElementById("email-error");
    const passwordError = document.getElementById("password-error");
    const confirmError = document.getElementById("confirm-error");

    emailError.textContent = "";
    passwordError.textContent = "";
    confirmError.textContent = "";

    if (!document.getElementById("registration-form").checkValidity()) {
      confirmError.textContent =
        "Por favor, preencha todos os campos corretamente.";
      event.preventDefault();
    }

    if (!emailRegex.test(emailInput.value)) {
      emailError.textContent = "Por favor, insira um email válido.";
      event.preventDefault();
    }

    if (!passwordRegex.test(passwordInput1.value)) {
      passwordError.textContent = "A senha deve ter pelo menos 8 caracteres.";
      event.preventDefault();
    }

    if (passwordInput1.value !== passwordInput2.value) {
      confirmError.textContent = "As senhas não coincidem.";
      event.preventDefault();
    }
  });
