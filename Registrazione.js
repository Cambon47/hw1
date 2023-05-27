// JavaScript source code



function jsonCheckUsername(json) {
    // Controllo il campo exists ritornato dal JSON
    if (formStatus.username = !json.exists) {
        document.querySelector('.username').classList.remove('errorj');
        err = document.querySelector('.error');
        err.textContent = '';
        erro--;
    } else {
        document.querySelector('.error').textContent = "Nome utente già utilizzato";
        document.querySelector('.username').classList.add('errorj');
    }

}

function jsonCheckEmail(json) {
    // Controllo il campo exists ritornato dal JSON
    if (formStatus.email = !json.exists) {
        document.querySelector('.email').classList.remove('errorj');
        erro--;
    } else {
        document.querySelector('.error').textContent = "Email già utilizzata";
        document.querySelector('.email').classList.add('errorj');
    }

}

function fetchResponse(response) {
    if (!response.ok) return null;
    return response.json();
}

function checkUsername(event) {
    const input = document.querySelector('.username');

    if (!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
        document.querySelector('.error').textContent = "Sono ammesse lettere, numeri e underscore. Max. 15";
        input.classList.add('errorj');
        formStatus.username = false;

    } else {
        fetch("check_username.php?q=" + encodeURIComponent(input.value)).then(fetchResponse).then(jsonCheckUsername);
    }
}

function checkEmail(event) {
    const emailInput = document.querySelector('.email');
    if (!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
        document.querySelector('.error').textContent = "Email non valida";
        document.querySelector('.email').classList.add('errorj');
        formStatus.email = false;

    } else {
        fetch("check_email.php?q=" + encodeURIComponent(String(emailInput.value).toLowerCase())).then(fetchResponse).then(jsonCheckEmail);
    }
}

function checkConfirmEmail(event) {
    const cemailInput = document.querySelector('.confirm_email');
    const emailInput = document.querySelector('.email');
    if (cemailInput.value != emailInput.value) {
        cemailInput.classList.add('errorj');
        err = document.querySelector('.error');
        err.textContent = 'Le due email sono diverse';

    }
    else {
        cemailInput.classList.remove('errorj');
        err.textContent = '';
        erro--;

    }

}

function checkPassword(event) {
    const passwordInput = document.querySelector('.password');
    const regExp = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,15})");
    if (!regExp.test(String(passwordInput.value))) {
        
        document.querySelector('.password').classList.add('errorj');
        err = document.querySelector('.error');
        err.textContent = 'La password deve essere lunga tra gli 8 e i 15 caratteri, deve contenere maiuscole, numeri e caratteri speciali';

    }
    else {
        document.querySelector('.password').classList.remove('errorj');
        err = document.querySelector('.error');
        err.textContent = '';
        erro--;
    }

}

function checkConfirmPassword(event) {
    const confirmPasswordInput = document.querySelector('.confirm_password');
    if (formStatus.confirmPassord = confirmPasswordInput.value === document.querySelector('.password').value) {
        document.querySelector('.confirm_password').classList.remove('errorj');
        erro--;
    } else {
        document.querySelector('.confirm_password').classList.add('errorj');
        err = document.querySelector('.error');
        err.textContent = 'Le password inserite non sono uguali';
    }
}



function OnSubmit(event) {
    const checkbox = document.querySelector('input[type = checkbox]');
    if (!checkbox.checked) {
        event.preventDefault();

        err = document.querySelector('.error');
        err.textContent = 'Non hai accettato le condizioni di TMAY';
    }
    else {
        err = document.querySelector('.error');
        err.textContent = '';
    } 
    if (erro > 0) {
        



        err = document.querySelector('.error');
        err.textContent = 'Non hai completato il form';
    }
}






const formStatus = {'upload': true};
let erro = 5;
document.querySelector('.username').addEventListener('blur', checkUsername);
document.querySelector('.email').addEventListener('blur', checkEmail);
document.querySelector('.confirm_email').addEventListener('blur', checkConfirmEmail);
document.querySelector('.password').addEventListener('blur', checkPassword);
document.querySelector('.confirm_password').addEventListener('blur', checkConfirmPassword);

document.querySelector('form').addEventListener('submit', OnSubmit);

