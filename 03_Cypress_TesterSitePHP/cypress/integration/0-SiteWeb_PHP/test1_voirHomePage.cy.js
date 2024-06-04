/// <reference types="cypress" />

// Voir page index.php
it('index test', function() {
    cy.visit('http://192.168.0.170:41002/'); // "URL/IP" du site web PHP
});