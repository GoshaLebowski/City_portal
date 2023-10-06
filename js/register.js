function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

//Определяем функции для проверки формы
function validateForm() {
    // Получаем значение элеменотов формы
    let name = document.regForm.name.value;
    let login = document.regForm.login.value;
    let email = document.regForm.email.value;
    let password = document.regForm.password.value;
    let repeatPassword = document.regForm.repeatPassword.value;
    let checkbox = document.regForm.check.checked;

    // Определяем переменные ошибок со значением по умолчанию
    let nameErr = loginErr = emailErr = passwordErr = repeatPasswordErr = checkedErr = true;

    if (window.location.pathname + '#ru') {
        // Проверяю ФИО
        if (name == "") {
            printError("nameErr", "Пожалуйста, введите ваше имя");
        } else {
            let regex = /[^-А-ЯA-Z\x27а-яa-z]/;
            if (regex.test(name) === false) {
                printError("nameErr", "Пожалуйста, введиете правильное имя");
            } else {
                printError("nameErr", "");
                nameErr = false;
            }
        }

        // Проверяю логин
        if (login == "") {
            printError("loginErr", "Пожалуйста, введите логин");
        } else {
            let regex = /^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9]+$/;
            if (regex.test(login) === false) {
                printError("loginErr", "Логин, может содержать только латинские символы и цифры");
            } else {
                printError("loginErr", "");
                loginErr = false;
            }
        }

        // Проверяю email
        if (email == "") {
            printError("emailErr", "Пожалуйста, введите адрес электронной почты");
        } else {
            let regex = /^\S+@\S+\.\S+$/;
            if (regex.test(email) === false) {
                printError("emailErr", "Пожалуйста, введите действительный адрес электронной почты");
            } else {
                printError("emailErr", "");
                emailErr = false;
            }
        }

        // Проверяю пароль
        if (password == "") {
            printError("passwordErr", "Пожалуйста, введите пароль");
        } else {
            let regex = /^.*(?=.{8,120})(?!.*\s)(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$%&?_ "]).*$/;
            if (regex.test(password) === false) {
                let indicationForThePassword = "Пароль должен состоять: \n" +
                    "Минимум 1 цифра \n" +
                    "Не менее 1-го специального символа \n" +
                    "Не менне 3-х буквенных символов \n" +
                    "Не меньше 8-ми символов \n" +
                    "Не должно содержать пробелов";
                alert(indicationForThePassword);
            } else {
                printError("passwordErr", "");
                passwordErr = false;
            }
        }

        // Проверяю повтор пароля 
        if (repeatPassword == "") {
            printError('repeatPasswordErr', "Пожалуйста, введите подверждение пароля");
        } else {
            if (password !== repeatPassword) {
                printError("repeatPasswordErr", "Пароли должны совпадать");
            } else {
                printError("repeatPasswordErr", "");
                repeatPasswordErr = false;
            }
        }

        // Проверяю флажок
        if (checkbox) {
            printError("checkedErr", "");
            checkedErr = false;
        } else {
            printError("checkedErr", "Пожалуйста, нажмите «Согласие на обработку персональных данных»");
        }

        // Запрещаем отправку формы в случае ошибок
        if ((nameErr || loginErr || emailErr || passwordErr || repeatPasswordErr || checkedErr) === true) {
            return false;
        } else {
            // Создаем строки из входных данных для предварительного просмотра
            let dataPreview = "Вы успешно зарегестрировались и ввели следующие данные: \n" +
                "Имя: " + name + "\n" +
                "Логин: " + login + "\n" +
                "Email: " + email + "\n" +
                "Пароль: " + password;
            // Отображаем входные данные в диалоговом окне перед отправкой формы
            alert(dataPreview);
        }

    } else {
        // Проверяю ФИО
        if (name == "") {
            printError("nameErr", "Please enter your name");
        } else {
            let regex = /[^-А-ЯA-Z\x27а-яa-z]/;
            if (regex.test(name) === false) {
                printError("nameErr", "Please enter the correct name");
            } else {
                printError("nameErr", "");
                nameErr = false;
            }
        }

        // Проверяю логин
        if (login == "") {
            printError("loginErr", "Please enter your username");
        } else {
            let regex = /^(?=.*[a-zA-Z])(?=.*[0-9])[a-zA-Z0-9]+$/;
            if (regex.test(login) === false) {
                printError("loginErr", "Login, can contain only Latin characters and numbers");
            } else {
                printError("loginErr", "");
                loginErr = false;
            }
        }

        // Проверяю email
        if (email == "") {
            printError("emailErr", "Please enter your email address");
        } else {
            let regex = /^\S+@\S+\.\S+$/;
            if (regex.test(email) === false) {
                printError("emailErr", "Please enter a valid email address");
            } else {
                printError("emailErr", "");
                emailErr = false;
            }
        }

        // Проверяю пароль
        if (password == "") {
            printError("passwordErr", "Please enter your password");
        } else {
            let regex = /^.*(?=.{8,120})(?!.*\s)(?=.*[a-zA-Z])(?=.*\d)(?=.*[!#$%&?_ "]).*$/;
            if (regex.test(password) === false) {
                let indicationForThePassword = "The password must consist of: \n" +
                    "Minimum 1 digit \n" +
                    "At least 1 special character \n" +
                    "At least 3 letter characters \n" +
                    "At least 8 characters \n" +
                    "Must not contain spaces";
                alert(indicationForThePassword);
            } else {
                printError("passwordErr", "");
                passwordErr = false;
            }
        }

        // Проверяю повтор пароля 
        if (repeatPassword == "") {
            printError('repeatPasswordErr', "Please enter the password confirmation");
        } else {
            if (password !== repeatPassword) {
                printError("repeatPasswordErr", "Passwords must match");
            } else {
                printError("repeatPasswordErr", "");
                repeatPasswordErr = false;
            }
        }

        // Проверяю флажок
        if (checkbox) {
            printError("checkedErr", "");
            checkedErr = false;
        } else {
            printError("checkedErr", "Please click «Consent to the processing of personal data»");
        }

        // Запрещаем отправку формы в случае ошибок
        if ((nameErr || loginErr || emailErr || passwordErr || repeatPasswordErr || checkedErr) === true) {
            return false;
        } else {
            // Создаем строки из входных данных для предварительного просмотра
            let dataPreview = "You have successfully registered and entered the following data: \n" +
                "Name: " + name + "\n" +
                "Login: " + login + "\n" +
                "Email: " + email + "\n" +
                "Password: " + password;
            // Отображаем входные данные в диалоговом окне перед отправкой формы
            alert(dataPreview);
        }
    }
}
