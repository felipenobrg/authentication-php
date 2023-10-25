const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
      const passwordRegex = /^.{8,}$/;

      document.getElementById('registration-form').addEventListener('submit', function (event) {
        const emailInput = document.getElementById('input-email');
        const passwordInput1 = document.getElementById('input-password');
        const passwordInput2 = document.getElementById('exampleInputPassword2');

        if (!document.getElementById('registration-form').checkValidity()) {
          Swal.fire({
            title: 'Error!',
            text: 'Por favor, preencha os campos corretamente.',
            icon: 'error',
            confirmButtonText: 'OK'
          });
          event.preventDefault();
        }

        if (!emailRegex.test(emailInput.value)) {
          Swal.fire({
            title: 'Error!',
            text: 'Por favor, insira um email válido.',
            icon: 'error',
            confirmButtonText: 'OK'
          });
          event.preventDefault();
        }

        if (!passwordRegex.test(passwordInput1.value)) {
          Swal.fire({
            title: 'Error!',
            text: 'A senha deve ter no mínimo 8 caracteres.',
            icon: 'error',
            confirmButtonText: 'OK'
          });
          event.preventDefault();
        }

        if (passwordInput1.value !== passwordInput2.value) {
          Swal.fire({
            title: 'Error!',
            text: 'As senhas não coincidem.',
            icon: 'error',
            confirmButtonText: 'OK'
          });
          event.preventDefault();
        }
      });