function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

function volidateForm() {
    let name = document.applicationForm.name.value;
    let description = document.applicationForm.description.value;
    let categories = document.applicationForm.categories.value;
    let file = document.applicationForm.file.value;

    let nameErr = descriptionErr = categoriesErr = fileErr = true;

    if (name == "") {
        printError("nameErr", "Пожалуйста, введите название заявки");
    } else {
        // let regex = /[\u0401\u0451\u0410-\u044f]/g;
        let regex = /[^-А-ЯA-Z\x27а-яa-z]/;
        if (regex.test(name) === false) {
            // printError("nameErr", "Символы должны состоять из кирилицы");
            printError("nameErr", "Символы должны состоять из кирилицы и латиницы");
        } else {
            printError("nameErr", "");
            nameErr = false;
        }
    }

    if (description == "") {
        printError("descriptionErr", "Пожалуйста введите описание");
    } else {
        // let regex = /^[\u0401\u0451\u0410-\u044f.!?",:;()_ ]{0,460}$/g;
        let regex = /^[\w\W.!?",:;()_ ]{0,460}$/g;
        if (regex.test(description) === false) {
            // printError("descriptionErr", "Должны быть только русские буквы");
            printError("descriptionErr", "Введите коректно описание");
        } else {
            printError("descriptionErr", "");
            descriptionErr = false;
        }
    }

    if (categories == "") {
        printError("categoriesErr", "Пожалуста выберите категорию");
    } else {
        printError("categoriesErr", "");
        categoriesErr = false;
    }

    if (file == "") {
        printError("fileErr", "Пожалуйста загрузите фото");
    } else {
        let regex = /^[\w\W]{1,50}(?:jpeg|png|jpg|bmp)$/gi;
        if (regex.test(file) === false) {
            printError("fileErr", "Название картинки не должно превышать 50 символов<br> и тип файла может быть только (jpg, jpeg, png, bmp)")
        } else {
            printError("fileErr", "")
            fileErr = false;
        }
    }

    if ((nameErr || descriptionErr || categoriesErr || fileErr)) {
        return false;
    }

}
