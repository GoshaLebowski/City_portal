const changeLang = document.getElementById('changeLang');
const allLang = ['en', 'ru'];

changeLang.addEventListener('change', changeUrlLanguage);

function changeUrlLanguage() {
    let lang = changeLang.value;
    location.href = window.location.pathname + '#' + lang;
    location.reload();
}

function changeLanguage() {
    let hash = window.location.hash;
    hash = hash.substring(1);
    if (!allLang.includes(hash)) {
        location.href = window.location.pathname + '#ru';
        location.reload();
    }
    changeLang.value = hash;
    for (let key in langArrWithOfApp) {
        document.querySelector('.lng-' + key).innerHTML = langArrWithOfApp[key][hash];
    }
}

changeLanguage();