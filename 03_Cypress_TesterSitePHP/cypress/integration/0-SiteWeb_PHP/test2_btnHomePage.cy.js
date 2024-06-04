/// <reference types="cypress" />

// Tester les boutons "btn" de la page index.php
it('index test', function() {
    cy.visit('http://192.168.0.170:41002/'); // "URL/IP" du site web PHP
    // Tester click Bouton pour voir page /bug1/index.php
    cy.get('#btn_VoirPage_1').click();
});