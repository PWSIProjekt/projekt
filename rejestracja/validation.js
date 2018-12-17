const formFirstName = document.querySelector('#formFirstName');
const formLastName = document.querySelector('#formLastName');
const formEmail = document.querySelector('#formEmail');
const formacademyName = document.querySelector('#formacademyName');


function valid(field, reg) {

    switch (reg) {
        //Case 1. Email
        case 1:
            reg = new RegExp('^[0-9a-z_.-]+@[0-9a-z.-]+\.[a-z]{2,3}$', 'i');
            break;
        case 2:
            break;
        default:
            reg = new RegExp('^[a-zA-Z]{3,}$', 'g');  
    }
    

    field.addEventListener('change', function () {
        if (!reg.test(this.value)) {
            this.classList.add('error-field');
        } else {
            this.classList.remove('error-field');
        }
    });
}

valid(formFirstName);
valid(formLastName);
valid(formEmail, 1);
valid(formacademyName);