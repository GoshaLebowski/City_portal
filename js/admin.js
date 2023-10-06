function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
}

function volidateFormCategories() {
    let categories = document.categoriseSelect.id_categories.value;

    let categoriesErr = true;

    if (categories == '0') {
        printError('categoriesErr', 'Пожалуйста, выберите категории!');
    } else {
        printError('categoriesErr', '');
        categoriesErr = false;
    }

    if ((categoriesErr) === true) {
        return false;
    }
}

function volidateFormInputCategories() {
    let inputCategories = document.inputCategories.name.value;

    let inputCategoriesErr = true;

    if (inputCategories == '') {
        printError('inputCategoriesErr', 'Пожалуйста, напишите категорию!');
    } else {
        printError('inputCategoriesErr', '');
        inputCategoriesErr = false;
    }

    if ((inputCategoriesErr) === true) {
        return false;
    }
}

function volidateFormApplication() {
    let selectApplication = document.selectApplication.id_select.value;

    let applicationErr = true;

    if (selectApplication == '0') {
        printError('applicationErr', 'Пожалуйста, веберите заявку');
    } else {
        printError('applicationErr', '');
        applicationErr = false;
    }

    if ((applicationErr) === true) {
        return false;
    }
}

function volidateFormUpdateSelect() {
    let updateSelect = document.getElementById('updateSelect').value;

    let updateSelectErr = true;

    if (updateSelect == '0') {
        // printError('updateSelectErr', 'Пожалуйста, веберите статус заявки');
        alert('Пожалуйста, веберите статус заявки');
    } else {
        printError('updateSelectErr', '');
        updateSelectErr = false;
    }

    if ((updateSelectErr) === true) {
        return false;
    }
}

