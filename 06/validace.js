(function(global) {
    let nameEl = null;
    let surnameEl = null;
    let passEl = null;
    let passAgainEl = null;
    let formEl = null;

    function init() {
        formEl = document.querySelector('form');
        nameEl = document.querySelector('#jmeno');
        surnameEl = document.querySelector('#prijmeni');
        passEl = document.querySelector('#heslo');
        passAgainEl = document.querySelector('#hesloznovu');
        formEl.addEventListener('submit', validate);
    }

    function validate(e) {
        const nameResult = validateName();
        const surnameResult = validateSurname();
        const passResult = validatePassword();
        const passAgainResult = validatePasswordAgain();

        if (nameResult && surnameResult && passResult && passAgainResult) {
            // pokracuju dal data jsou OK
        } else {
            // chyba neodesilam formular
            e.preventDefault();
        }
    }

    function validateName() {
        if (nameEl.value.length > 4) {
	    if (nameEl.parentElement.querySelector('error')) {
        	nameEl.parentElement.removeChild(nameEl.parentElement.querySelector('error'));
	    }
            //nameEl.parentElement.classList.remove('error');
            return true;
        } else {
            //alert('Jmeno je spatne');
            if ( nameEl.parentElement.querySelector('span') == null) {
        	const errorDiv = document.createElement('span');
        	errorDiv.classList.add('error');
        	nameEl.parentElement.append(errorDiv);
	    }
            //nameEl.parentElement.classList.add('error');
            return false;
        }
    }

    function validateSurname() {
        if (surnameEl.value.length > 4) {
            surnameEl.parentElement.classList.remove('error');
            return true;
        } else {
            //alert('Primeni je spatne');
            surnameEl.parentElement.classList.add('error');
            return false;
        }
    }

    function validatePassword() {
        if (passEl.value.length > 7) {
            passEl.parentElement.classList.remove('error');
            return true;
        } else {
            //alert('Heslo je spatne');
            passEl.parentElement.classList.add('error');
            return false;
        }
    }

    function validatePasswordAgain() {
        if (passAgainEl.value == passEl.value) {
            passAgainEl.parentElement.classList.remove('error');
            return true;
        } else {
            //alert('Heslo nejsou shodna');
            passAgainEl.parentElement.classList.add('error');
            return false;
        }
    }

    global.init = init;
})(window)