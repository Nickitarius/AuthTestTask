//RFC 5322 email regex
const emailValidationRegex =
  /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;

// const passwordValidationregex = /^[A-Za-z0-9]{8,20}/;

window.onload = function () {
  const form = document.getElementById("signup-form");
  const email = document.getElementById("email");
  // const username = document.getElementById("username");
  const password = document.getElementById("password");
  const repeatPassword = document.getElementById("repeat-password");

  const passwordError = document.getElementById("password-error");
  const repeatPasswordError = document.getElementById("repeat-password-error");

  form.addEventListener(
    "submit",
    (event) => {
      //Only email and password repeat need to be checked — everythin else is handled by html+bootstrap validation.
      if (emailValidationRegex.test(email.value)) {
        email.setCustomValidity("");
      } else {
        email.setCustomValidity("invalid");
      }

      console.log(password.value, repeatPassword.value);
      if (password.value === repeatPassword.value) {
        console.log("equal");
        if (password.value.length >= 8) {
          console.log("long enough");
          if (/^[A-Za-z0-9]*$/.test(password.value)) {
            password.setCustomValidity("");
            repeatPassword.setCustomValidity("");
          } else {
            console.log("wrong chars");
            password.setCustomValidity("invalid");
            repeatPassword.setCustomValidity("invalid");
            passwordError.innerHTML =
              "Пароль должен содержать только латинские символы и цифры!";
            repeatPasswordError.innerHTML =
              "Пароль должен содержать только латинские символы и цифры!";
          }
        } else {
          console.log("short");
          password.setCustomValidity("invalid");
          repeatPassword.setCustomValidity("invalid");
          passwordError.innerHTML = "Пароль должен быть не менее 8 символов!";
          repeatPasswordError.innerHTML =
            "Пароль должен быть не менее 8 символов!";
        }
      } else {
        console.log("non equal");
        password.setCustomValidity("invalid");
        repeatPassword.setCustomValidity("invalid");
        passwordError.innerHTML = "Пароли не совпадают!";
        repeatPasswordError.innerHTML = "Пароли не совпадают!";
      }

      if (!form.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
      }

      form.classList.add("was-validated");
    },
    false
  );
};
