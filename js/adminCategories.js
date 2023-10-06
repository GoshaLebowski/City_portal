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