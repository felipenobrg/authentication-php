const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
const passwordRegex = /^.{8,}$/;
document.getElementById("login-form").addEventListener("submit", function (event) {
  const emailInput = document.getElementById("input-email");
  const passwordInput = document.getElementById("input-password");
  const emailError = document.getElementById("email-error");
  const passwordError = document.getElementById("password-error");
  emailError.textContent = '';
  passwordError.textContent = '';

  if (!document.getElementById("login-form").checkValidity()) {
    passwordError.textContent = 'Digite as informações corretamente';

    event.preventDefault();
    return;
  }

  if (!emailRegex.test(emailInput.value)) {
    emailError.textContent = 'Formato de email inválido';
    event.preventDefault();
  }

  if (!passwordRegex.test(passwordInput.value)) {
    passwordError.textContent = 'Senha deve ter pelo menos 8 caracteres';
    event.preventDefault();
  }
});
