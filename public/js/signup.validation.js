import { checkPasswords } from "./password.validation.js";

//RFC 5322 email regex
const emailValidationRegex =
  /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;

window.onload = function () {
  const form = document.getElementById("signup-form");
  // const username = document.getElementById("username");
  const email = document.getElementById("email");
  const password = document.getElementById("password");
  const repeatPassword = document.getElementById("repeat-password");

  const passwordError = document.getElementById("password-error");
  const repeatPasswordError = document.getElementById("repeat-password-error");

  email.oninput = function (event) {
    console.log("goyim");
    console.log(email);
    if (emailValidationRegex.test(email.value)) {
      email.setCustomValidity("");
    } else {
      email.setCustomValidity("invalid");
    }
  };

  password.addEventListener("input", (event) => {
    checkPasswords(
      password,
      repeatPassword,
      passwordError,
      repeatPasswordError
    );
  });
  repeatPassword.addEventListener("input", (event) => {
    checkPasswords(
      password,
      repeatPassword,
      passwordError,
      repeatPasswordError
    );
  });

  form.onsubmit = function (event) {
    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
    }

    form.classList.add("was-validated");
  };
};
