/// <reference types="cypress" />

// Voir page index.php
it('index test', function() {
    cy.visit('http://192.168.0.206:8082/'); // "URL/IP" du site web PHP
});
