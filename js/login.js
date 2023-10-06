function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

function volidateForm() {
    let login = document.logForm.login.value;
    let password = document.logForm.password.value;

    let loginErr = passwordErr = true;

    if (login == '') {
        printError('loginErr', 'Пожалуйста, введите логин');
    } else {
        printError('loginErr', '')
        loginErr = false;
    }

    if (password == '') {
        printError('passwordErr', 'Пожалуйста, введите пароль');
    } else {
        printError('passwordErr', '')
        passwordErr = false;
    }

    if ((loginErr || passwordErr) === true) {
        return false;
    }
}