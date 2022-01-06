 /// <reference types="cypress" />

 describe('Prueba el formulario de contacto', () =>{
    it('Prueba la página de contacto y el envío de emails', () =>{
        cy.visit('/contacto');

        cy.get('[data-cy="heading-contacto"]').should('exist');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('equal', 'Contacto');
        cy.get('[data-cy="heading-contacto"]').invoke('text').should('not.equal', 'Formulario de Contacto');
        
        cy.get('[data-cy="heading-formulario"]').should('exist');
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('equal', 'Llene el Formulario de Contacto');
        cy.get('[data-cy="heading-formulario"]').invoke('text').should('not.equal', 'Llena el formulario');
        
        cy.get('[data-cy="formulario-contacto"]').should('exist');
    });

    it ('Llena los campos del formulario', () => {
        cy.get('[data-cy="input-nombre"]').type('Juanito');
        cy.get('[data-cy="input-mensaje"]').type('Deseo comprar una casa, pero no cualquier casa. La mejor');
        cy.get('[data-cy="input-opciones"]').select('Compra');
        cy.get('[data-cy="input-precio"]').type('1000');
        cy.get('[data-cy="forma-contacto"]').eq(1).check();
        
        cy.wait(1000);
        cy.get('[data-cy="forma-contacto"]').eq(0).check();
        cy.get('[data-cy="input-telefono"]').type('98483040596');
        cy.get('[data-cy="input-fecha"]').type('2022-01-05');
        cy.get('[data-cy="input-hora"]').type('10:00');

        cy.get('[data-cy="formulario-contacto"]').submit();

        cy.get('[data-cy="alerta-envio-formulario"]').should('exist');
        cy.get('[data-cy="alerta-envio-formulario"]').invoke('text').should('equal', 'Mensaje Enviado Correctamente');
        cy.get('[data-cy="alerta-envio-formulario"]').should('have.class', 'alerta').and('have.class','exito').and('not.have.class', 'error');
    });

 });