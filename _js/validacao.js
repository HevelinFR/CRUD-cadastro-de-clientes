class Validator {

    constructor() {
        this.validations = [
            'data-min-length',
            'data-max-length',
            'data-only-letters',
            'data-email-validate',
            'data-required',
            'data-equal',
            'data-password-validate',
        ]
    }



    // INICIAR A VALIDAÇÃO DE TODOS OS CAMPOS
    validate(form) {
        // PEGAR OS INPUTS
        let inputs = form.getElementByTagName('input');

        // transforma HTMLCollection -> Array
        let inputsArray = [...inputs];
        // loop nos inputs e validação mediante aos atributos encontrados
        inputsArray.forEach(function(input, obj) {

        })

    }
}





let form = document.getElementById('register-form');
let submit = document.getElementById('btn-registrar');

let validator = new Validator();

// evento de envio do form, que valida os inputs
submit.addEventListener('click', function(e) {
    e.preventDefault();
    console.log('ok')

    validator.validate(form);
});