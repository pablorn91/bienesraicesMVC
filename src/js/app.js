document.addEventListener('DOMContentLoaded', function(){
    eventLiseners();
    darkMode();
});

function darkMode(){

    const prefiereDark = window.matchMedia('(prefers-color-scheme: dark)');

    // console.log(prefiereDark);

    if(prefiereDark.matches){
        document.body.classList.add('dark-mode'); 
    } else {
        document.body.classList.remove('dark-mode'); 
    }

    prefiereDark.addEventListener('change', function(){
        if(prefiereDark.matches){
            document.body.classList.add('dark-mode'); 
        } else {
            document.body.classList.remove('dark-mode'); 
        }
    });

    const botonModoOscuro = document.querySelector('.modo-oscurito');
    botonModoOscuro.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
    });
}


function eventLiseners() {
    const movilMenu = document.querySelector('.movil-menu');

    movilMenu.addEventListener('click', navegacionResponsive);

    //Muestra campos condicionales
    const metodoContacto = document.querySelectorAll('input[name="contacto[contacto]"]');
    metodoContacto.forEach( input => input.addEventListener('click', mostrarMetodosContacto));
}

function navegacionResponsive () {
    const navegacion = document.querySelector('.navegacion');

        navegacion.classList.toggle('mostrar');
}

function mostrarMetodosContacto (e) {
    const contactoDiv = document.querySelector('#contacto');
    if (e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
        <label for="telefono">Número Teléfono</label>
        <input data-cy="input-telefono" type="tel" placeholder="Tu teléfono" id="telefono" name="contacto[telefono]">

        <p>Eliga la fecha y la hora para la llamada</p>

                <label for="fecha">Fecha:</label>
                <input data-cy="input-fecha" type="date" id="fecha" name="contacto[fecha]">

                <label for="hora">Hora:</label>
                <input data-cy="input-hora" type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        `;
    } else {
        contactoDiv.innerHTML = `
        <label for="email">E-mail</label>
        <input data-cy="input-email" type="email" placeholder="Tu email" id="email" name="contacto[email]" >
        `;
    }

}