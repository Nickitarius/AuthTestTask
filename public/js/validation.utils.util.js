//RFC 5322 email regex
const emailValidationRegex =
  /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;

const usernameValidationRegex = /^[a-zA-Z][A-Za-z0-9]{0,19}$/;
/**Checks if two passwords are valid and the same.
 *  Writes appropriate error messages into provided error elements, if they are specified. */
export function validatePasswords(
  password,
  repeatPassword,
  passwordError = null,
  repeatPasswordError = null
) {
  // const passwordValidationregex = /^[A-Za-z0-9]{8,20}/;
  let errorMessage = "";
  if (password.value === repeatPassword.value) {
    if (password.value.length >= 8 && password.value.length < 20) {
      if (/^[A-Za-z0-9]*$/.test(password.value)) {
        password.classList.remove("is-invalid");
        repeatPassword.classList.remove("is-invalid");
        password.setCustomValidity("");
        repeatPassword.setCustomValidity("");
      } else {
        password.setCustomValidity("invalid");
        repeatPassword.setCustomValidity("invalid");
        errorMessage =
          "Пароль должен содержать только латинские символы и цифры!";
      }
    } else {
      password.setCustomValidity("invalid");
      repeatPassword.setCustomValidity("invalid");
      errorMessage = "Пароль должен быть не менее 8 и не более 20 символов!";
    }
  } else {
    password.setCustomValidity("invalid");
    errorMessage = "Пароли не совпадают!";
    repeatPassword.setCustomValidity("invalid");
  }

  if (passwordError) {
    passwordError.innerHTML = errorMessage;
  }
  if (repeatPasswordError) {
    repeatPasswordError.innerHTML = errorMessage;
  }
}

export function validateEmail(email, emailError) {
  if (emailValidationRegex.test(email.value)) {
    emailError.innerHTML = "";
    email.classList.remove("is-invalid");
    email.setCustomValidity("");
  } else {
    emailError.innerHTML = "Электронная почта введена некорректно!";
    email.setCustomValidity("invalid");
  }
}

export function validateUsername(username, usernameError) {
  if (usernameValidationRegex.test(username.value)) {
    usernameError.innerHTML = "";
    username.classList.remove("is-invalid");
    username.setCustomValidity("");
  } else {
    usernameError.innerHTML = "Электронная почта введена некорректно!";
    username.setCustomValidity("invalid");
  }
}

// export function validatePassword(password, passwordError = null) {
//   let errorMessage = "";
//   if (password.value.length >= 8 && password.value.length < 20) {
//     if (/^[A-Za-z0-9]*$/.test(password.value)) {
//       password.setCustomValidity("");
//     } else {
//       password.setCustomValidity("invalid");
//       errorMessage =
//         "Пароль должен содержать только латинские символы и цифры!";
//     }
//   } else {
//     password.setCustomValidity("invalid");
//     errorMessage = "Пароль должен быть не менее 8 и не более 20 символов!";
//   }

//   if (passwordError) {
//     passwordError.innerHTML = errorMessage;
//   }
// }
